DerbyCache
===========
2017-11-17



A persistent cache system. Daily rebuild using cron.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import DerbyCache
```

Or just download it and place it where you want otherwise.


Playground
-------------
```php
<?php


use Core\Services\A;
use DerbyCache\FileSystemDerbyCache;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


//--------------------------------------------
// DERBY CACHE PLAYGROUND
//--------------------------------------------
/**
 * Creating two cars, just like that!
 * Note: I'm using a file system based derbyCache.
 */
$cache = FileSystemDerbyCache::create()->setRootDir("/tmp");

$car1 = $cache->get("Ekom/car--1", function () {
    return "I swear I'm a car, I swear";
});

$car2 = $cache->get("Ekom/car--2", function () {
    return "Vroom vroom (I'm the real cheat)";
});


a($car1); // "I swear I'm a car, I swear"
a($car2); // "Vroom vroom (I'm the real cheat)"


/**
 * Now deleting those cars, that was fun but every good thing has an end
 */
$cache->deleteByPrefix("Ekom/car--"); // will remove the files from our filesystem
```




Playground for WithRelatedFileSystemDerbyCache
------------------

```php
<?php


use Core\Services\A;
use DerbyCache\WithRelatedFileSystemDerbyCache;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


//--------------------------------------------
// WithRelatedFileSystemDerbyCache PLAYGROUND
//--------------------------------------------
class UniversalFactory
{

    /**
     * @var $cache WithRelatedFileSystemDerbyCache
     */
    private static $cache;

    public static function getCar($color = "green")
    {
        return self::getCache()->get("Ekom/car--$color", function () use ($color) {
            $positions = [
                self::getWheel("top left"),
                self::getWheel("top right"),
                self::getWheel("bottom left"),
                self::getWheel("bottom right"),
            ];
            return "I'm a $color car with 4 wheels: " . implode(', ', $positions);
        });
    }

    public static function getWheel($position)
    {
        return self::getCache()->get("Ekom/car-wheel-$position", function () use ($position) {
            return "wheel $position";
        });
    }

    public static function getCache()
    {
        if (null === self::$cache) {
            self::$cache = WithRelatedFileSystemDerbyCache::create()
                ->setRootDir("/tmp/Ekom");
        }
        return self::$cache;
    }

}


a(UniversalFactory::getCar("css")); // "I'm a css car with 4 wheels: wheel top left, wheel top right, wheel bottom left, wheel bottom right"


// then delete again
//UniversalFactory::getCache()->deleteByPrefix("Ekom/car--"); // delete the whole car with its four wheels


/**
 * The file structure will look like this before the call to delete method:
 *
 * - cache
 * ----- Ekom
 * --------- car--css.txt   
 * --------- car-wheel-bottom left.txt
 * --------- car-wheel-bottom right.txt
 * --------- car-wheel-top left.txt
 * --------- car-wheel-top right.txt
 * - related
 * ----- Ekom
 * --------- car--css.txt  // contains the related children list (the four wheel's cache items in cache/Ekom)
 *
 *
 *
 */

```




History Log
------------------
    
- 1.5.0 -- 2018-06-08

    - add DerbyCacheInterface.deleteByCacheIdentifier method 
    
- 1.4.0 -- 2018-06-08

    - add FileSystemDerbyCache.deleteByCacheIdentifier method 
    
- 1.3.1 -- 2017-11-18

    - fix FileSystemDerbyCache.get method forceGenerate argument now only triggers when ===true (not an array) 
    
- 1.3.0 -- 2017-11-18

    - add DerbyCacheInterface.get forceGenerate argument
    
- 1.2.0 -- 2017-11-18

    - add WithRelatedFileSystemDerbyCache
    - fix FileSystemDerbyCache hook system typo
    
- 1.1.0 -- 2017-11-18

    - add FileSystemDerbyCache hook system
    
- 1.0.0 -- 2017-11-17

    - initial commit