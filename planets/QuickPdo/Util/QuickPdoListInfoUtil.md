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




###### Example using setBetweens

```php
<?php


use Core\Services\A;
use QuickPdo\Util\QuickPdoListInfoUtil;


// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();


$skeleton = "
select %s 
from `ek_order` h
left join ek_user `u` on `u`.id=h.user_id  
";


$util = QuickPdoListInfoUtil::create()
    ->setQuerySkeleton($skeleton)
    ->setQueryCols([
        'h.id',
        'h.user_id',
        'h.reference',
        '(
select if(
    date(ek_user.date_creation) = date(ek_order.date),
    "1",
    "0"
) as new_c
from ek_order 
left join ek_user on ek_order.user_id=ek_user.id
where ek_order.id=h.id
        
        ) as new_client',
        'h.date',
        'h.amount',
        'h.coupon_saving',
        'h.cart_quantity',
        'h.currency_iso_code',
        'h.lang_iso_code',
        '(
select label 
from ek_order
left join ek_country on  ek_country.iso_code=ek_order.shipping_country_iso_code
where ek_order.id=h.id
        ) as shipping_country_iso_code',
        'h.payment_method',
        'h.payment_method_extra',
        'concat( u.id, ". ", u.email ) as `user`',
    ]);


$util->setRealColumnMap([
    'user' => [
        'u.id',
        'u.email',
    ],
    'id' => "h.id",
    'date_low' => "h.date",
    'date_high' => "h.date",
]);

$util->setHaving([
    'new_client',
    'shipping_country_iso_code',
]);

$util->setOperators([
    "date_low" => '>=',
    "date_high" => '<=',
]);


$params = [
    'sort' => [
        "date" => 'desc',
    ],
    'filters' => [
        'new_client' => '0',
        'reference' => 'LF-20171208',
        'date_low' => '2017-12-08 10:00:00',
        'date_high' => '2017-12-08 11:00:00',
    ],
];
$info = $util->execute($params);
a($info);


```
