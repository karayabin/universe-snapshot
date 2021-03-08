CrudWithFile
===========
2017-05-04 -> 2021-03-05



An object to do simple crud request on a file containing rows.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.CrudWithFile
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/CrudWithFile
```

Or just download it and place it where you want otherwise.


Head first
==========



```php
<?php


use Ling\CrudWithFile\CrudWithFile;

require_once __DIR__ . "/bigbang.php";


$c = CrudWithFile::create(__DIR__ . "/twitter.rows.php", ['firstName']);
//a($c->getRows());
//a($c->getRow('Shogun'));
a($c->delete('Shogun'));
a($c->insert([
    "firstName" => "Shogun",
    "lastName" => "Mantra",
    "userName" => "@shotra",
]));
a($c->update("Gary", [
    'firstName' => 'Gary',
    'lastName' => 'Jartet',
    'userName' => '@gjwish',
]));
```


### twitter.rows:

```txt
<?php
$rows = [
    [
        'firstName' => 'Mark',
        'lastName' => 'Otto',
        'userName' => '@mdo',
    ],
    [
        'firstName' => 'Jacob',
        'lastName' => 'Thornton',
        'userName' => '@fat',
    ],
    [
        'firstName' => 'Larry',
        'lastName' => 'the Bird',
        'userName' => '@twitter',
    ],
    [
        'firstName' => 'Aziz',
        'lastName' => 'Bethune',
        'userName' => '@loopz',
    ],
    [
        'firstName' => 'Gary',
        'lastName' => 'Jartet',
        'userName' => '@gjwish',
    ],
    [
        'firstName' => 'Mark',
        'lastName' => 'Coulio',
        'userName' => '@coulio',
    ],
    [
        'firstName' => 'Shogun',
        'lastName' => 'Mantra',
        'userName' => '@shotra',
    ],
];


```






History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-05-04

    - initial commit