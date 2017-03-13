<?php


namespace Kamille\Services;


/**
 *
 * -- DO NOT USE THIS CLASS DIRECTLY - (THIS IS JUST AN EXAMPLE CLASS) --
 * -- COPY PASTE THIS CLASS INTO YOUR APPLICATION AND REMOVE THIS STUPID COMMENT --
 * -- AND THEN REPLACE THE NAMESPACE WITH namespace Services; --
 *
 *
 *
 * This class is used to hook modules dynamically.
 * This class is written by modules, so, be careful I guess.
 *
 * A hook is always a public static method (in this class)
 *
 *
 * Rules of thumb: you can add new methods, but NEVER REMOVE A METHOD
 * (because you might break a dependency that someone made to this method)
 */
class Hooks
{

    public static function StaticPageRouter_feedRequestUri(array &$uri2Page)
    {
        \Toast\ToastHooks::StaticPageRouter_feedRequestUri($uri2Page);
    }
}