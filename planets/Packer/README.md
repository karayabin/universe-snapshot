Packer
==========
2017-03-23



A tool to pack multiple files into one.





How to install?
=================

Using the [universe naive importer](https://github.com/lingtalfi/universe-naive-importer):

```bash
uni import Packer
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


use Packer\Packer;

require_once __DIR__ . "/../boot.php";

$d = "/myphp/kamille-installer-tool/pprivate"; // this directory contains the packages to pack
$packer = new Packer();
$c = $packer->pack($d);


```

History Log
------------------
        
- 1.0.0 -- 2017-03-23

    - initial commit
    
    
