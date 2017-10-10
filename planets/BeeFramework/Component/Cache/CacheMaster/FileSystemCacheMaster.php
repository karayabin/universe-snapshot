<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Cache\CacheMaster;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Component\Cache\CacheMaster\Exception\CacheMasterException;


/**
 * FileSystemCacheMaster
 * @author Lingtalfi
 * 2015-06-03
 *
 */
class FileSystemCacheMaster extends CacheMaster
{

    private $rootDir;

    public function __construct()
    {
        $this->rootDir = '';
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CacheMasterInterface
    //------------------------------------------------------------------------------/
    /**
     * @return true
     */
    public function store($name, $data, $metaData = null)
    {
        $dir = $this->getBoxPath($name);
        $this->toFile($data, $this->getCacheFile($dir));
        if (null !== $metaData) {
            $this->toFile($metaData, $this->getMetaFile($dir));
        }
        return true;
    }

    /**
     * Returns the stored data, or false if no data is associated with the given name.
     *
     * @param string $box :
     *          the type of data we want to retrieve:
     *
     *          - data (default): only the data
     *          - meta: only the meta
     *          - both: both the data and the meta, in the form of an array:
     *                          0: data
     *                          1: meta (or null if not set)
     * @return mixed|false
     */
    public function retrieve($name, $box = 'data')
    {
        $dir = $this->getBoxPath($name);
        if (file_exists($dir)) {
            if ('data' === $box) {
                $cacheFile = $this->getCacheFile($dir);
                if (file_exists($cacheFile)) {
                    return $this->toData($cacheFile);
                }
            }
            elseif ('meta' === $box) {
                $metaFile = $this->getMetaFile($dir);
                if (file_exists($metaFile)) {
                    return $this->toData($metaFile);
                }
            }
            elseif ('both' === $box) {
                $cacheFile = $this->getCacheFile($dir);
                if (file_exists($cacheFile)) {
                    $data = $this->toData($cacheFile);
                    $meta = null;
                    $metaFile = $this->getMetaFile($dir);
                    if (file_exists($metaFile)) {
                        $meta = $this->toData($metaFile);
                    }
                    return [
                        $data,
                        $meta,
                    ];
                }
            }
            else {
                throw new CacheMasterException("Unknown box type: $box");
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function has($name)
    {
        return (file_exists($this->getBoxPath($name)));
    }

    /**
     * Removing data and meta programmatically is perhaps necessary in buggy cases.
     * @return void
     */
    public function remove($name)
    {
        FileSystemTool::remove($this->getBoxPath($name));
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getBoxPath($name)
    {
        $name = FileSystemTool::getSafeChars($name);
        return $this->rootDir . "/" . $name;
    }

    private function getCacheFile($boxPath)
    {
        return $boxPath . "/cache.txt";
    }

    private function getMetaFile($boxPath)
    {
        return $boxPath . "/meta.txt";
    }

    private function toFile($data, $file)
    {
        FileSystemTool::filePutContents($file, serialize($data));
    }

    private function toData($file)
    {
        return unserialize(file_get_contents($file));
    }

}
