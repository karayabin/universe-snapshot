PhpTailer
================
2018-03-23 -> 2021-03-05


A php wrapper for the unix tail command.



Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PhpTailer
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PhpTailer
```

Or just download it and place it where you want otherwise.



What for?
------------

As a developer, I always use the tail command to monitor the potential problems of an app.
Now my app also has a backoffice, and it's even more convenient to be able to monitor 
the logs from a backoffice (because we can add some preset filters rather than typing everything by hand).



Works only on unix machines
---------------

Why use tail instead of native php?
Because it's faster and simpler.

The unix commands used under the hood are the following:

- cat
- grep
- tail
- head

If your machine don't have installed, this planet won't be of any use for you.
I tested (successfully) my work on ubuntu 16 and mac OS X.



How?
--------

```php
<?php


use Core\Services\A;
use Module\EkomUserTracker\Interpreter\RowInterpreter\LingRowInterpreter;
use Module\EkomUserTracker\Util\UserActivityTracker\UserActivityTracker;
use Ling\PhpTailer\PhpTailer;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$file = "/myphp/log.txt";
$s = '';
for ($i = 1; $i <= 222; $i++) {
    $s .= $i . PHP_EOL;
}
file_put_contents($file, $s);


/**
 * Most complete call (with all options)
 */
PhpTailer::create()
    ->setFile($file)
    ->setReverse(true)
    ->setNumberOfItemsPerPage(20)
    ->output([
        "page" => 2,
        "expression" => null,
    ]);
```




History Log
------------------

- 1.0.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2018-03-25

    - fix negative starting line in reverse mode problem
    
- 1.0.0 -- 2018-03-23

    - initial commit



