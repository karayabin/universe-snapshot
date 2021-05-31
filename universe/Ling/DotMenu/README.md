DotMenu
===========
2019-08-08 -> 2021-03-05



A tool to create a menu using bdot notation.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.DotMenu
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/DotMenu
```

Or just download it and place it where you want otherwise.






Summary
===========
- [DotMenu api](https://github.com/lingtalfi/DotMenu/blob/master/doc/api/Ling/DotMenu.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/DotMenu/blob/master/doc/pages/conception-notes.md)
- [How to use](#how-to-use)




How to use
===========

The following code: 

```php
$array = [
    "one" => [
        "id" => "one",
        "children" => [],
    ],
    "two" => [
        "id" => "two",
        "children" => [],
    ],
    "three" => [
        "id" => "three",
        "children" => [
            "four" => [
                "id" => "four",
                "children" => [],
            ],
        ],
    ],
    "uni.verse" => [
        "id" => "uni.verse",
        "children" => [],

    ],
];


$dot = new DotMenu();
$dot->setItems($array);

$dot->appendItem([
    "id" => "five",
    "children" => [],
], "two");


$dot->appendItem([
    "id" => "six",
    "children" => [],
], "three");


$dot->appendItem([
    "id" => "seven",
    "children" => [],
], "three.four");

$dot->appendItem([
    "id" => "eight",
    "children" => [],
], "uni\.verse");


a($dot->getItems());

```


Will output:

```html

array(4) {
  ["one"] => array(2) {
    ["id"] => string(3) "one"
    ["children"] => array(0) {
    }
  }
  ["two"] => array(2) {
    ["id"] => string(3) "two"
    ["children"] => array(1) {
      ["five"] => array(2) {
        ["id"] => string(4) "five"
        ["children"] => array(0) {
        }
      }
    }
  }
  ["three"] => array(2) {
    ["id"] => string(5) "three"
    ["children"] => array(2) {
      ["four"] => array(2) {
        ["id"] => string(4) "four"
        ["children"] => array(1) {
          ["seven"] => array(2) {
            ["id"] => string(5) "seven"
            ["children"] => array(0) {
            }
          }
        }
      }
      ["six"] => array(2) {
        ["id"] => string(3) "six"
        ["children"] => array(0) {
        }
      }
    }
  }
  ["uni.verse"] => array(2) {
    ["id"] => string(9) "uni.verse"
    ["children"] => array(1) {
      ["eight"] => array(2) {
        ["id"] => string(5) "eight"
        ["children"] => array(0) {
        }
      }
    }
  }
}


```







History Log
=============

- 1.0.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2021-03-01

    - update DotMenu->appendItem, now throws exception if the item doesn't contain the idKey
  
- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2019-08-08

    - update readme.md
    
- 1.0.0 -- 2019-08-08

    - initial commit