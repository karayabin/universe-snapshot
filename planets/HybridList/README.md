HybridList
===========
2017-11-07



A helper for building a list system in your app. 


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import HybridList
```

Or just download it and place it where you want otherwise.


How to
==========

Basically, the HybridList is an object that you can configure and it returns an array containing the following info:

- items: the rows
- sliceNumber: the number of the slice representing the items (aka the current page number)
- sliceLength: the number of items per slice
- totalNumberOfItems: the total number of items
- offset: the offset of the returned slice's first element (compared to the whole items array)




Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php


use Core\Services\A;
use HybridList\HybridList;
use HybridList\ListShaper\ListShaper;
use HybridList\RequestGenerator\SqlRequestGenerator;
use HybridList\RequestShaper\RequestShaper;
use HybridList\SqlRequest\SqlRequest;
use HybridList\SqlRequest\SqlRequestInterface;
use Module\Ekom\Api\EkomApi;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();

EkomApi::inst()->initWebContext();


$info = HybridList::create()
    ->setListParameters([
        'badge' => "pt20",
        'sort' => "wholesale_price_desc",
        'boris' => "tamere",
//        'sort' => "wholesale_price_asc",
    ])
    ->setRequestGenerator(SqlRequestGenerator::create()
        ->setSqlRequest(SqlRequest::create()
            ->addField("*")
            ->setTable("ek_shop_has_product")
            ->setLimit(0, 5)
        )
        ->addRequestShaper(RequestShaper::create()
            ->reactsTo('badge')
            ->setExecuteCallback(function ($input, SqlRequestInterface $r) {
                a("price: input was received: $input");
                $r->addWhere("
                and _discount_badge='$input'
                ");
            })
        )
        ->addRequestShaper(RequestShaper::create()
            ->reactsTo('sort')
            ->setExecuteCallback(function ($input, SqlRequestInterface $r) {
                if ('wholesale_price_desc' === $input) {
                    $r->addOrderBy("wholesale_price", "desc");
                } else {
                    $r->addOrderBy("wholesale_price", "asc");
                }
            })
        )
    )
    ->addListShaper(ListShaper::create()
        ->reactsTo("boris")
        ->setExecuteCallback(function($input, array &$rows){
            $rows[] = "boris tamere";
        })
    )
    ->execute();
az($info);
```


Output:

```txt
string(31) "price: input was received: pt20"

string(118) "select count(*) as count
from ek_shop_has_product
where 1

                and _discount_badge='pt20'
                "

string(144) "select 
*
from ek_shop_has_product
where 1

                and _discount_badge='pt20'
                
order by wholesale_price desc
limit 0, 5"

string(3) "431"

array(6) {
  [0] => array(12) {
    ["shop_id"] => string(1) "1"
    ["product_id"] => string(3) "829"
    ["price"] => NULL
    ["wholesale_price"] => string(7) "3167.74"
    ["quantity"] => string(3) "171"
    ["active"] => string(1) "1"
    ["_discount_badge"] => string(4) "pt20"
    ["seller_id"] => string(1) "1"
    ["product_type_id"] => string(1) "1"
    ["reference"] => string(16) "3463-card-505283"
    ["_popularity"] => string(4) "0.00"
    ["codes"] => string(0) ""
  }
  [1] => array(12) {
    ["shop_id"] => string(1) "1"
    ["product_id"] => string(3) "413"
    ["price"] => NULL
    ["wholesale_price"] => string(7) "2800.93"
    ["quantity"] => string(3) "217"
    ["active"] => string(1) "1"
    ["_discount_badge"] => string(4) "pt20"
    ["seller_id"] => string(1) "1"
    ["product_type_id"] => string(1) "1"
    ["reference"] => string(16) "5034-card-396414"
    ["_popularity"] => string(4) "0.00"
    ["codes"] => string(0) ""
  }
  [2] => array(12) {
    ["shop_id"] => string(1) "1"
    ["product_id"] => string(3) "790"
    ["price"] => NULL
    ["wholesale_price"] => string(7) "2277.00"
    ["quantity"] => string(3) "128"
    ["active"] => string(1) "1"
    ["_discount_badge"] => string(4) "pt20"
    ["seller_id"] => string(1) "1"
    ["product_type_id"] => string(1) "1"
    ["reference"] => string(16) "1564-card-707250"
    ["_popularity"] => string(4) "0.00"
    ["codes"] => string(0) ""
  }
  [3] => array(12) {
    ["shop_id"] => string(1) "1"
    ["product_id"] => string(4) "1278"
    ["price"] => NULL
    ["wholesale_price"] => string(7) "2277.00"
    ["quantity"] => string(3) "156"
    ["active"] => string(1) "1"
    ["_discount_badge"] => string(4) "pt20"
    ["seller_id"] => string(1) "1"
    ["product_type_id"] => string(1) "1"
    ["reference"] => string(21) "1564-4914-card-180231"
    ["_popularity"] => string(4) "0.00"
    ["codes"] => string(0) ""
  }
  [4] => array(12) {
    ["shop_id"] => string(1) "1"
    ["product_id"] => string(3) "366"
    ["price"] => NULL
    ["wholesale_price"] => string(7) "2101.09"
    ["quantity"] => string(3) "171"
    ["active"] => string(1) "1"
    ["_discount_badge"] => string(4) "pt20"
    ["seller_id"] => string(1) "1"
    ["product_type_id"] => string(1) "1"
    ["reference"] => string(16) "3457-card-441436"
    ["_popularity"] => string(4) "0.00"
    ["codes"] => string(0) ""
  }
  [5] => string(12) "boris tamere"
}

```



More doc
------------

- In the **doc/hybrid-list-prototype.md** document
- In the **doc/hybrid-list-controls.md** document


History Log
------------------
    
- 1.16.0 -- 2017-12-11

    - fix SqlPaginatorHybridListControl problem with nbItems=0  
    
- 1.15.0 -- 2017-12-11

    - add ArrayPaginatorHybridListControl  
    
- 1.14.0 -- 2017-12-11

    - add RequestGenerator.setItems method  
    
- 1.13.0 -- 2017-12-01

    - add SqlPaginatorHybridListControl  
    
- 1.12.0 -- 2017-11-17

    - add HybridList.setControlContext method  
    - fix HybridList forgot control implementation 
    
- 1.11.1 -- 2017-11-17

    - fix HybridList listShapers/listParameters typo 
    
- 1.11.0 -- 2017-11-17

    - add HybridListInterface.removeControl method 
    
- 1.10.0 -- 2017-11-17

    - add HybridListInterface.addControl method 
    
- 1.9.0 -- 2017-11-17

    - add HybridListControlInterface and control system 
    
- 1.8.0 -- 2017-11-17

    - add ListShaperInterface.getPriority method
    - update HybridList now reacts to priority system
    
- 1.7.1 -- 2017-11-16

    - fix HybridList listInfo overriding shapers return
    
- 1.7.0 -- 2017-11-16

    - add ListShaperInterface.prepareWithOriginalItems method
    
- 1.6.2 -- 2017-11-15

    - update HybridList, now multiple ListShapers can be bound to the wildcard
    
- 1.6.1 -- 2017-11-15

    - fix HybridList wildcard implementation
    
- 1.6.0 -- 2017-11-15

    - improve HybridList, now recognizes the wildcard "*" for ListShapers (dynamic shapers). Useful for pagination
    
- 1.5.2 -- 2017-11-15

    - fix HybridList now return nulls when not set for sliceNumber, sliceLength, offset
    
- 1.5.1 -- 2017-11-15

    - fix SqlRequest now the count query takes into account the distinct keyword
    
- 1.5.0 -- 2017-11-15

    - add ListShaperInterface.execute method's originalItems argument
    
- 1.4.0 -- 2017-11-14

    - add HybridListInterface.getListParameters method
    
- 1.3.0 -- 2017-11-14

    - promote most HybridList public methods to HybridListInterface
    
- 1.2.0 -- 2017-11-14

    - add HybridList.preparePhpItems protected method
    
- 1.1.0 -- 2017-11-14

    - add SqlRequestGenerator.setPdoFetchStyle method
    
- 1.0.1 -- 2017-11-14

    - fix SqlRequestGenerator not extending parent
    
- 1.0.0 -- 2017-11-07

    - initial commit

