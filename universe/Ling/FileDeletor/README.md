FileDeletor
===============
2018-03-09 -> 2021-03-05


A tool for deleting entries.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.FileDeletor
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/FileDeletor
```

Or just download it and place it where you want otherwise.



How to use
===============

```php
<?php


use Core\Services\A;
use Ling\FileDeletor\FileDeletor;


// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$appDir = A::appDir();
$entries = [
    "cache/derby/cache/Ekom",
    "cache/derby/cache/Ekom.*", // note that you can use the wildcard: *
    "cache/derby/cache/Module.Ekom.*",
    "cache/derby/related/Ekom",
];
$n = 0;
$n2 = 0;
FileDeletor::create()
    ->setPrefix($appDir . "/")
    ->deleteEntries($entries, $n, $n2);


a("Deleted: $n, Not deleted: $n2");
```





History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2018-03-09

    - initial commit




