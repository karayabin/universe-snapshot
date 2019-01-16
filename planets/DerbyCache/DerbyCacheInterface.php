<?php


namespace DerbyCache;


/**
 * DerbyCache naming convention
 * -----------------------------------
 * - cache identifier: <component> (</> <component> )* (<--> <garbageString>)?
 * - component: if your application uses modules, the first component should be the name of the module.
 *                  A component cannot contain the slash character.
 *                  Basically, the cache identifier is some sort of relative path.
 * - garbage string: a string that identifies (uniquely) the cached item
 *          (could be a simple identifier, or a hash string of an array, or whatever string you want)
 *
 *
 */
interface DerbyCacheInterface
{


    /**
     * @param $cacheIdentifier , string using the "DerbyCache naming convention" (see at the top of this document)
     * @param callable $cacheItemGenerator , whenever called, this function returns the item (to cache/return)
     * @param bool $forceGenerate =false, if true, the cache will never be hit and the callback will always execute
     * @return mixed, the item
     */
    public function get($cacheIdentifier, callable $cacheItemGenerator, $forceGenerate = false);

    /**
     * Remove all caches which cacheIdentifier starts with the given prefix
     * @return void
     */
    public function deleteByPrefix(string $prefix);

    public function deleteByCacheIdentifier(string $cacheIdentifier);
}