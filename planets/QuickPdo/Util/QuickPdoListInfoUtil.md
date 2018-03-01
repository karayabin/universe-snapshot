QuickPdoListInfoUtil
=================
2018-01-16




What is it?
-------------------
A utility to generate the data necessary to display a list.
 

 

Example
=============

```php
<?php


use Core\Services\A;
use QuickPdo\Util\QuickPdoListInfoUtil;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$info = QuickPdoListInfoUtil::create()
    ->setQuerySkeleton("select %s from ek_category")
    ->setQueryCols([
        "id",
        "name",
        "category_id",
        "shop_id",
        "order",
    ])
    ->execute([ // if you want, you can just pass nothing here, but for the demo I wanted to show off the options
        'page' => 2,
        'sort' => ['id'=> 'desc'],
        'filters' => ['id'=> '4'],
        'nipp' => 3,
    ]);
az($info);
```