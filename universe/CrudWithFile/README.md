CrudWithFile
===========
2017-05-04



An object to do simple crud request on a file containing rows.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import CrudWithFile
```

Or just download it and place it where you want otherwise.


Head first
==========



```php
<?php


use CrudWithFile\CrudWithFile;

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
    
- 1.0.0 -- 2017-05-04

    - initial commit