<?php


namespace TabathaCache\Cache;


interface TabathaCache2Interface
{

    /**
     * @param $cacheIdentifier , string, the cache identifier.
     * @param callable $generateCallback , creates the result: is called only if the cache doesn't exist
     * @param array $deleteIds , array of deleteIdentifier.
     *
     *
     * @return mixed, the result of the generateCallback (or its cached equivalent if exist)
     */
    public function get(string $cacheIdentifier, callable $generateCallback, $deleteIds = null);

    /**
     * Deletes the caches referenced by/attached to  the given delete identifier.
     *
     * @param $deleteIds , string|array
     * @return void
     */
    public function clean($deleteIds);


    /**
     * Deletes all cached entries which relative path starts with the given $cacheIdentifierPrefix.
     *
     * @param $cacheIdentifierPrefix: string|array
     * @return mixed
     */
    public function cleanByCacheIdentifierPrefix($cacheIdentifierPrefix);

    /**
     * Cleans all caches.
     *
     * @return void
     */
    public function cleanAll();
}