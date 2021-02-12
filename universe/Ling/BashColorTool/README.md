BashColorTool
================
2018-03-22



A tool to create quick colored messages in console.

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/BashColorTool
```

Or just download it and place it where you want otherwise.





Howto
-----------

```php
<?php


use Ling\BashColorTool\BashColorTool;


//--------------------------------------------
// THIS SCRIPT GENERATES AN API FOR A GIVEN MODULE
//--------------------------------------------

/**
 * assuming this script is located at /your/kamille_app/scripts/xiao-generator.php
 * Then, after configuring this script to your likings,
 * I recommend that you create an alias:
 *
 *          alias xiaop='php -f /your/kamille_app/scripts/xiao-generator-peipei.php'
 *
 *
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";




BashColorTool::success("ok");
BashColorTool::info("ok");
BashColorTool::warning("ok");
BashColorTool::error("ok");
BashColorTool::output("ok", "red", "blue"); // foreground: red, background: blue
```








History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2018-03-22

    - initial commit