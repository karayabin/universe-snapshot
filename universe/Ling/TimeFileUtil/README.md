TimeFileUtil
================
2017-02-23 -> 2021-03-05


A helper class to get the start date and end date from a directory.


TimeFileUtil is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.TimeFileUtil
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/TimeFileUtil
```




Why is it used for?
======================
If you have timed files, like backup files for instance,
then you can use this class to fetch the earliest and latest dates associated with those files.



Example
===========

Imagine you have a directory containing timed files, for instance:


```txt
- 20170223-backup.txt
- 20170224-backup.txt
- ...
- 20170412-backup.txt
- 20170413-backup.txt
```



```php
<?php

use Ling\TimeFileUtil\TimeFileUtil;


require_once "bigbang.php";


$dir = "/path/to/dir";

// in this example, files look like this
// 20170223--backup.txt
$tf = TimeFileUtil::create()->setExtractor(function ($fileName) {
    $year = substr($fileName, 0, 4);
    $month = substr($fileName, 4, 2);
    $day = substr($fileName, 6, 2);
    return $year . "-" . $month . "-" . $day;
});

$startDate = $tf->getStartDateByDir($dir);
$endDate = $tf->getEndDateByDir($dir);

a($startDate); // 2017-02-23
a($endDate); // 2017-04-12
```


Note, you can change the extractor callback to adapt different file formats.




History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-02-23

    - initial commit
    



