MethodInjector
==================
2017-03-24


A tool for injecting methods from a class to another.






Install
===========
Using the universe naive importer:

```bash
uni import MethodInjector
```




Example
==========
```php
<?php


use MethodInjector\MethodInjector;


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
- 1.0.0 -- 2017-03-24

    - initial commit
    