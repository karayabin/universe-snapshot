Csv
=======
2017-02-03

Csv utility tools.


Csv is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/Csv
```




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






History Log
------------------
    
- 1.2.0 -- 2018-06-19

    - now CsvUtil::writeToFile creates the parent dir if it doesn't exist yet 
    
- 1.1.0 -- 2018-06-13

    - add CsvUtil::readFile $options argument

- 1.0.0 -- 2017-02-03

    - initial commit