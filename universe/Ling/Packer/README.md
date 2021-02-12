Packer
==========
2017-03-23



A tool to pack multiple files into one.





How to install?
=================

Using the [universe naive importer](https://github.com/lingtalfi/universe-naive-importer):

```bash
uni import Ling/Packer
```



Why and how?
=========

You might need that tool if you are developing a command line tool that uses a lot of classes.
To export this program as one file, you need to copy paste all those classes into your script.

This class helps you in doing that, by returning all the classes compacted as one big string.


Example
==========

```php
<?php


use Ling\Packer\Packer;

require_once __DIR__ . "/../boot.php";

$d = "/myphp/kamille-installer-tool/pprivate"; // this directory contains the packages to pack
$packer = new Packer();
$c = $packer->pack($d);


```

History Log
------------------

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2017-03-24

    - fix use duplicate statements problem 
    
- 1.1.0 -- 2017-03-23

    - added priority checking, to avoid not found class errors
    
- 1.0.0 -- 2017-03-23

    - initial commit
    
    
