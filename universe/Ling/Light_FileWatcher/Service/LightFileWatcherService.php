<?php


namespace Ling\Light_FileWatcher\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\HashTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_FileWatcher\Exception\LightFileWatcherException;
use Ling\Light_Logger\LightLoggerService;

/**
 * The LightFileWatcherService class.
 */
class LightFileWatcherService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the callables and paths information.
     * It's an array of items, each of which:
     *
     * - 0: path
     * - 1: callable
     *
     *
     * @var array
     */
    protected $callables;

    /**
     * This property holds the options for this instance.
     * Available options are:
     *
     * - useDebug: bool=false.
     *          If true, debug messages are sent to the logs.
     *
     * For more details see the @page(Light_FileWatcher conception notes).
     *
     * @var array
     */
    protected $options;


    /**
     * This absolute path to the monitor file.
     *
     * The following tags can be used:
     *
     * - {app_dir}: the application directory.
     *
     *
     * @var string = {app_dir}/tmp/Light_FileWatcher/monitor.byml
     */
    protected $monitorFile;

    /**
     * This property holds the realMonitorFile for this instance.
     * @var string
     */
    private $realMonitorFile;


    /**
     * Builds the LightFileWatcherService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->callables = [];
        $this->options = [];
        $this->monitorFile = "{app_dir}/tmp/Light_FileWatcher/monitor.byml";
        $this->realMonitorFile = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Sets the monitorFile.
     *
     * @param string $monitorFile
     */
    public function setMonitorFile(string $monitorFile)
    {
        $this->monitorFile = $monitorFile;
    }


    /**
     * Method called in response to @page(the Light.initialize_1 event).
     *
     * It will seek for monitored files changes.
     * And for every file that has actually changed, we re-install the plugin owning that file.
     *
     * @param LightEvent $event
     */
    public function onInitialize(LightEvent $event)
    {
        if (false === file_exists($this->getMonitorFilePath())) {
            $this->createMonitorFile();
        }
        $this->monitorFiles();
    }


    /**
     * Registers the callable to be executed when the file, which absolute path is given, is updated.
     *
     *
     *
     *
     * @param string $path
     * @param callable $fn
     */
    public function registerCallable(string $path, callable $fn)
    {
        $this->callables[] = [$path, $fn];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Creates the monitor file.
     */
    protected function createMonitorFile()
    {
        $path2Hash = [];
        foreach ($this->callables as $item) {
            $path = $item[0];
            $hash = $this->getHash($path);
            $path2Hash[$path] = $hash;
        }

        BabyYamlUtil::writeFile($path2Hash, $this->getMonitorFilePath());
    }


    /**
     * Monitor the files, and trigger the user's callback when a file change is detected.
     *
     * Then updates the hashes in the monitor file.
     *
     *
     * @throws \Exception
     */
    protected function monitorFiles()
    {

        $this->debugLog("--clean--"); // reinitializing log session
        $this->debugLog("file_watcher: starting monitorFile routine...");

        $monitorFile = $this->getMonitorFilePath();

        if (file_exists($monitorFile)) {

            $path2Hash = BabyYamlUtil::readFile($monitorFile);
            $newPath2Hash = [];


            foreach ($this->callables as $item) {

                list($path, $fn) = $item;

                //--------------------------------------------
                // new hash
                //--------------------------------------------
                if (file_exists($path)) {
                    $hash = HashTool::getHashByFile($path);
                } else {
                    $hash = "0"; // default hash for non-existing files
                }


                //--------------------------------------------
                // comparing hashes
                //--------------------------------------------
                foreach ($path2Hash as $oldPath => $oldHash) {

                    /**
                     * Note: I found a bug when trying to compare oldPath and path without realpath.
                     * https://bugs.php.net/bug.php?id=79739
                     */
                    if (realpath($path) === realpath($oldPath)) {
                        $oldHash = $path2Hash[$oldPath];
                        if ($hash !== $oldHash) {
                            $this->debugLog("Change detected for path: $path, triggering callback");
                            call_user_func($fn);

                        } else {
                            $this->debugLog("No change detected for path: $path.");
                        }

                        $newPath2Hash[$path] = $hash;
                    } else {
                        $msg = "Path not found in the monitor file, cannot compare hashes (path=$path).";
                        $this->debugLog($msg);
                        $this->error($msg);
                    }

                }
            }


            //--------------------------------------------
            // rewrite the monitor file
            //--------------------------------------------
            BabyYamlUtil::writeFile($newPath2Hash, $this->getMonitorFilePath());


        } else {
            $this->error("The monitor file wasn't found: " . $monitorFile);
        }

    }

    /**
     * Sends a message to the log, if the useDebug options is true (or do nothing otherwise).
     *
     * @param string $msg
     */
    public function debugLog(string $msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $logger->log($msg, "file_watcher.debug");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the hash for the file which path is given.
     * If a file doesn't exist, the hash will be set to "0".
     *
     *
     * @param string $path
     * @return string
     */
    private function getHash(string $path): string
    {
        if (true === file_exists($path)) {
            return HashTool::getHashByFile($path);
        }
        return "0";
    }

    /**
     * Returns the absolute path to the monitor file.
     *
     * @return string
     */
    private function getMonitorFilePath(): string
    {
        if (null === $this->realMonitorFile) {
            $this->realMonitorFile = str_replace([
                '{app_dir}',
            ], [
                $this->container->getApplicationDir(),
            ], $this->monitorFile);
        }
        return $this->realMonitorFile;
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightFileWatcherException($msg);
    }


}