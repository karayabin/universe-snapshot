HashMap
===========
2019-04-18 -> 2021-03-05



An utility to help creating hash maps.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.HashMap
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/HashMap
```

Or just download it and place it where you want otherwise.






Summary
===========
- [HashMap api](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use](#how-to-use)
    - [Example #1: without paths](#example-1-without-paths)
    - [Example #2: with paths](#example-2-with-paths)
- [A hash map example](#a-hash-map-example)
- [History Log](#history-log)



How to use
===========

This class helps creating a hash map.

See more details about the hash map in the [HashMapUtil class description](https://github.com/lingtalfi/HashMap/blob/master/doc/api/Ling/HashMap/Util/HashMapUtil.md).


There are basically two modes:

- either you specify the root dir without paths, in which case all files inside the root dir will be added recursively to the map
- or you specify the root dir AND some paths, in which case only the files indicated by the paths are added to the map.
      Note: a path can also point to a directory, in which case the directory and its content are added recursively to the map.


Example #1: without paths
----------

Use this mode to add a whole dir at once.


```php
//--------------------------------------------
// MODE 1: without paths
//--------------------------------------------
$util = new HashMapUtil();
$util->setRootDir($dir);
$success = $util->createMap("/tmp/map.txt");
az($success); // true
```



Example #2: with paths
----------

Use this mode to be more selective about which files to include in the map.

```php
//--------------------------------------------
// MODE 2: with paths
//--------------------------------------------
/**
 * Creating a map containing only the index.php file and the css dir.
 */
$util = new HashMapUtil();
$util->setRootDir($dir);
$util->setPaths([
    "index.php",
    "css",
]);
$success = $util->createMap("/tmp/map.txt");
az($success); // true


```



A hash map example
===========
A hash map looks like this:

```txt
index.php::d00836840aff535b3b0105eef7ee4a228420f348
css/all-forms.css::121e26534b1a43f6adb7721379b568aebe57bd4c
css/hydrogen.css::aae2665f43f2c059f9158a03a833acdb4399321d
css/hydrogen.css.map::2c22b55af5ba1d6a0e4f2a044c42cc206e7728d4
css/hydrogen.scss::edf484e3568d252dce1b5e9b5652491701d6bc4d
css/responsive.css::8dabef6e8aff5314114b4364502789277d320e81
css/tachyons.css::eb5c7576c7adb08b06b8b71aa695c87ccb96e966
```






History Log
=============

- 1.0.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.0 -- 2019-04-18

    - initial commit