Dispatcher
================
2017-11-25



Some dispatchers for your app.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Dispatcher
```

Or just download it and place it where you want otherwise.







HowTo
==============


The basic dispatcher example:

```php
<?php


use Core\Services\A;
use Dispatcher\Basic\BasicDispatcher;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


BasicDispatcher::create()
    ->on("shout", function ($data) {
        a("shout third: $data"); // in this case we know data is a string
    }, 1000)
    ->on("shout", function ($data) {
        a("shout first: $data");
    })
    ->on("shout", function ($data) {
        a("shout second: $data");
    }, 100)
    ->trigger("shout", "AAAAAAHHH");



/**
 * Results:
 *
 * string(22) "shout first: AAAAAAHHH"
 *
 * string(23) "shout second: AAAAAAHHH"
 *
 * string(22) "shout third: AAAAAAHHH"
 *
 */
```








History Log
------------------
    
- 1.0.0 -- 2017-11-25

    - initial commit