ClassCooker
===========
2017-04-11


A tool to add/remove/update methods in a class.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import ClassCooker
```

Or just download it and place it where you want otherwise.




Features
============

The following tools are available:

- getMethodsBoundaries ( ?signatureTags )
    - access the boundaries (i.e. startLine/endLine of a method) of all methods
- getMethodBoundariesByName ( name )
    - access the boundaries (i.e. startLine/endLine of a method) of a given method
- removeMethod ( methodName )
    - remove the method from the class file
- getMethodContent ( methodName )
    - get the content of a method, including the signature and wrapping curly brackets 
- addMethod ( methodName, content )
    - add a method, if it doesn't exist, to an existing class file 
- updateMethodContent ( methodName, fn updator )
    - update the inner content of a method, using a callable updator function
- getMethods ( ?signatureTags )
    - returns the list of methods, with an optional filter (filter on method's visibility and static property)




Raw example
=============


Straight from my working file.

```php
<?php

use ClassCooker\ClassCooker;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


header("content-type: text/plain");

$f = '/myphp/kaminos/app/hachis.txt';
$f = '/myphp/kaminos/app/class-core/Services/X.php';
a(ClassCooker::create()->setFile($f)->getMethodsBoundaries());
a(ClassCooker::create()->setFile($f)->getMethodsBoundaries(['protected', 'static']));
a(ClassCooker::create()->setFile($f)->getMethods(['protected', 'static']));
a(ClassCooker::create()->setFile($f)->getMethodBoundariesByName("Connexion_foo"));
//a(ClassCooker::create()->setFile($f)->removeMethod("Connexion_foo"));

$content = ClassCooker::create()->setFile($f)->getMethodContent("Connexion_foo");
a($content);
$newContent = str_replace('Connexion_foo', 'Connexion_shoo', $content);
a(ClassCooker::create()->setFile($f)->addMethod("Connexion_shoo", $newContent));
a(ClassCooker::create()->setFile($f)->updateMethodContent("Core_webApplicationHandler", function ($content) {
    return $content .  "\t\t// oooo" . PHP_EOL;
}));

```








History Log
------------------
    
- 1.4.1 -- 2017-04-23

    - fix getMethods returning commented methods
    
- 1.4.0 -- 2017-04-11

    - add getMethodSignature method
    
- 1.3.0 -- 2017-04-11

    - fix addMethod handles the case of an empty class
    
- 1.2.0 -- 2017-04-11

    - fix ignore commented methods
    
- 1.1.0 -- 2017-04-11

    - add includeWrap argument to getMethodContent
    
- 1.0.0 -- 2017-04-11

    - initial commit