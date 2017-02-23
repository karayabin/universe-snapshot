TimeFileUtil
================
2017-02-23


A helper class to get the start date and end date from a directory.



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

use TimeFileUtil\TimeFileUtil;


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

- 1.0.0 -- 2017-02-23

    - initial commit
    



