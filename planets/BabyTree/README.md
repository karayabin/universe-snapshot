FileSystemScanner
===================
2015-11-11



Get basic file information (type, path, link target, permissions, ownership) about the entries of a given directory, recursively.
 
 
 
 
Example
-----------

FileSystemScanner is part of BabyTree, which can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).

```php
<?php


use BabyTree\Scanner\BabyTreeScanner;

require_once "bigbang.php";

$f = "/path/to/myapp/www";

a(FileSystemScanner::create()->scanDir($f));
```

The above code on my machine gives the following output:

```
array (size=11)
  0 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string '.DS_Store' (length=9)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  1 => 
    array (size=6)
      'type' => string 'dir' (length=3)
      'path' => string 'js' (length=2)
      'linkTarget' => boolean false
      'perms' => string 'drwxr-xr-x' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  2 => 
    array (size=6)
      'type' => string 'dir' (length=3)
      'path' => string 'libs' (length=4)
      'linkTarget' => boolean false
      'perms' => string 'drwxr-xr-x' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  3 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string 'libs/.DS_Store' (length=14)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  4 => 
    array (size=6)
      'type' => string 'dir' (length=3)
      'path' => string 'libs/jquery' (length=11)
      'linkTarget' => boolean false
      'perms' => string 'drwxr-xr-x' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  5 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string 'libs/jquery/jquery.js' (length=21)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  6 => 
    array (size=6)
      'type' => string 'dir' (length=3)
      'path' => string 'log' (length=3)
      'linkTarget' => boolean false
      'perms' => string 'drwxr-xr-x' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  7 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string 'log/app.log' (length=11)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  8 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string 'log/applog.txt' (length=14)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  9 => 
    array (size=6)
      'type' => string 'file' (length=4)
      'path' => string 'sandbox-pretest.php' (length=19)
      'linkTarget' => boolean false
      'perms' => string '-rw-r--r--' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
  10 => 
    array (size=6)
      'type' => string 'link' (length=4)
      'path' => string 'tests' (length=5)
      'linkTarget' => string '/path/to/apptests/web/tests' (length=100)
      'perms' => string 'drwxr-xr-x' (length=10)
      'owner' => string 'lingtalfi' (length=13)
      'ownerGroup' => string 'staff' (length=5)
```
 
 