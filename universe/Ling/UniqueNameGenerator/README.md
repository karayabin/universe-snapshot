UniqueNameGenerator
========================
2016-01-07 --> 2021-03-05



Tool to generate unique names.



UniqueNameGenerator is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.UniqueNameGenerator
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UniqueNameGenerator
```



Use cases
-------------

So far, the following use cases have been encountered:

- generate a unique filesystem name, to avoid file overwriting
- generate a unique item name, to avoid naming conflict



Example with files
-----------

```php
<?php

use Ling\UniqueNameGenerator\Generator\SimpleFileSystemUniqueNameGenerator;

require_once "bigbang.php";


$f = "/tmp/newFile.txt";

/**
* assuming /tmp/newFile.txt exists and /tmp/newFile-1.txt doesn't exist yet
*/
a(SimpleFileSystemUniqueNameGenerator::create()->generate($f));  // /tmp/newFile-1.txt    
```



Example with names
-----------

```php
<?php

use Ling\UniqueNameGenerator\Generator\ItemUniqueNameGenerator;

require_once "bigbang.php";


$f = "A";
a(ItemUniqueNameGenerator::create()->setNamePool([
    'A',
    'A-2',
    'A-3',
])->generate($f)); // A-4
```







The SimpleFileSystemUniqueNameGenerator class 
----------------


Use this to generate names like this:

- fileName.jpg
- fileName - copy.jpg
- fileName - copy 2.jpg
- fileName - copy 3.jpg


or like this (default):

- fileName.jpg
- fileName-2.jpg
- fileName-3.jpg



Use the setGenerateAffixCb to generate the variable part, given an auto-incremented number.
For instance to emulate the first of the above examples, we can do this: 

```php
<?php

use Ling\UniqueNameGenerator\Generator\SimpleFileSystemUniqueNameGenerator;

require_once "bigbang.php";


$f = "/tmp/newFile.txt";


a(SimpleFileSystemUniqueNameGenerator::create()->setGenerateAffixCb(function ($n) { // n is auto-incremented and starts with 1
    if ($n === 1) {
        return ' - copy';
    }
    return ' - copy ' . $n;
})->generate($f));
```





Dependencies
------------------

- [lingtalfi/Bat 1.27](https://github.com/lingtalfi/Bat)


History Log
------------------

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2017-02-21

    - add ItemUniqueNameGenerator
    
- 1.0.0 -- 2016-01-07

    - initial commit
    
    