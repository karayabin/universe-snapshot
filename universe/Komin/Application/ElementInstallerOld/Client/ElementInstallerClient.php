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
use Komin\Application\ElementInstallerOld\Tool\ElementInstallerTool;


/**
 * ElementInstallerClient
 * @author Lingtalfi
 * 2015-04-19
 *
 */
abstract class ElementInstallerClient implements MeeElementInstallerClientInterface
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
    public function install($input)
    {


        try {
            $this->msg("Starting install element procedure");
            /**
             * Fetch all meta
             */
            $allMeta = [];
            $notFound = [];
            $this->fetchAllMeta($input, $allMeta, $notFound);
            a($allMeta);
            a($notFound);


        } catch (\Exception $e) {
            $this->msg(sprintf("An exceptional error occurred with message: %s, aborting the procedure", $e->getMessage()), 'e');
        }

        az("boo");
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
    protected function fetchAllMeta($input, array &$allMeta, array &$notFound)
    {
        $recognized = false;
        if (is_string($input)) {
            if (file_exists($input)) {
                if (is_file($input) && '.zip' === substr($input, -4)) {
                    $this->msg("input recognized as bundle");
                    // fetchMetaByBundle
                    $recognized = true;
                }
                elseif (is_dir($input)) {
                    $this->msg("input recognized as bundle directory");
                    $recognized = true;
                    // foreach bundles as bundle
                    // fetchMetaByBundle
                }

            }
            if (false === $recognized) {
                $p = explode(':', $input, 3);
                if (count($p) >= 2) {
                    $this->msg("input recognized as elementId");
                    $recognized = true;
                    $this->fetchMetaByElementId($input, $allMeta, $notFound);
                }
            }
        }
        elseif (is_array($input)) {
            $this->msg(sprintf("input recognized as array of elementId (%s)", implode(', ', $input)));
            $recognized = true;
            foreach ($input as $in) {
                $this->fetchMetaByElementId($in, $allMeta, $notFound);
            }

        }


        if (false === $recognized) {
            $s = (is_string($input)) ? $input : '(Array)';
            $this->msg(sprintf("Unrecognized input type with %s", $s), 'e');
        }
    }

    protected function fetchMetaByBundle($bundle, array &$allMeta, array &$notFound)
    {
        if (is_string($bundle) && file_exists($bundle)) {
            if ('.zip' === substr($bundle, -4)) {
//        $this->fetchMeta($type, $name, $version, $allMeta, $notFound);
                
            }
            else {
                throw new \InvalidArgumentException(sprintf("A bundle must be of type .zip, %s given", $bundle));
            }
        }
        else {
            throw new \InvalidArgumentException("Bundle not found: $bundle");
        }
    }

    protected function fetchMetaByElementId($elementId, array &$allMeta, array &$notFound)
    {

        list($type, $name, $version) = ElementInstallerTool::extractElementId($elementId);
        $this->fetchMeta($type, $name, $version, $allMeta, $notFound);
    }

    protected function fetchMeta($type, $name, $version, array &$allMeta, array &$notFound)
    {
        $sEl = "$type $name with version $version";
        $this->msg("fetching meta for $sEl");

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

            if (false !== $elMeta = $this->getElementMetaFromRepositories($type, $name, $version)) {
                $deps = $this->metaMapInterpreter->getDependencyArray($elMeta);
                if ($deps) {
                    $this->msg("$sEl has the following dependencies: " . implode(', ', $deps));
                    foreach ($deps as $depElementId) {
                        list($zeType, $zeName, $zeVersion) = ElementInstallerTool::extractElementId($depElementId);
                        $this->fetchMeta($zeType, $zeName, $zeVersion, $allMeta, $notFound);
                    }
                }
                $allMeta[] = $elMeta;
            }
            else {
                $notFound[] = [
                    $type,
                    $name,
                    $version,
                ];
            }
        }
        else {
            $this->msg("$sEl already found in stock");
        }

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

    /**
     * Ask repositories to find the (only one) element meta that fit best with the request.
     *
     * @return array|false
     */
    private function getElementMetaFromRepositories($type, $name, $version)
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
