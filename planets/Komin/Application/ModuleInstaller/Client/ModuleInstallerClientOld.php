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
use BeeFramework\Component\Log\SimpleLogger\Traits\SyslogLoggerTrait;
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


/**
 * ModuleInstallerClient
 * @author Lingtalfi
 * 2015-05-04
 *
 *
 *
 */
class ModuleInstallerClientOld implements ModuleInstallerClientInterface
{
    private static $repoCpt = 0;

    use SyslogLoggerTrait;
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
        $this->verbose("Starting install process with input: &i", ['&i' => $input]);
        $this->verbose("--- First, get resolved canonical names list");
        if (!is_array($input)) {
            $input = [$input];
        }
        $canonicalNames2BundlePaths = $this->getCanonicalNames2BundlePaths($input);
        $canonicalNames = [];
        $this->collectRawCanonicalNames($input, $canonicalNames);

        /**
         * Obtaining resolved canonical names: those are really the canonical names that we want to install.
         */
        $bundleCanonicalNames = array_values($canonicalNames2BundlePaths);
        $merged = array_merge($bundleCanonicalNames, $canonicalNames);
        $this->verbose("processing unresolved canonical names list: &list", ['&list' => $merged]);
        $resolvedCanonicalNames = $this->protocolHelper->resolveCanonicalNamesConflicts($merged);
        $this->verbose("resolved canonical names list: &list", ['&list' => $resolvedCanonicalNames]);

        /**
         * Importing bundles in a tmp bundle dir
         */
        $tmpBundleDir = $this->getTmpBundleDir();
        $this->verbose("--- Second, import bundles in the tmpBundleDir: $tmpBundleDir");
        $abortProcess = false;
        
        
        
        
        
        
        foreach ($resolvedCanonicalNames as $cName) {
            $this->verbose("processing $cName");

            /**
             * If stock is defined, and the module is already in stock,
             * we don't even try to install it.
             */
            if (null !== $this->stock && $this->stock->isInstalled($cName)) {
                $this->notice("Stock: module already in stock: $cName, skipping...");
                continue;
            }

            /**
             * If the canonicalName comes from a bundle, we just copy the bundle to the tmpBundleDir
             */
            if (array_key_exists($cName, $canonicalNames2BundlePaths)) {
                $path = $canonicalNames2BundlePaths[$cName];
                $this->verbose("$cName comes from the given bundle $path");
                if (file_exists($path)) {
                    $dst = $this->getBundlePathByCanonicalName($tmpBundleDir, $cName);
                    if (copy($path, $dst)) {
                        $this->notice("copied bundle from $path to $dst");
                    }
                    else {
                        $this->warning("couldn't copy bundle from $path to $dst");
                    }
                }
                else {
                    $this->warning("bundle path not found: $path");
                }
            }
            /**
             * If it doesn't come from a bundle, then we ask all the repositories we know, until we found
             * one that answers positively to our request.
             */
            else {
                $this->verbose("$cName was given as a string, trying to get meta from the repositories list");
                if ($this->repositories) {
                    $metaDownloaded = false;
                    $bundleDownloaded = false;
                    foreach ($this->repositories as $repoName => $repo) {
                        $this->verbose("contacting repository $repoName");
                        if ($repo instanceof RepositoryInterface) {

                            if (false !== $serverMeta = $repo->getModuleMeta($cName)) {
                                $this->verbose("meta found on repository $repoName");
                                $this->debugMeta($serverMeta);
                                
                                
                                
                                $metaDownloaded = true;
                                $download = $this->protocolHelper->getDownloadInfo($serverMeta);
                                $this->verbose("trying to download the bundle");
                                $this->verbose("accessing download info: %d", ['%d' => $download]);
                                $dst = $this->getBundlePathByCanonicalName($tmpBundleDir, $cName);
                                try {
                                    if (true === $this->_getDownloader()->copy($download, $dst)) {
                                        $this->verbose("the bundle could be successfully downloaded to $dst");
                                        $bundleDownloaded = true;
                                        break;
                                    }
                                    else {
                                        $this->notice("could not download the bundle using the given meta on repo $repoName");
                                    }
                                } catch (\Exception $e) {
                                    $this->notice("the downloader couldn't download the bundle from repo $repoName: " . $e->getMessage());
                                }
                                
                                
                                
                            }
                            else {
                                $this->notice("meta not found on repo $repoName");
                            }
                        }
                        else {
                            throw new \InvalidArgumentException(sprintf("repository variable must be of type RepositoryInterface, %s given", gettype($repo)));
                        }
                    }

                    if (false === $metaDownloaded) {
                        $this->onImportProblem("meta", "Could not download meta with module $cName (tried all the repo)", $abortProcess);
                    }
                    elseif (false === $bundleDownloaded) {
                        $this->onImportProblem("bundle", "Could not download the bundle for module $cName (tried all the repo)", $abortProcess);
                    }


                }
                else {
                    $this->notice("No repositories are defined");
                }
            }
        }


        if (false === $abortProcess) {
            /**
             * Now inside the tmpBundleDir, we have only the bundles that we want to install
             */
            $this->verbose("--- Last, will install bundles from tmpBundleDir: $tmpBundleDir");
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

            $this->notice("The installation procedure has been completed, see you next time!");

        }
        else {
            $this->error("Aborting the process");
        }

//        FileSystemTool::remove($tmpBundleDir);
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






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getCanonicalNames2BundlePaths(array $input)
    {
        $ret = [];
        $bundles = [];
        $this->collectBundlePaths($input, $bundles);
        foreach ($bundles as $bundle) {
            if (false !== $meta = ModuleInstallerClientTool::getMetaFromBundle($bundle, $this->protocolHelper->getMetaFileBaseName())) {
                $cName = $this->protocolHelper->getCanonicalNameByMeta($meta);
                $ret[$cName] = $bundle;
            }
            else {
                $this->info("couldn't access meta from bundle $bundle");
            }
        }
        return $ret;
    }


    protected function collectBundlePaths($input, array &$paths)
    {
        if (is_string($input)) {
            if ('.zip' === substr($input, -4)) {
                $paths[] = $input;
            }
            elseif (is_dir($input)) {
                Finder::create($input)->extensions("zip")->find(function (FinderFileInfo $file) use (&$paths) {
                    $this->collectBundlePaths($file->getRealPath(), $paths);
                });
            }
        }
        elseif (is_array($input)) {
            foreach ($input as $in) {
                $this->collectBundlePaths($in, $paths);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("input argument must be of type string or array, %s given", gettype($input)));
        }
    }

    protected function collectRawCanonicalNames($input, array &$canonicalNames)
    {
        if (is_string($input)) {
            if (
                '.zip' !== substr($input, -4) &&
                !is_dir($input)
            ) {
                $canonicalNames[] = $input;
            }
        }
        elseif (is_array($input)) {
            foreach ($input as $in) {
                $this->collectRawCanonicalNames($in, $canonicalNames);
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("input argument must be of type string or array, %s given", gettype($input)));
        }
    }


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

    private function getBundlePathByCanonicalName($tmpBundleDir, $canonicalName)
    {
        return $tmpBundleDir . '/' . SanitizerTool::sanitizeFileName($canonicalName) . '.zip';
    }

    private function onImportProblem($type, $msg, &$abortProcess)
    {
        $this->warning($msg);
        switch ($type) {
            case 'meta':
                $behaviour = $this->options['onMetaNotFound'];
                switch ($behaviour) {
                    case 'ignore':
                        $this->info("Reading the config: ignore meta not found");
                        break;
                    case 'abort':
                        $this->info("Reading the config: aborting...");
                        $abortProcess = true;
                        break;
                    case 'ask':
                        $this->userStream->ask("What do you want to do?", [
                            "ignore" => function () {
                            },
                            "abort" => function () use (&$abortProcess) {
                                $abortProcess = true;
                            },
                        ]);
                        break;
                    default:
                        throw new \RuntimeException("Invalid options.onMetaNotFound value: $behaviour");
                        break;
                }
                break;
            case 'bundle':
                $behaviour = $this->options['onBundleNotFound'];
                switch ($behaviour) {
                    case 'ignore':
                        $this->info("Reading the config: ignore bundle not found");
                        break;
                    case 'abort':
                        $this->info("Reading the config: aborting...");
                        $abortProcess = true;
                        break;
                    case 'ask':
                        $this->userStream->ask("What do you want to do?", [
                            "ignore" => function () {
                            },
                            "abort" => function () use (&$abortProcess) {
                                $abortProcess = true;
                            },
                        ]);
                        break;
                    default:
                        throw new \RuntimeException("Invalid options.onMetaNotFound value: $behaviour");
                        break;
                }
                break;
            default:
                throw new \InvalidArgumentException("Unknown type $type");
                break;
        }
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
        $this->log($msg, $type);
    }

    private function debugMeta(array $serverMeta)
    {
        if (count($serverMeta) > 3) {
            $this->superVerbose("The meta are: ");
            foreach($serverMeta as $k => $v){
                $this->superVerbose("-------- $k: " . VarTool::toString($v, ['details' => true]));   
            }
        }
        else {
            $this->superVerbose("The meta are: mm", ['mm' => $serverMeta]);
        }
    }
}
