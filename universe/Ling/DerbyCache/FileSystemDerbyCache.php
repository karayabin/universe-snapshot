<?php


namespace Ling\DerbyCache;

use Ling\Bat\FileSystemTool;

/**
 * This DerbyCache uses the fileSystem as its "memory".
 *
 */
class FileSystemDerbyCache extends DerbyCache
{

    protected $rootDir;

    public function __construct()
    {
        parent::__construct();
        $this->rootDir = "/tmp";
    }

    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function get($cacheIdentifier, callable $cacheItemGenerator, $forceGenerate = false)
    {
        $this->hook('onCacheStart', $cacheIdentifier);
        $file = $this->getCacheFile($cacheIdentifier);
        if (true !== $forceGenerate && file_exists($file)) {

            $this->hook('onCacheHit', $cacheIdentifier);
            $this->hook('onCacheEnd', $cacheIdentifier);
            return unserialize(file_get_contents($file));
        }

        $ret = call_user_func($cacheItemGenerator);
        $data = serialize($ret);
        FileSystemTool::mkfile($file, $data);
        $this->hook('onCacheCreate', $cacheIdentifier);
        $this->hook('onCacheEnd', $cacheIdentifier);
        return $ret;
    }

    public function deleteByPrefix(string $prefix)
    {
        $file = $this->getDeleteCacheDir() . "/" . $prefix;
        $baseDir = dirname($file);
        $filePrefix = basename($file);
        if (is_dir($baseDir)) {
            $files = scandir($baseDir);
            foreach ($files as $file) {
                if ('.' !== $file && '..' !== $file) {
                    if (0 === strpos($file, $filePrefix)) {
                        $realFile = $baseDir . "/" . $file;
                        $this->hook('onCacheDelete', $realFile);
                        unlink($realFile);
                    }
                }
            }
        }
    }

    public function deleteByCacheIdentifier(string $cacheIdentifier)
    {
        $file = $this->getCacheFile($cacheIdentifier);
        unlink($file);
        $this->hook('onCacheDelete', $file);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function hook($hookName, $argument) // override me
    {

    }

    protected function getCacheFile($cacheIdentifier)
    {
        return $this->rootDir . "/" . $cacheIdentifier . ".txt";
    }

    protected function getDeleteCacheDir()
    {
        return $this->rootDir;
    }
}