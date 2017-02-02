LogSlicer
=============
2016-12-23


Paginate your log file for display.


LogSlicer is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.


Intent
============

I have a potentially big log file, and I want to create a web interface
that allows me to browse the log.

The LogSlicer object helps me reduce my problem to displaying simple 
paginated list (which I know how to do).

Basically, the LogSlicer (virtually) cuts the log in pages, and let me
choose which page I want to display.


LogSlicer can also work in reverse mode (equivalent of tail -f).







Example
=============

Abstract example (teaser)
--------------------

```php
$lines = LogSlicer::create()
    ->file(__DIR__ . "/../log/php.err.log")
    ->nbLinesPerPage(1000)
    ->getPage(2);
```

Or if you need pagination:

```php

$slicer = LogSlicer::create()
    ->file(__DIR__ . "/../log/php.err.log")
    ->nbLinesPerPage(1000);
$nbPages = $slicer->getNbPages();
$lines = $slicer->getPage(2);
```


Concrete example
--------------------

Here is my example log file.

```txt
[220-Dec-2016 16:33:19 Europe/Paris] PHP Fatal error:  Class 'Installer\Operation\LayoutBridge\ReflectionClass' not found in /Users/me/somepath/class/Installer/Operation/LayoutBridge/LayoutBridgeDisplayLeftMenuBlocksOperation.php on line 22
[22-Dec-2016 16:33:19 Europe/Paris] PHP Stack trace:
[22-Dec-2016 16:33:19 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0
[22-Dec-2016 16:33:19 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:17
[226-Dec-2016 16:33:19 Europe/Paris] PHP   3. Installer\Installer->run() /Users/me/somepath/class-modules/FrontOne/FrontOneInstaller.php:50
[227-Dec-2016 16:33:19 Europe/Paris] PHP   4. Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation->execute() /Users/me/somepath/class/Installer/Installer.php:49
[22-Dec-2016 19:14:13 Europe/Paris] PHP Warning:  call_user_func_array() expects parameter 1 to be a valid callback, no array or string given in /Users/me/somepath/class/Installer/Operation/Util/ArrayTransformer.php on line 21
[229-Dec-2016 19:14:13 Europe/Paris] PHP Stack trace:
[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0
[228-Dec-2016 19:14:13 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:18
[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0
[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0
[22KK-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0
```


Here is a testing code

```php
<?php


use LogSlicer\LogSlicer;

require_once "bigbang.php";


ini_set('display_errors', 1);



$slicer = LogSlicer::create()
    ->file(__DIR__ . "/../log/php.err.log")
    ->nbLinesPerPage(5);

a($slicer->getPage(1));
a($slicer->getPage(2));
a($slicer->getPage(3));


echo str_repeat('-', 20) . '<br>';
// and now in reverse mode -----------


$slicer = LogSlicer::create()
    ->file(__DIR__ . "/../log/php.err.log")
    ->reverse()
    ->nbLinesPerPage(5);

a($slicer->getPage(1));
a($slicer->getPage(2));
a($slicer->getPage(3));



```


And here is the output:


```txt
array (size=5)
  0 => string '[220-Dec-2016 16:33:19 Europe/Paris] PHP Fatal error:  Class 'Installer\Operation\LayoutBridge\ReflectionClass' not found in /Users/me/somepath/class/Installer/Operation/LayoutBridge/LayoutBridgeDisplayLeftMenuBlocksOperation.php on line 22' (length=240)
  1 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP Stack trace:' (length=52)
  2 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  3 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:17' (length=122)
  4 => string '[226-Dec-2016 16:33:19 Europe/Paris] PHP   3. Installer\Installer->run() /Users/me/somepath/class-modules/FrontOne/FrontOneInstaller.php:50' (length=139)

array (size=5)
  0 => string '[227-Dec-2016 16:33:19 Europe/Paris] PHP   4. Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation->execute() /Users/me/somepath/class/Installer/Installer.php:49' (length=184)
  1 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP Warning:  call_user_func_array() expects parameter 1 to be a valid callback, no array or string given in /Users/me/somepath/class/Installer/Operation/Util/ArrayTransformer.php on line 21' (length=226)
  2 => string '[229-Dec-2016 19:14:13 Europe/Paris] PHP Stack trace:' (length=53)
  3 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  4 => string '[228-Dec-2016 19:14:13 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:18' (length=123)

array (size=3)
  0 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  1 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  2 => string '[22KK-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=94)

--------------------

array (size=5)
  0 => string '[22KK-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=94)
  1 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  2 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  3 => string '[228-Dec-2016 19:14:13 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:18' (length=123)
  4 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)

array (size=5)
  0 => string '[229-Dec-2016 19:14:13 Europe/Paris] PHP Stack trace:' (length=53)
  1 => string '[22-Dec-2016 19:14:13 Europe/Paris] PHP Warning:  call_user_func_array() expects parameter 1 to be a valid callback, no array or string given in /Users/me/somepath/class/Installer/Operation/Util/ArrayTransformer.php on line 21' (length=226)
  2 => string '[227-Dec-2016 16:33:19 Europe/Paris] PHP   4. Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation->execute() /Users/me/somepath/class/Installer/Installer.php:49' (length=184)
  3 => string '[226-Dec-2016 16:33:19 Europe/Paris] PHP   3. Installer\Installer->run() /Users/me/somepath/class-modules/FrontOne/FrontOneInstaller.php:50' (length=139)
  4 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP   2. FrontOne\FrontOneInstaller::install() /Users/me/somepath/www/index.tmp.php:17' (length=122)

array (size=3)
  0 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP   1. {main}() /Users/me/somepath/www/index.tmp.php:0' (length=92)
  1 => string '[22-Dec-2016 16:33:19 Europe/Paris] PHP Stack trace:' (length=52)
  2 => string '[220-Dec-2016 16:33:19 Europe/Paris] PHP Fatal error:  Class 'Installer\Operation\LayoutBridge\ReflectionClass' not found in /Users/me/somepath/class/Installer/Operation/LayoutBridge/LayoutBridgeDisplayLeftMenuBlocksOperation.php on line 22' (length=240)

```




Dependencies
------------------

- [Bat 1.36](https://github.com/lingtalfi/Bat)



History Log
------------------
    
- 1.1.0 -- 2016-12-24

    - add getNbPages
    
- 1.0.0 -- 2016-12-23

    - initial commit