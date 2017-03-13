<?php


namespace Kamille\Services;
use Kamille\Ling\Z;


/**
 * -- DO NOT USE THIS CLASS DIRECTLY - (THIS IS JUST AN EXAMPLE CLASS) --
 * -- COPY PASTE THIS CLASS INTO YOUR APPLICATION AND REMOVE THIS STUPID COMMENT --
 * -- AND THEN REPLACE THE NAMESPACE WITH namespace Services; --
 *
 *
 *
 * Service container of the application.
 * It contains the services of the application.
 *
 * Services can be added manually or by automates.
 *
 *
 * Rules of thumb: you can add new methods, but NEVER REMOVE A METHOD
 * (because you might break a dependency that someone made to this method)
 *
 *
 * Note1: remember that this class belongs to the application,
 * so don't hesitate to use it how you like (use php constants if you want).
 * You would just throw it away and restart for a new application, no big deal.
 *
 *
 * Note2: please avoid use statements at the top of this file.
 * I have no particular arguments why, but it makes my head cleaner to
 * see a clean top of the file, thank you by advance, ling.
 *
 *
 *
 *
 *
 */
class X
{


    public static function StaticPageRouter_getStaticPageController()
    {
        $o = new \Kamille\Architecture\Controller\Web\StaticPageController();
        $o->setPagesDir(Z::appDir() . "/pages");
        return $o;
    }
}