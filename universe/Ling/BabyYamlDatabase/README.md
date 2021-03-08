BabyYamlDatabase
===========
2019-09-16 -> 2021-03-05



A tool to use [babyYaml](https://github.com/lingtalfi/BabyYaml) files as a mini-database.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.BabyYamlDatabase
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/BabyYamlDatabase
```

Or just download it and place it where you want otherwise.






Summary
===========
- [BabyYamlDatabase api](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/pages/conception-notes.md)
- [How to use](#how-to-use)



How to use
============

Here is some playground code for you to get started.
Also check the conception notes (link above).


```php

<?php 


$db = new BabyYamlDatabase();
$db->setFile(__DIR__ . "/test.byml");
$db->setRootKey(null);
$db->insert("user", [
    "name" => "john",
    "age" => "46",
]);
az();

a($db->deleteItemByKey("user", [
    "id" => 4,
    "age" => 46,
]));
az();


a($db->updateItemByKey("user", [
    "id" => 5,
], [
    "name" => "mike",
    "id" => 48,
]));
az();


az($db->getItemByKey("user", [
    "id" => 56,
]));

az($db->getItemsByKey("user", [
    "name" => "mike",
]));

```


Example of a babyYaml file:
-------

```yaml
tables: 
    user: 
        - 
            name: john
            age: 46
            id: 1
        
    

config: 
    constraints: 
        user: 
            ric: 
                - id
            
            auto_incremented_key: id
        
    
```






History Log
=============

- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2019-09-16

    - fix BabyYamlDatabase->deleteItemByKey holes in the remaining array
    
- 1.0.1 -- 2019-09-16

    - fix BabyYamlDatabase->insert not returning a value

- 1.0.0 -- 2019-09-16

    - initial commit