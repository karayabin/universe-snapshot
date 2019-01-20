<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Client;

use BeeFramework\Bat\ClassTool;
use BeeFramework\Bat\FileSystemTool;
use Komin\Application\ElementInstallerOld\Installer\ElementInstallerInterface;
use Komin\Application\ElementInstallerOld\MetaMapInterpreter\MetaMapInterpreterInterface;
use Komin\Application\ElementInstallerOld\MetaRepository\MetaRepositoryInterface;
use Komin\Application\ElementInstallerOld\Monitor\MonitorInterface;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloader;
use Komin\Application\ElementInstallerOld\ResourceDownloader\ResourceDownloaderInterface;
use Komin\Application\ElementInstallerOld\Stock\StockInterface;


/**
 * ElementInstallerClient
 * @author Lingtalfi
 * 2015-04-19
 *
 */
abstract class DoElementInstallerClient implements MeeElementInstallerClientInterface
{

    /**
     * @var StockInterface
     */
    protected $stock;

    /**
     * @var ResourceDownloaderInterface
     */
    protected $downloader;

    /**
     * @var MetaMapInterpreterInterface
     */
    protected $metaMapInterpreter;

    /**
     * @var MonitorInterface
     */
    protected $monitor;

    /**
     * @var ElementInstallerInterface
     */
    protected $installer;

    /**
     * @var array of name => MetaRepositoryInterface
     *
     * The name shall not be _stock.
     *
     */
    protected $metaRepositories;

    protected $options;


    private $_abortProcess;


    /**
     * @return array with following entries:
     *
     *          - 0: string, the downloadLabel
     *                      used in a sentence like:
     *                                  Downloading $downloadLabel...
     *          - 1: mixed, downloadInfo
     *                      will be interpreted by the ResourceDownloader
     *          - 2: string, fileName, the file to which a successfully downloaded
     *                          resource would be copied to.
     *
     *
     */
    abstract protected function getMetaInfoForDownload(array $meta);


    public function __construct(array $options = [])
    {
        $this->metaRepositories = [];
        $this->options = array_replace([
            /**
             * The temporary dir where the downloaded files will be placed.
             * If null, this object will choose a value for you.
             */
            'tmpDir' => null,
            /**
             * What to do when something unexpected occurs that compromises
             * a clean installation.
             *
             * Possible choices are:
             *          - 0: ignore
             *          - 1: abort
             */
            'abortMode' => 1,
        ], $options);
        $this->downloader = new ResourceDownloader();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ClientInterface
    //------------------------------------------------------------------------------/
    public function install($type, $name, $version)
    {
        if ($this->metaMapInterpreter instanceof MetaMapInterpreterInterface) {

            $this->msg("Start install of $type $name with version $version");
            /**
             * 1. Creating download map
             */
            $downloadMap = $this->createDownloadMap($type, $name, $version);
            a($downloadMap);
            /**
             * 2. Downloading resources
             */
            if (null === $this->_abortProcess) {
                if ($downloadMap) {
                    $path = $this->options['tmpDir'];
                    if (empty($path)) {
                        $path = FileSystemTool::tempDir();
                    }
                    else {
                        FileSystemTool::mkdir($path);
                    }
                    if (file_exists($path)) {

                        /**
                         * We will store resources in order in this array
                         */
                        $installResources = $this->processDownloadMap($downloadMap, $path);
                        if (null === $this->_abortProcess) {
                            $this->processInstallResources($installResources);
                        }
                        else {
                            $this->msg("Process aborted: " . $this->_abortProcess . " -----", 'f');
                        }
                    }
                    else {
                        $this->msg("Invalid path: $path", "e");
                        $this->abortProcess("Invalid path");
                    }
                }
                else {
                    $this->msg("No resources to download. End of the process -----");
                }
            }
            else {
                $this->msg("Process aborted: " . $this->_abortProcess . " -----", 'f');
            }
        }
        else {
            throw new \LogicException("metaMapInterpreter property must be set to a MetaCheckerInterface instance");
        }
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getMetaRepositories()
    {
        return $this->metaRepositories;
    }

    public function setMetaRepositories(array $metaRepositories)
    {
        $this->metaRepositories = $metaRepositories;
    }

    /**
     * @return StockInterface
     */
    public function getStock()
    {
        return $this->stock;
    }

    public function setStock(StockInterface $stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return ResourceDownloaderInterface
     */
    public function getDownloader()
    {
        return $this->downloader;
    }

    public function setDownloader(ResourceDownloaderInterface $downloader)
    {
        $this->downloader = $downloader;
    }

    /**
     * @return MetaMapInterpreterInterface
     */
    public function getMetaMapInterpreter()
    {
        return $this->metaMapInterpreter;
    }

    public function setMetaMapInterpreter(MetaMapInterpreterInterface $metaMapInterpreter)
    {
        $this->metaMapInterpreter = $metaMapInterpreter;
    }


    /**
     * @return MonitorInterface
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    public function setMonitor(MonitorInterface $monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * @return ElementInstallerInterface
     */
    public function getInstaller()
    {
        return $this->installer;
    }

    public function setInstaller(ElementInstallerInterface $installer)
    {
        $this->installer = $installer;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Returns a download map.
     *      The download map is an array containing one meta per element to install.
     *      An element to install is the original element, or one of its dependencies.
     */
    protected function createDownloadMap($type, $name, $version)
    {
        $downloadMap = [];
        $this->msg("Creating download map: START -----");
        $this->processElementMeta($downloadMap, $type, $name, $version);
        $this->msg("Creating download map: END -------");
        return $downloadMap;
    }

    protected function processDownloadMap(array $downloadMap, $targetFolder)
    {
        $installResources = [];
        $x = count($downloadMap);
        $this->msg("There are $x resource(s) to download, the target folder will be $targetFolder");
        $this->msg("Downloading resources: START -----");
        foreach ($downloadMap as $meta) {


            list($downloadLabel, $downloadInfo, $fileName) = $this->getMetaInfoForDownload($meta);
            $this->msg("Downloading $downloadLabel...");
            $dstFile = $targetFolder . '/' . $fileName;
            if (true === $this->downloader->copy($downloadInfo, $dstFile)) {
                $this->msg("... ok with name $fileName");
                $installResources[] = $dstFile;
            }
            else {
                $this->msg("... an error occurred", 'w');
                $breakLoop = false;
                $this->onDownloadFailure($breakLoop);
                if (true === $breakLoop) {
                    break;
                }
            }
        }
        $this->msg("Downloading resources: END -----");
        return $installResources;
    }

    protected function processInstallResources(array $installResources)
    {
        if ($installResources) {
            $baseResources = $installResources;
            array_walk($baseResources, function (&$v) {
                $v = basename($v);
            });
            $this->msg(sprintf("Will now install the following resources: %s", implode(', ', $baseResources)));
            /**
             * 3. Installing resources
             */
            $this->msg("Installing resources: START -----");
            foreach ($installResources as $resource) {
                $this->msg(sprintf("installing resource %s...", $resource));
                if (true === $this->installer->install($resource)) {
                    $this->msg("...success");
                }
                else {
                    $this->msg("...failure");
                    $breakLoop = false;
                    $this->onInstallElementFailure($breakLoop);
                    if (true === $breakLoop) {
                        break;
                    }
                }
            }
            $this->msg("Installing resources: END -----");

        }
        else {
            $this->msg("No resources to install. End of the process -----");
        }

    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function processElementMeta(array &$downloadMap, $type, $name, $version)
    {
        $sEl = "$type $name with version $version";

        /**
         * Does the application already uses the element in the given version?
         */
        if (null === $this->stock || false === $this->stock->isInstalled($type, $name, $version)) {

            if (null === $this->stock) {
                $this->msg("stock not defined");
            }
            else {
                $this->msg("$sEl not found in stock");
            }

            if (false !== $elMeta = $this->getElementMeta($type, $name, $version)) {
                $deps = $this->metaMapInterpreter->getDependencyLabelArray($elMeta);
                if ($deps) {
                    $this->msg("$sEl has the following dependencies: " . implode(', ', $deps));
                    foreach ($deps as $dep) {
                        list($zeName, $zeVersion) = $this->metaMapInterpreter->getDependencyInfoByLabel($dep);
                        $this->processElementMeta($downloadMap, $type, $zeName, $zeVersion);
                    }
                }
                $downloadMap[] = $elMeta;
            }
        }
        else {
            $this->msg("$sEl found in stock");
        }

    }


    /**
     * Ask repositories to find the (only one) element meta that fit best with the request.
     *
     * @return array|false
     */
    protected function getElementMeta($type, $name, $version)
    {
        $elementMeta = $this->collectMeta($type, $name, $version);
        return $elementMeta;
    }


    protected function abortProcess($reason)
    {
        $this->_abortProcess = $reason;
    }

    /**
     * messages types are mostly used to change color
     */
    protected function msg($msg, $type = 'n')
    {
        if ($this->monitor) {
            $this->monitor->msg($msg, $type);
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onInvalidMeta(&$breakLoop = false)
    {
        if (1 === $this->options['abortMode']) {
            $this->abortProcess("invalid meta");
            $breakLoop = true;
        }
    }

    protected function onDownloadFailure(&$breakLoop = false)
    {
        if (1 === $this->options['abortMode']) {
            $this->abortProcess("download failure");
            $breakLoop = true;
        }
    }

    protected function onInstallElementFailure(&$breakLoop = false)
    {
        if (1 === $this->options['abortMode']) {
            $this->abortProcess("install element failure");
            $breakLoop = true;
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function collectMeta($type, $name, $version)
    {
        $ret = false;
        $sEl = "$type $name with version $version";
        foreach ($this->metaRepositories as $repName => $rep) {
            /**
             * @var MetaRepositoryInterface $rep
             */
            if (false !== $inf = $rep->getMeta($type, $name, $version)) {
                $this->msg("$sEl found in repository $repName and will be used (exact match)");
                $this->msg("Testing meta validity with meta checker " . ClassTool::getClassShortName($this->metaMapInterpreter) . '...');
                if (true === $this->metaMapInterpreter->isValid($inf)) {
                    $this->msg("...meta ok");
                    $ret = $inf;
                    break;
                }
                else {
                    $this->msg("...invalid meta, discarding the entry", 'w');
                    $breakLoop = false;
                    $this->onInvalidMeta($breakLoop);
                    if (true === $breakLoop) {
                        break;
                    }
                }
            }
            else {
                $this->msg("$sEl not found in repository $repName");
            }
        }
        return $ret;
    }
}
