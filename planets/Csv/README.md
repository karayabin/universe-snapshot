Csv
=======
2017-02-03

Csv utility tools.


This is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.




Usage
===========


Write example
-----------

```php
<?php


use Csv\CsvUtil;

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


use Csv\CsvUtil;

require_once "bigbang.php";

$f = __DIR__ . "/../assets/csv-commande/test1.csv";
a(CsvUtil::readFile($f));
```






History Log
------------------
    
- 1.0.0 -- 2017-02-03

    - initial commit