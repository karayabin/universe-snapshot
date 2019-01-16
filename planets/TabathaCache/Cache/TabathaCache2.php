<?php


namespace TabathaCache\Cache;


use Bat\FileSystemTool;

/**
 * Welcome to tabatha cache 2.
 * ===================
 * Forget everything you know about tabatha cache, and let's start a brand new tool.
 *
 * TabathaCache2 is a tag-based cache system for your apps.
 *
 * Tag based means you can attach tags to your cached entries,
 * and then later you can delete those cache entries just by using the tag identifiers.
 *
 *
 * TLDR;
 * ----------------
 * This class uses a base dir with the following structure:
 *
 * - $baseDir/:
 *      - cached_entries/
 *          - $cacheIdentifier.cache.php
 *          - ...
 *      - delete_ids/
 *          - $deleteId.list.php
 *          - ...
 *
 * The "cache_entries" dir contains the cached content.
 * The "delete_ids" dir contains the list of cacheIdentifiers to delete if the $deleteId is given to the clean method.
 *
 *
 *
 *
 *
 *
 * Crash course
 * --------------------
 * The first method to learn is "get".
 *
 * The "get" method creates a cache entry if necessary (i.e. if the content
 * you're asking has not been cached yet), and then returns the cached content.
 *
 *
 * Here is how we use it:
 *
 * // assuming $cache is a well configured TabathaCache2 instance
 * $myCachedContent = $cache->get( "theCacheIdentifier", function(){
 *      return "some very long string";
 * });
 *
 *
 * With the code above, the first call will trigger the callback, cache it somewhere, and returns its output.
 * All subsequent calls will return the cached content.
 *
 *
 * That's fine, but in this example we didn't attach any tag to this cached entry, and so programmatically
 * speaking we don't have a way to erase our cached content.
 *
 * It's not too hard to add tags to a cache content though, just look at the code below, which does exactly that:
 *
 *
 * $myCachedContent = $cache->get( "theCacheIdentifier", function(){
 *      return "some very long string";
 * }, ["myDeleteId"]);
 *
 *
 * See how easy it was?
 * This leads us to the second part: deleting cache content programmatically.
 *
 *
 * Continuing the above example, let's say that now I want to delete cache entry which identifier is theCacheIdentifier.
 * Since I've assigned the myDeleteId tag in the very last snippet, I can just use that tag now, like this:
 *
 * $cache->clean(["myDeleteId"]);
 *
 *
 *
 * Ok, that's it for this tutorial.
 * I'm sure you get the idea.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class TabathaCache2 implements TabathaCache2Interface
{


    private $dir;
    protected $listeners;
    protected $isEnabled;


    public function __construct()
    {
        $this->dir = '/tmp/tabatha';
        $this->listeners = [];
        $this->isEnabled = true;
    }

    public static function create()
    {
        return new static();
    }

    public function setDir(string $dir)
    {
        $this->dir = $dir;
        return $this;
    }

    public function setIsEnabled(bool $isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }


    public function get(string $cacheIdentifier, callable $generateCallback, $deleteIds = null)
    {
        $path = $this->dir . "/cached_entries/" . $cacheIdentifier . ".cache.php";
        if (true === $this->isEnabled && file_exists($path)) {
            $this->trigger("cacheHit", $cacheIdentifier);
            $c = file_get_contents($path);
            return unserialize($c);
        } else {
            $this->trigger("cacheCreateBefore", $cacheIdentifier);
            $c = call_user_func($generateCallback);
            FileSystemTool::mkfile($path, serialize($c));


            if (null !== $deleteIds) {
                if (is_string($deleteIds)) {
                    $deleteIds = [$deleteIds];
                }
                if (is_array($deleteIds)) {
                    $this->addCacheIdentifierToDeleteLists($cacheIdentifier, $deleteIds);
                }
            }


            $this->trigger("cacheCreateAfter", $cacheIdentifier);
            return $c;
        }
    }

    public function clean($deleteIds)
    {
        if (!is_array($deleteIds)) {
            $deleteIds = [$deleteIds];
        }
        $dir = $this->dir . "/delete_ids";

        foreach ($deleteIds as $deleteId) {
            $deleteListFile = $dir . "/$deleteId.list.php";
            if (file_exists($deleteListFile)) {
                $listeners = unserialize(file_get_contents($deleteListFile));
                foreach ($listeners as $cacheId) {
                    $path = $this->dir . "/cached_entries/" . $cacheId . ".cache.php";
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                unlink($deleteListFile); // note: we could also NOT remove it, but it feels cleaner this way
            }
        }
    }


    public function cleanAll()
    {
        FileSystemTool::remove($this->dir);
    }


    public function cleanByCacheIdentifierPrefix($cacheIdentifierPrefix)
    {
        $dir = dirname($this->dir . "/cached_entries/$cacheIdentifierPrefix");
        $prefix = basename($cacheIdentifierPrefix);
        $files = scandir($dir);
        foreach ($files as $file) {
            if (
                "." !== $file &&
                ".." !== $file
            ) {
                if (0 === strpos($file, $prefix)) {
                    unlink($dir . "/" . $file);
                }
            }
        }
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    public function addListener(string $eventName, callable $callback)
    {
        $this->listeners[$eventName][] = $callback;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function trigger(string $eventName, string $cacheIdentifier)
    {
        if (array_key_exists($eventName, $this->listeners)) {
            $callbacks = $this->listeners[$eventName];
            foreach ($callbacks as $callback) {
                call_user_func($callback, $cacheIdentifier);
            }
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function addCacheIdentifierToDeleteLists(string $cacheIdentifier, array $deleteIds)
    {
        $dir = $this->dir . "/delete_ids";
        foreach ($deleteIds as $deleteId) {
            $listFile = $dir . "/$deleteId.list.php";
            $listeners = [];
            if (file_exists($listFile)) {
                $listeners = unserialize(file_get_contents($listFile));
            }
            $listeners[] = $cacheIdentifier;
            $listeners = array_unique($listeners);
            $c = serialize($listeners);
            FileSystemTool::mkfile($listFile, $c);
        }
    }
}