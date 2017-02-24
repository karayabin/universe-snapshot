<?php


namespace FileCleaner;

use FileCleaner\FileKeeper\FileKeeperInterface;
use FileCleaner\FileKeeperAdapter\FileKeeperAdapterInterface;


/**
 * Use this class to clean a directory.
 * There are three phases:
 *
 * - scan
 * - collect
 * - delete
 *
 *
 * To the cleaner we bind some keeper instances.
 * Basically, the synopsis is the following:
 *
 * The cleaner parses each file in the target directory, one by one.
 *
 * The keepers act as listeners, and are notified of every file parsed.
 * This is the opportunity for them to create lists of files to keep.
 * This is called the scan phase.
 *
 * Then the cleaner ask every keeper for their keep list, and mix them together
 * in a big list of files to keep.
 *
 * Finally, once this big list is created, the cleaner, on its own,
 * re-parse the directory and delete all the files, except for those in the keep list.
 *
 *
 *
 *
 */
class FileCleaner
{

    private $_dir;

    /**
     * If true, won't delete the file, but will display the kept file
     * instead: handy while in development phase
     */
    private $testMode;

    /**
     * If true, won't delete the file, but will display their names
     * to the screen. This is overridden by test mode.
     */
    private $dryMode;
    private $keepCallbacks;
    private $filesToKeep;

    /**
     * @var FileKeeperInterface[] $keepers
     */
    private $keepers;

    /**
     * @var FileKeeperAdapterInterface[] $adapters
     */
    private $adapters;


    public function __construct()
    {
        $this->_dir = null;
        $this->keepCallbacks = [];
        $this->filesToKeep = [];
        $this->keepers = [];
        $this->adapters = [];
        $this->testMode = false;
        $this->dryMode = false;
    }

    public static function create()
    {
        return new static();
    }


    public function keep($what)
    {
        foreach ($this->adapters as $adapter) {
            if (false !== ($k = $adapter->getFileKeeper($what))) {
                $this->addKeeper($k);
            }
        }
        return $this;
    }

    public function clean()
    {
        if (is_dir($this->_dir)) {

            $allFiles = [];
            $filesToKeep = [];


            $this->prepare();
            $this->scan($this->_dir, $allFiles);
            $this->collect($filesToKeep);
            $this->cleanDir($allFiles, $filesToKeep);


        } else {
            $this->error("dir is not a directory: " . $this->_dir);
        }
    }


    public function setDir($dir)
    {
        $this->_dir = $dir;
        return $this;
    }


    public function addKeeper(FileKeeperInterface $keeper)
    {
        $this->keepers[] = $keeper;
        return $this;
    }

    public function addAdapter(FileKeeperAdapterInterface $adapter)
    {
        $this->adapters[get_class($adapter)] = $adapter;
        return $this;
    }

    public function setAdapters(array $adapters)
    {
        $this->adapters = $adapters;
        return $this;
    }

    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;
        return $this;
    }

    public function setDryMode($dryMode)
    {
        $this->dryMode = $dryMode;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new \Exception($msg);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepare()
    {
        foreach ($this->keepers as $k) {
            $k->setDir($this->_dir);
        }
    }

    private function scan($dir, array &$allFiles)
    {
        $files = scandir($dir);
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                $file = $dir . "/" . $f;
                if (is_dir($file)) {
                    $this->scan($file, $allFiles);
                } else {
                    $allFiles[] = $file;
                    foreach ($this->keepers as $keeper) {
                        $keeper->listen($f, $file);
                    }
                }
            }
        }
    }

    private function collect(array &$filesToKeep)
    {
        foreach ($this->keepers as $k) {
            $filesToKeep = array_merge($filesToKeep, $k->getKeptFiles());
        }
    }

    private function cleanDir(array $allFiles, array $filesToKeep)
    {


        $files = array_diff($allFiles, $filesToKeep);

        if (true === $this->testMode) {
            $filesToKeep = array_unique($filesToKeep);
            sort($filesToKeep);
            $this->aa($filesToKeep);
        } else {
            if (true === $this->dryMode) {
                $this->aa($files);
            } else {
                foreach ($files as $file) {
                    unlink($file);
                }
            }
        }
    }

    protected function aa($m)
    {
        if (function_exists('a')) {
            a($m);
        } else {
            var_dump($m);
        }
    }
}