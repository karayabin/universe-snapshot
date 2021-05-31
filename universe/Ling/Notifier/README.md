Notifier
============
2017-06-18 -> 2021-03-05


A simple observer with php callable.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Notifier
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Notifier
```

Or just download it and place it where you want otherwise.






How to?
==========

The following example uses the [kamille framework](https://github.com/lingtalfi/kamille), 
but you can easily adapt the code to your framework.


```php
<?php


use Ling\Notifier\Notifier;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


//--------------------------------------------
// SIMPLE EXAMPLE
//--------------------------------------------
$o = new Notifier();
$o->subscribe("welcomeText", function () {
    a("hello");
});

$o->subscribe("welcomeText", function () {
    a("world");
});


$o->notify('welcomeText');


//--------------------------------------------
// SIMPLE EXAMPLE WITH ARGS
//--------------------------------------------
$o = new Notifier();
$o->subscribe("welcomeText", function ($number, $animal) {
    a("hello $number, $animal");
});

$o->subscribe("welcomeText", function ($number, $animal) {
    a("world $number, $animal");
});


$o->notify('welcomeText', 6, 'cat');

```






History Log
------------------

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-06-18

    - initial commit
    
    
    
    
    
    