FileCreator
================
2016-12-26



Create a file, line by line, or block by block.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



This class is very simple, and yet useful when you need to write some code, based
on conditions.

The available method are:

- line: creates one line
- block: creates a block of lines
- space: creates a space 


Example
============
```php


$c = new FileCreator();
$c->block('<?php
//--------------------------------------------
// FUNCTIONS
//--------------------------------------------
require_once __DIR__ . "/functions/main-functions.php";
');

$c->space(3);


$file = APP_ROOT_DIR . "/init.php";
if (false !== file_put_contents($file, $c->render())) {
    return true;
}
return false;


```
    
    


History Log
------------------
    
- 1.0.0 -- 2016-12-26

    - initial commit