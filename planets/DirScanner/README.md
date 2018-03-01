DirScanner
==============
2015-11-03 --> 2017-04-18



Utility to scan a directory recursively and do something on every entry.




How to use
--------------

You can install DirScanner as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).
 
 
You can use the DirScanner directly, or there is also the [YorgDirScannerTool](https://github.com/lingtalfi/DirScanner/blob/master/YorgDirScannerTool.md)
that might be easier to use for the simplest cases.
 



```php
<?php

use DirScanner\DirScanner;

require_once "bigbang.php";


$dir = '/path/to/dir';

$scanner = DirScanner::create();
$scanner->setFollowLinks(false); // default is false


if ('cli' === PHP_SAPI) {
    // console version
    $scanner->scanDir($dir, function ($path, $rPath, $level) {
        echo "path=$path; rPath=$rPath; level=$level";
        echo PHP_EOL;
    });

}
else {
    // html version
    echo '<table>';
    echo '<tr><th>path</th><th>relative path</th><th>level</th></tr>';
    $scanner->scanDir($dir, function ($path, $rPath, $level) {
        echo '<tr><td>' . $path . '</td><td>' . $rPath . '</td><td>' . $level . '</td></tr>';
    });
    echo '</table>';
}


```



### The callable

```
void    f (str:path, str:relativePath, int:level)
```

- path: full path to the entry being scanned
- relativePath: relative path starting from the root directory 
- level: deepness starting at 0 for the first level 



More examples
-------------------


### Get files with a certain extension 

```php
<?php


use Bat\FileSystemTool;
use DirScanner\DirScanner;

require_once "bigbang.php";

// get all mp4 files in the service dir
$dir = "service";
a(DirScanner::create()->scanDir($dir, function($path, $rPath, $level){
    if('mp4' === strtolower(FileSystemTool::getFileExtension($rPath))){
        return $rPath; // return as relative path for readability, or return the path if you prefer absolute path
    }
}));
```


### Get list of directories  

```php
<?php


use DirScanner\YorgDirScannerTool;

require_once "bigbang.php"; // start the local universe


$dirs = YorgDirScannerTool::getDirs("/path/to/dir");

```








History Log
------------------
    
- 1.4.1 -- 2017-12-11

    - update YorgDirScannerTool.getFilesWithExtension, extension matching system now accepts "long" extensions like "tpl.php"
    
- 1.4.0 -- 2017-04-18

    - add YorgDirScannerTool.getEntries method
    
- 1.3.0 -- 2016-02-01

    - add YorgDirScannerTool.getFilesWithExtension method
    
- 1.2.0 -- 2016-01-24

    - add YorgDirScannerTool.getDirs
    
- 1.1.0 -- 2016-01-09

    - add YorgDirScannerTool
    - add signature to scanDir method
    
- 1.0.0 -- 2015-11-03

    - initial commit
    
    