<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Client;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\SanitizerTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use Komin\Application\ModuleInstaller\Client\ModuleInstallerClient\Exception\AbortProcessException;
use Komin\Application\ModuleInstaller\Client\ModuleInstallerClient\ModuleInstallerClientTool;
use Komin\Application\ModuleInstaller\Client\ProtocolHelper\ProtocolHelper;
use Komin\Application\ModuleInstaller\Client\ProtocolHelper\ProtocolHelperInterface;
use Komin\Application\ModuleInstaller\Downloader\Downloader;
use Komin\Application\ModuleInstaller\Downloader\DownloaderInterface;
use Komin\Application\ModuleInstaller\Installer\DebugInstaller;
use Komin\Application\ModuleInstaller\Installer\InstallerInterface;
use Komin\Application\ModuleInstaller\Repository\RepositoryInterface;
use Komin\Application\ModuleInstaller\Stock\StockInterface;
use Komin\Application\ModuleInstaller\UserStream\DebugUserStream;
use Komin\Application\ModuleInstaller\UserStream\UserStreamInterface;
use Komin\Application\ModuleInstaller\Vns\VersionSorter\VersionSorterUtil;
use Komin\Component\Monitor\Traits\ClassicMonitorTrait;


/**
 * ModuleInstallerClient
 * @author Lingtalfi
 * 2015-05-04
 *
 *
 *
 */
class ModuleInstallerClient implements ModuleInstallerClientInterface
{
    private static $repoCpt = 0;

    use ClassicMonitorTrait;
    /**
     * @var UserStreamInterface
     */
    private $userStream;

    /**
     * @var array of RepositoryInterface
     */
    private $repositories;

    /**
     * @var StockInterface
     */
    private $stock;

    /**
     * @var ProtocolHelperInterface
     */
    private $protocolHelper;

    /**
     * @var DownloaderInterface
     */
    private $downloader;
    /**
     * @var InstallerInterface
     */
    private $installer;

    /**
     * @var VersionSorterUtil
     */
    private $vnsSorter;

    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            /**
             * if null, will be set automatically by this class (probably in /tmp)
             */
            'tmpBundleDir' => null,
            /**
             * What to do if, once all repos have been tried, the meta for a given module are still not found.
             *      - ignore
             *      - abort (the whole installation process)
             *      - ask (the user)
             */
            'onMetaNotFound' => 'ask',
            /**
             * What to do if, once all repos have been tried, the bundle couldn't have been downloaded.
             *      - ignore
             *      - abort (the whole installation process)
             *      - ask (the user)
             */
            'onBundleNotFound' => 'ask',
            /**
             * In verbose mode, lot of things are explained
             *          0: not too verbose
             *          1: quite verbose
             *          2: too verbose
             */
            'verbose' => 0,
        ], $options);
        $this->repositories = [];
        $this->protocolHelper = new ProtocolHelper();
    }


    public function install($input)
    {
        try {

            $this->notice("Starting the installation procedure");
            $allMeta = $this->initAllMeta($input);
            a($allMeta);

            $this->resolveAllMetaDependencies($allMeta);
            $tmpBundleDir = $this->getTmpBundleDir();
            $this->downloadBundles($allMeta, $tmpBundleDir);
            $this->installFromTmpBundleDir($tmpBundleDir, $allMeta);

        } catch (AbortProcessException $e) {
            $this->notice("Process aborted: " . $e->getMessage());
        }

        $this->notice("The installation procedure has been completed, see you next time!");

    }


    protected function initAllMeta($input)
    {
        $allMeta = [];
        $this->verbose("----- Phase 1: Initializing all meta");
        $this->verbose("--------- Parsing all bundles");
        $this->parseBundles($input, $allMeta);
        $this->verbose("--------- Parsing all bundles done");
        $this->verbose("--------- Parsing all searchPatterns");
        $this->parseSearchPatterns($input, $allMeta);
        $this->verbose("--------- Parsing all searchPatterns done");
        $this->verbose("----- Phase 1 done");
        return $allMeta;
    }


    private function parseBundles($input, array &$allMeta)
    {
        if (is_string($input)) {
            if ('.zip' === substr($input, -4)) {
                $this->verbose("zip file found: $input, trying to extract meta...");
                try {
                    $failureMsg = null;
                    if (false !== $meta = $this->extractMetaFromBundle($input)) {
                        $this->verbose("...meta extracted");
                        $this->verbose("Trying to register meta of $input");
                        $this->registerMeta($meta, $allMeta, $input);
                    }
                    else {
                        $failureMsg = "Couldn't extract meta from bundle $input";
                    }
                } catch (\Exception $e) {
                    $failureMsg = $e->getMessage();
                }
                if (null !== $failureMsg) {
                    $this->onBundleExtractFailure($failureMsg, $input);
                }
            }
            elseif (is_dir($input)) {
                Finder::create($input)->extensions("zip")->find(function (FinderFileInfo $file) use (&$allMeta) {
                    $this->parseBundles($file->getRealPath(), $allMeta);
                });
            }
        }
        elseif (is_array($input)) {
            foreach ($input as $in) {
                $this->parseBundles($in, $allMeta);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("input argument must be of type string or array, %s given", gettype($input)));
        }
    }

    private function parseSearchPatterns($input, array &$allMeta)
    {
        if (
            is_string($input) &&
            '.zip' !== substr($input, -4) &&
            !is_dir($input)
        ) {
            $searchPattern = $input;
            $this->verbose("searchPattern found: $input, trying to fetch meta...");
            $this->fetchMetaAndRegister($searchPattern, $allMeta);
        }
        elseif (is_array($input)) {
            foreach ($input as $in) {
                $this->parseSearchPatterns($in, $allMeta);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("input argument must be of type string or array, %s given", gettype($input)));
        }
    }

    private function downloadBundles(array $allMeta, $tmpBundleDir)
    {
        $this->verbose("----- Phase 3: Downloading bundles");

        if ($allMeta) {
            $this->verbose(sprintf("Number of entries to process: %s", count($allMeta)));
            foreach ($allMeta as $commonName => $info) {


                $bundleDownloaded = false;
                $meta = $info['meta'];


                $canonicalName = $this->protocolHelper->getCanonicalNameByMeta($meta);
                $this->verbose("processing entry: $canonicalName...");
                $this->debugMeta($meta);
                $bundle = $info['bundle'];
                $repoName = $info['repo'];
                if (null !== $bundle) {
                    $this->verbose("... it comes from a bundle: $bundle");
                    if (file_exists($bundle)) {
                        $dst = $this->getBundlePathByCanonicalName($tmpBundleDir, $canonicalName);
                        if (copy($bundle, $dst)) {
                            $this->verbose("Bundle $bundle has been successfully copied to $dst");
                            $bundleDownloaded = true;
                        }
                        else {
                            $this->verbose("Failure: couldn't copy from $bundle to $dst");
                        }
                    }
                    else {
                        throw new \LogicException("Bundle not found: $bundle");
                    }
                }
                else {
                    $download = $this->protocolHelper->getDownloadInfo($meta);
                    $this->verbose("trying to download the bundle for $canonicalName");
                    $this->verbose("accessing download info: %d", ['%d' => $download]);
                    $dst = $this->getBundlePathByCanonicalName($tmpBundleDir, $canonicalName);
                    try {
                        if (true === $this->_getDownloader()->copy($download, $dst)) {
                            $this->verbose("the bundle could be successfully downloaded to $dst");
                            $bundleDownloaded = true;
                            break;
                        }
                        else {
                            $this->notice("could not download the bundle for $canonicalName from repository $repoName");
                        }
                    } catch (\Exception $e) {
                        $this->notice("could not download the bundle for $canonicalName from repository $repoName: " . $e->getMessage());
                    }
                }

                if (false === $bundleDownloaded) {
                    $this->onBundleNotFound("bundle", "Could not download the bundle for $canonicalName");
                }


            }
        }
        else {
            $this->verbose("Number of entries to process: 0");
        }


        $this->verbose("----- Phase 3 done");
    }


    private function installFromTmpBundleDir($tmpBundleDir)
    {
        /**
         * Now inside the tmpBundleDir, we have only the bundles that we want to install
         */
        $this->verbose("----- Phase 4 (final): Installing bundles");
        $this->debug("will install bundles from $tmpBundleDir");
        $zips = Finder::create($tmpBundleDir)->extensions("zip")->find();
        $this->notice(count($zips) . " bundle(s) found");
        if ($zips) {

            foreach ($zips as $file) {
                /**
                 * @var FinderFileInfo $file
                 */
                try {
                    $baseName = $file->getBasename();
                    $this->notice("Installing bundle " . $baseName . "...");
                    if (true === $this->_getInstaller()->install($file->getRealPath())) {
                        $this->info("installation of bundle $baseName ...success");
                    }
                    else {
                        $this->warning("installation of bundle $baseName ...failure");
                    }

                } catch (\Exception $e) {
                    $this->notice("the installer couldn't install the bundle {$file->getRealPath()}: " . $e->getMessage());
                }
            };
        }

        $this->verbose("----- Phase 4 (final) done");
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function resolveAllMetaDependencies(array $allMeta)
    {
        $n = count($allMeta);
        $this->verbose(sprintf("----- Phase 2: Resolving all meta dependencies (%s item(s))", $n));
        foreach ($allMeta as $commonName => $info) {
            $this->resolveMetaDependencies($info['meta'], $allMeta);
        }
        $this->verbose("----- Phase 2 done");
    }

    private function resolveMetaDependencies(array $meta, array &$allMeta)
    {
        $canonicalName = $this->protocolHelper->getCanonicalNameByMeta($meta);
        $dependencies = $this->protocolHelper->getDependencies($meta);

        $this->verbose(sprintf("$canonicalName has %s dependency(ies)", count($dependencies)));
        if ($dependencies) {
            $this->verbose("Resolving dependencies for $canonicalName");
            foreach ($dependencies as $canonical) {
                $this->verbose("dependency found: " . $canonical);
                if (true === $this->isInStock($canonical)) {
                    $this->debug("...$canonical was found in stock, skipping");
                }
                else {
                    $this->verbose("Fetching meta for dependency $canonical from repositories");
                    if (false !== $meta = $this->fetchMetaAndRegister($canonical, $allMeta)) {
                        $this->resolveMetaDependencies($meta, $allMeta);
                    }
                }
            }
        }

    }

    private function fetchMetaAndRegister($searchPattern, array &$allMeta)
    {
        $meta = false;
        $repoName = null;
        if ($this->repositories) {
            $this->verbose(sprintf("Number of repositories: %s", count($this->repositories)));
            foreach ($this->repositories as $repoName => $repo) {
                /**
                 * @var RepositoryInterface $repo
                 */
                $this->verbose("Searching $searchPattern in repository $repoName...");
                if (false !== $meta = $repo->getModuleMeta($searchPattern)) {
                    $this->verbose("...found");
                    if ('stopAtFirstMetaFound') {
                        break;
                    }
                }
                else {
                    $this->verbose("...not found");
                }
            }
        }
        else {
            $this->verbose("Number of repositories: 0");
        }


        if (false === $meta) {
            $this->onMetaNotFound("Meta not found with searchPattern: $searchPattern");
        }
        if (null !== $repoName) {
            if (false !== $meta) {
                $this->verbose("Trying to register meta for $searchPattern...");
                $this->registerMeta($meta, $allMeta, null, $repoName);
            }
        }
        else {
            throw new \LogicException("repoName should have been initialized by now");
        }

        return $meta;
    }


    private function registerMeta(array $meta, array &$allMeta, $bundle = null, $repoName = null)
    {
        list($commonName, $versionId, $canonicalName, $vns) = $this->protocolHelper->getCommonName_VersionId_CanonicalName_VnsByMeta($meta);
        if (false === $this->isInStock($canonicalName)) {

            if (true === $this->isNonExistingMostRecentVersion($commonName, $versionId, $allMeta)) {
                $allMeta[$commonName] = [
                    'versionId' => $versionId,
                    'meta' => $meta,
                    'bundle' => $bundle,
                    'repo' => $repoName,
                    'vns' => $vns,
                ];
                $this->verbose("meta registered for $canonicalName");
            }
            else {
                $this->debug("Module $canonicalName is not the most recent version in allMeta, skipping");
            }
        }
        else {
            $this->notice("Module $canonicalName was found in stock, skipping");
        }
    }


    private function isNonExistingMostRecentVersion($commonName, $versionId, $allMeta)
    {
        $ret = true;
        if (array_key_exists($commonName, $allMeta)) {
            $infos = $allMeta[$commonName];
            if ($infos) {
                $ret = false;
                $versions = [];
                $vns = null;
                foreach ($infos as $info) {
                    $versions[] = $info['versionId'];
                    $vns = $info['vns'];
                }
                if (!in_array($versionId, $versions, true)) {
                    $versions[] = $versionId;
                    $last = $this->_getVnsSorter()->getLastVersion($versions, $vns);
                    if ($versionId === $last) {
                        $ret = true;
                    }
                }
            }
        }
        return $ret;
    }


    private function extractMetaFromBundle($bundle)
    {
        $ret = false;
        if (false !== $meta = ModuleInstallerClientTool::getMetaFromBundle($bundle, $this->protocolHelper->getMetaFileBaseName())) {
            $ret = $meta;
        }
        return $ret;
    }


    private function isInStock($canonicalName)
    {
        $ret = false;
        if (null !== $this->stock && $this->stock->isInstalled($canonicalName)) {
            $ret = true;
        }
        return $ret;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRepository(RepositoryInterface $repository, $name = null)
    {
        if (null === $name) {
            $name = 'repo' . self::$repoCpt++;
        }
        $this->repositories[$name] = $repository;
        return $this;
    }

    /**
     * @return UserStreamInterface
     */
    public function getUserStream()
    {
        return $this->userStream;
    }

    public function setUserStream(UserStreamInterface $userStream)
    {
        $this->userStream = $userStream;
        return $this;
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
        return $this;
    }

    /**
     * @return ProtocolHelperInterface
     */
    public function getProtocolHelper()
    {
        return $this->protocolHelper;
    }

    public function setProtocolHelper(ProtocolHelperInterface $protocolHelper)
    {
        $this->protocolHelper = $protocolHelper;
        return $this;
    }

    /**
     * @return DownloaderInterface
     */
    public function getDownloader()
    {
        return $this->downloader;
    }

    public function setDownloader(DownloaderInterface $downloader)
    {
        $this->downloader = $downloader;
        return $this;
    }

    /**
     * @return InstallerInterface
     */
    public function getInstaller()
    {
        return $this->installer;
    }

    public function setInstaller(InstallerInterface $installer)
    {
        $this->installer = $installer;
        return $this;
    }

    /**
     * @return VersionSorterUtil
     */
    public function getVnsSorter()
    {
        return $this->vnsSorter;
    }

    public function setVnsSorter(VersionSorterUtil $vnsSorter)
    {
        $this->vnsSorter = $vnsSorter;
    }






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getTmpBundleDir()
    {
        $tmpBundleDir = $this->options['tmpBundleDir'];

        if (true === FileSystemTool::isValidDirPath($tmpBundleDir)) {
            FileSystemTool::remove($tmpBundleDir);
            FileSystemTool::mkdir($tmpBundleDir);
        }
        else {
            if (null !== $tmpBundleDir) {
                $this->info("invalid tmpBundleDir: $tmpBundleDir");
            }
            $tmpBundleDir = FileSystemTool::tempDir();
        }
        return $tmpBundleDir;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return UserStreamInterface
     */
    private function _getUserStream()
    {
        if (null === $this->userStream) {
            $this->userStream = new DebugUserStream();
        }
        return $this->userStream;
    }

    /**
     * @return DownloaderInterface
     */
    private function _getDownloader()
    {
        if (null === $this->downloader) {
            $this->downloader = new Downloader();
        }
        return $this->downloader;
    }

    /**
     * @return InstallerInterface
     */
    private function _getInstaller()
    {
        if (null === $this->installer) {
            $this->installer = new DebugInstaller();
        }
        return $this->installer;
    }

    /**
     * @return VersionSorterUtil
     */
    private function _getVnsSorter()
    {
        if (null === $this->vnsSorter) {
            $this->vnsSorter = new VersionSorterUtil();
        }
        return $this->vnsSorter;
    }

    private function getBundlePathByCanonicalName($tmpBundleDir, $canonicalName)
    {
        return $tmpBundleDir . '/' . SanitizerTool::sanitizeFileName($canonicalName) . '.zip';
    }

    private function onBundleExtractFailure($failureMsg, $bundle)
    {
        echo "ask user what to do: ignore, abort ?<br>";
        // if cli, ask? 
    }


    private function onMetaNotFound($msg)
    {
        $this->warning($msg);
        $behaviour = $this->options['onMetaNotFound'];
        switch ($behaviour) {
            case 'ignore':
                $this->info("Reading the config: ignore meta not found");
                break;
            case 'abort':
                $this->info("Reading the config: aborting...");
                $this->abort("Aborted by config: meta not found");
                break;
            case 'ask':
                $this->userStream->ask("What do you want to do?", [
                    "ignore" => function () {
                    },
                    "abort" => function () use (&$abortProcess) {
                        $this->abort("Aborted by user: meta not found");
                    },
                ]);
                break;
            default:
                throw new \RuntimeException("Invalid options.onMetaNotFound value: $behaviour");
                break;
        }
    }


    private function onBundleNotFound($msg)
    {
        $this->warning($msg);
        $behaviour = $this->options['onBundleNotFound'];
        switch ($behaviour) {
            case 'ignore':
                $this->info("Reading the config: ignore bundle not found");
                break;
            case 'abort':
                $this->info("Reading the config: aborting...");
                $this->abort("Aborted by config: bundle not found");
                break;
            case 'ask':
                $this->userStream->ask("What do you want to do?", [
                    "ignore" => function () {
                    },
                    "abort" => function () use (&$abortProcess) {
                        $this->abort("Aborted by user: bundle not found");
                    },
                ]);
                break;
            default:
                throw new \RuntimeException("Invalid options.onBundleNotFound value: $behaviour");
                break;
        }

    }

    private function abort($msg)
    {
        throw new AbortProcessException($msg);
    }

    private function verbose($msg, array $vars = null, $type = "debug")
    {
        if ($this->options['verbose'] > 0) {
            $this->doVerbose($msg, $vars, $type);
        }
    }

    private function superVerbose($msg, array $vars = null, $type = "debug")
    {
        if ($this->options['verbose'] > 1) {
            $this->doVerbose($msg, $vars, $type);
        }
    }

    private function doVerbose($msg, array $vars = null, $type = "debug")
    {
        if (is_array($vars)) {
            array_walk($vars, function (&$v) {
                $v = VarTool::toString($v, [
                    'details' => true,
                ]);
            });
            $msg = str_replace(array_keys($vars), array_values($vars), $msg);
        }
        $this->say($msg, $type);
    }

    private function debugMeta(array $serverMeta)
    {
        if (count($serverMeta) > 3) {
            $this->superVerbose("The meta are: ");
            foreach ($serverMeta as $k => $v) {
                $this->superVerbose("-------- $k: " . VarTool::toString($v, ['details' => true]));
            }
        }
        else {
            $this->superVerbose("The meta are: mm", ['mm' => $serverMeta]);
        }
    }
}
