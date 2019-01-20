<?php


namespace Explorer\Explorer;


use Bat\FileSystemTool;
use Explorer\Importer\ImporterInterface;
use Explorer\Log\ExplorerLogInterface;
use Explorer\Util\ExplorerUtil;

/**
 *
 * The MaculusExplorer has the particularity of using the following nomenclature:
 *
 *
 * - dependency: <importerType> <::/> <planetIdentifier>
 * - planetIdentifier: <authorName> </> <planetName>
 * - authorName: string, not colon, no slash
 * - planetName: string, not colon, no slash
 * - planetSnapshotIdentifier: <planetIdentifier> (<:> <version>)?
 * - version: <versionNumber> (<(> <versionComment> <)>)?
 *
 *
 *
 */
class MaculusExplorer
{

    private $importers;
    private $warpZone;
    private $debug;
    /**
     * @var ExplorerLogInterface
     */
    private $logger;

    public function __construct()
    {
        $this->importers = [];
        $this->warpZone = null;
        $this->debug = false;
    }

    public function setWarpZone($warpZone)
    {
        $this->warpZone = $warpZone;
        return $this;
    }

    public function setLogger(ExplorerLogInterface $log)
    {
        $this->logger = $log;
        return $this;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    public function addImporter($type, ImporterInterface $importer)
    {
        $this->importers[$type] = $importer;
        return $this;
    }

    public function install($dependency, $workingUniverseDir, $forceImport = false, $forceInstall = false)
    {
        try {
            $this->log("Installing $dependency in $workingUniverseDir with forceImport=" . (int)$forceImport . " and forceInstall=" . (int)$forceInstall);
            $this->log("--------------");
            $this->import($dependency, $forceImport, function ($dependency, $planetIdentifier, $planetWarpDir) use ($workingUniverseDir, $forceInstall) {
                FileSystemTool::mkdir($workingUniverseDir, 0777, true);
                $p = explode('/', $planetIdentifier);
                $planetName = $p[1];
                $targetPlanetDir = $workingUniverseDir . '/' . $planetName;
                if (file_exists($targetPlanetDir) && false === $forceInstall) {
                    $this->log("- Install $dependency (it already exists in the application, nothing was done)");
                    return;
                }
                $this->log("- Install $dependency (copying files from warp and overwriting)");
                FileSystemTool::copyDir($planetWarpDir, $targetPlanetDir);
            });
        } catch (\Exception $e) {
            if (false === $this->debug) {
                $this->log("An error occurred with message: " . $e->getMessage(), "error");
                $this->log("To see the full trace, use the debug option", "error");
            } else {
                throw $e;
            }
        }
    }

    public function import($dependency, $force = false, $func = null)
    {
        $deps = [];
        $this->_import($dependency, $force, $deps, $func);
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/

    private function extract($dependency)
    {
        $p = explode('::/', $dependency, 2);
        if (2 !== count($p)) {
            throw new \Exception("Invalid dependency syntax");
        }
        return $p;
    }

    private function _import($dependency, $force = false, array &$importedDependencies, \Closure $func = null)
    {
        if (null === $this->warpZone) {
            throw new \Exception("Warp zone not set");
        }
        FileSystemTool::mkdir($this->warpZone, 0777, true);

        $res = false;
        list($importerType, $planetIdentifier) = $this->extract($dependency);


        $planetWarpDir = $this->warpZone . "/" . $planetIdentifier;
        if (false === $force && is_dir($planetWarpDir)) {
            $res = true;
            $this->log("- Import $dependency (found in warp)");
        } else {
            if (array_key_exists($importerType, $this->importers)) {
                $this->log("- Import $dependency");
                /**
                 * @var ImporterInterface $importer
                 */
                $importer = $this->importers[$importerType];
                $res = $importer->import($planetIdentifier, $planetWarpDir);
            } else {
                throw new \Exception("No importer available with type $importerType");
            }
        }

        $importedDependencies[$dependency] = true;
        if (null !== $func) {
            call_user_func($func, $dependency, $planetIdentifier, $planetWarpDir);
        }
        $deps = $this->getDependencies($planetWarpDir);
        if (count($deps) > 0) {
            $this->log("Dependencies found, will import dependencies");
            foreach ($deps as $dep) {
                if (false === array_key_exists($dep, $importedDependencies)) {
                    $this->_import($dep, $force, $importedDependencies, $func);
                }
            }
        }
        return $res;
    }

    private function getDependencies($planetWarpDir)
    {
        return ExplorerUtil::getDirectDependencies($planetWarpDir);
    }

    private function log($msg, $level = null)
    {
        if (null !== $this->logger) {
            $this->logger->log($msg, $level);
        }
    }
}