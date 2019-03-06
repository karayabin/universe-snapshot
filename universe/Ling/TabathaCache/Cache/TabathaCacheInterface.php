<?php


namespace Ling\TabathaCache\Cache;



interface TabathaCacheInterface
{

    /**
     * @param $cacheId , string, the cache identifier.
     * @param callable $generateCallback , creates the result: is called only if the cache doesn't exist
     * @param $deleteNamespaces : string|array
     * @param $forceGenerate : null|bool=false, allows you to temporary force the
     *                          generateCallback (i.e. not using the cached version).
     *                          If null, takes the concrete instance's default value
     *
     *
     * @return mixed, the result of the generateCallback (or its cached equivalent if exist)
     */
    public function get($cacheId, callable $generateCallback, $deleteNamespaces, $forceGenerate = null);

    /**
     * Deletes the caches "listening" to the given deleteId(s).
     *
     * @param $deleteIds , string|array
     * @return void
     */
    public function clean($deleteIds);

    /**
     * Cleans all caches.
     *
     * @return void
     */
    public function cleanAll();
}