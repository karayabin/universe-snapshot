<?php


namespace Ling\DerbyCache;

use Ling\Bat\FileSystemTool;


/**
 *
 * Figure
 * ------------
 * A figure is a cache item such as if it's deleted, all related caches are deleted with it.
 * You can define what's a figure.
 * By default, any non nested call to the get method assumes the cache item is a figure.
 *
 * If the cache item is a figure, the related/$parent_cache.txt file will be created.
 *
 * Whenever a related/$parent_cache.txt file is created, the deletion of the corresponding
 * cache item also automatically triggers the deletion (by cascade) of all related children.
 *
 * If you don't want to remove children, don't define the cache item as a figure in the first place.
 *
 *
 * Note: the figure role is only attributed to the very first non nested call.
 * Meaning: if a figure A uses a figure B, then only figure A is considered as a figure
 * (for a call with figure A as the cache identifier), and figure B will be wrapped as a child.
 *
 *
 *
 *
 * Creating cache
 * ------------
 * This cache system will use the following fs structure:
 *
 * - $your_cache_dir:
 *      - cache: contains all items generated by derby
 *      - related:
 *          - $parent_cache.txt
 *          - ...
 *
 * Every $parent_cache file contains a serialized array representing the list of related children.
 * The related children are not stored as files in the related subdirectory (but they appear in
 * the cache subdirectory).
 *
 *
 *
 * Deleting
 * ------------
 * When deleting a cache, this class will check if it's a parent (aka figure).
 * If it is, it will read all related children and delete their cache (in the cache subdirectory) too.
 * Then the $parent_cache file will also be removed.
 *
 *
 *
 *
 *
 */
class WithRelatedFileSystemDerbyCache extends FileSystemDerbyCache
{
    private $cacheDir;
    private $relatedDir;

    /**
     * @var null|array while collecting
     *              The first element of the array is the parent
     */
    private static $collected = null;
    private static $parentWasHit = false;


    public function __construct()
    {
        parent::__construct();
        $this->cacheDir = "cache";
        $this->relatedDir = "related";

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function hook($hookName, $argument) // override me
    {
        switch ($hookName) {
            case "onCacheStart":
                $cacheIdentifier = $argument;
                if (null === self::$collected) {
                    if (true === $this->isFigure($cacheIdentifier)) {
                        self::$collected = [$cacheIdentifier];
                    }
                } else {
                    self::$collected[] = $cacheIdentifier;
                }
                break;
            case "onCacheHit":
                if (null !== self::$collected) {
                    self::$parentWasHit = true;
                }
                break;
            case "onCacheEnd":
                // creating the related cache list
                $cacheIdentifier = $argument;
                if (null !== self::$collected && false === self::$parentWasHit && $cacheIdentifier === self::$collected[0]) {
                    $parentCacheIdentifier = array_shift(self::$collected);
                    $file = $this->rootDir . "/" . $this->relatedDir . "/" . $parentCacheIdentifier . ".txt";
                    $data = serialize(self::$collected);
                    FileSystemTool::mkfile($file, $data);
                    self::$collected = null;
                    self::$parentWasHit = false;
                }
                break;
            case "onCacheDelete":
                $realFile = $argument;
                $nbSlashes = substr_count($this->rootDir . "/" . $this->cacheDir . "/", "/");

                $p = explode("/", $realFile, $nbSlashes + 1);
                $relPath = array_pop($p);
                array_pop($p); // removing cacheDir part
                $p[] = $this->relatedDir;
                $relatedParentFile = implode("/", $p) . "/" . $relPath;
                if (file_exists($relatedParentFile)) {

                    // removing all children's cache items
                    $relatedChildren = unserialize(file_get_contents($relatedParentFile));
                    foreach ($relatedChildren as $child) {
                        $file = $this->getCacheFile($child);
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    }
                    // removing the file containing the related children list
                    unlink($relatedParentFile);
                }


                break;
            default:
                break;
        }
    }

    protected function getCacheFile($cacheIdentifier)
    {
        return $this->rootDir . "/" . $this->cacheDir . "/" . $cacheIdentifier . ".txt";
    }


    protected function getDeleteCacheDir()
    {
        return $this->rootDir . "/" . $this->cacheDir;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function isFigure($cacheIdentifier) // override me
    {
        return true;
    }
}