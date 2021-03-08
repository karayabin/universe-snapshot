Csv
=======
2017-02-03 -> 2021-03-05

Csv utility tools.


Csv is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Csv
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/Csv
```


Documentation
==============
- [Csv api](https://github.com/lingtalfi/Csv/blob/master/doc/api/Ling/Csv.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))



Usage
===========


Write example
-----------

```php
<?php


use Ling\Csv\CsvUtil;

require_once "bigbang.php";

$data = [
    ["COM_00001", "P_00001"],
    ["COM_00001", "P_00002"],
    ["COM_00001", "P_00003"],
    ["COM_00001", "P_00004"],
    ["COM_00002", "PX_00001"],
    ["COM_00002", "AJ_00002"],
    ["COM_00002", "PX_00003"],
];


$f = __DIR__ . "/../assets/csv-commande/test1.csv";
CsvUtil::writeToFile($data, $f);
```


Read example
-----------

```php
<?php


use Ling\Csv\CsvUtil;

require_once "bigbang.php";

$f = __DIR__ . "/../assets/csv-commande/test1.csv";
a(CsvUtil::readFile($f));
```


Will output something like:

```html
array(7) {
  [0] => array(2) {
    [0] => string(9) "COM_00001"
    [1] => string(7) "P_00001"
  }
  [1] => array(2) {
    [0] => string(9) "COM_00001"
    [1] => string(7) "P_00002"
  }
  [2] => array(2) {
    [0] => string(9) "COM_00001"
    [1] => string(7) "P_00003"
  }
  [3] => array(2) {
    [0] => string(9) "COM_00001"
    [1] => string(7) "P_00004"
  }
  [4] => array(2) {
    [0] => string(9) "COM_00002"
    [1] => string(8) "PX_00001"
  }
  [5] => array(2) {
    [0] => string(9) "COM_00002"
    [1] => string(8) "AJ_00002"
  }
  [6] => array(2) {
    [0] => string(9) "COM_00002"
    [1] => string(8) "PX_00003"
  }
}
```





History Log
------------------

- 1.3.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.1 -- 2019-10-07

    - fix wrong README.md link 
    
- 1.3.0 -- 2019-10-07

    - add CsvUtil::getString 
    
- 1.2.1 -- 2019-09-05

    - update README.md 
    
- 1.2.0 -- 2018-06-19

    - now CsvUtil::writeToFile creates the parent dir if it doesn't exist yet 
    
- 1.1.0 -- 2018-06-13

    - add CsvUtil::readFile $options argument

- 1.0.0 -- 2017-02-03

    - initial commit