MethodInjector
==================
2017-03-24 -> 2021-03-05


A tool for injecting methods from a class to another.






Install
===========
Using the universe naive importer:

```bash
uni import Ling/MethodInjector
```




Example
==========
```php
<?php


use Ling\MethodInjector\MethodInjector;


ini_set("display_errors", 1);
require __DIR__ . "/../boot.php";


//--------------------------------------------
// KAMINOS EXAMPLE - ADDING MODULE SERVICE TO THE APPLICATION CONTAINER
//--------------------------------------------
/**
 * Add public static method ConnexionServices::Connexion_doo
 * to the Services\X class if it doesn't have it yet.
 */
$className = 'Module\Connexion\ConnexionServices';
$method = "Connexion_doo";
$o = new MethodInjector();
$methods = $o->getMethodsList($className);
foreach ($methods as $method) {
    $m = $o->getMethodByName($className, $method);
    if (false === $o->hasMethod($m, 'Services\X')) {
        $o->appendMethod($m, 'Services\X');
    }
}




```





History Log
------------------

- 1.5.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.5.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.5.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.5.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.0 -- 2017-04-04

    - add Method.removeMethods
    
- 1.4.0 -- 2017-03-26

    - add Method.getInnerContent
    - add MethodInjector.replaceMethodByInnerContent
    - fix change algorithm
    - fix getMethodByName can now return false
    
- 1.3.1 -- 2017-03-26

    - fix filters

- 1.3.0 -- 2017-03-26

    - hasMethod can now choose its filters
    
- 1.2.0 -- 2017-03-26

    - add removeMethod
    
- 1.1.0 -- 2017-03-26

    - getMethodsList can now choose its filters
    
- 1.0.0 -- 2017-03-24

    - initial commit
    