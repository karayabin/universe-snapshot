RowsGenerator
================
2017-04-30



Generating rows for a dataTable like widget.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import RowsGenerator
```

Or just download it and place it where you want otherwise.


What is it
==============
When you want to provide a datatable like widget, your user needs to be able to shape 
the rows using the widget (typically, sorting the rows, or searching the rows, changing the page (slice) being viewed).

A rows generator gives you the rows that you want, according to the user settings, 
plus the total number of items for a given request, so that you can focus on other areas of the widget implementation.









Examples
=============


Example with ArrayRowsGenerator's search items
----------------------------------------------------

Documentation is in RowsGeneratorInterface's source code.


```php

$data[] = array('volume' => 67, 'edition' => 2, "pou" => "abc");
$data[] = array('volume' => 86, 'edition' => 1, "pou" => "def");
$data[] = array('volume' => 85, 'edition' => 6, "pou" => "ghi");
$data[] = array('volume' => 98, 'edition' => 2, "pou" => "jkl");
$data[] = array('volume' => 86, 'edition' => 6, "pou" => "mno");
$data[] = array('volume' => 67, 'edition' => 2, "pou" => "pab");
$data[] = array('volume' => 67, 'edition' => 2, "pou" => "chop");
$data[] = array('volume' => 67, 'edition' => 2, "pou" => "karma");


a(ArrayRowsGenerator::create()
    ->setSortValues(['edition' => 'asc', 'volume' => 'desc'])
    ->setSearchItems([
        'volume' => function ($v) {
            return ($v < 80);
        },
        'edition' => 2,
        'pou' => ['like%', "a"],
    ])
    ->setArray($data)->getRows());
```

Returns

```php
array(1) {
  [0] => array(3) {
    ["volume"] => int(67)
    ["edition"] => int(2)
    ["pou"] => string(5) "karma"
  }
}

```



Example with QuickPdoRowsGenerator
------------------------------

This in example using the kamille framework, don't be distracted by implementation details.



```php
A::quickPdoInit();


a(QuickPdoRowsGenerator::create()
    ->setSearchItems([
        "id" => ["<", "3"],
        "lots" => ["like", "de"],
    ])
    ->setSortValues([
        "id" => "desc",
    ])
    ->setFields('
 c.id,
 c.`equipe_id`,
 o.nom as equipe_nom,
 c.titre,
 c.url_photo,
 c.url_video,
 c.date_debut,
 c.date_fin,
 c.lots,
 c.reglement,
 c.description      
    ')
    ->setQuery('select %s from oui.concours c inner join oui.equipe o on o.id=c.equipe_id')
    ->getRows());
```




Related
=============
- https://github.com/lingtalfi/RowsGeneratorWidget



History Log
------------------
    
- 1.6.0 -- 2018-06-11

    - add QuickPdoRowsGenerator.doGetNbTotalItems protected method
    - add QuickPdoRowsGenerator.doGetRows protected method
    
- 1.5.0 -- 2017-06-22

    - ArrayRowsGenerator fix sort comparison function
    
- 1.4.0 -- 2017-06-19

    - add RowsGeneratorInterface.getNbItemsPerPage
    
- 1.3.0 -- 2017-06-19

    - add RowsGeneratorInterface.getSortValues and getSearchItems
    
- 1.2.5 -- 2017-05-18

    - fix QuickPdoRowsGeneratorUtil.getAliasNames
    
- 1.2.4 -- 2017-05-09

    - fix QuickPdoRowsGenerator maxPage=0
    
- 1.2.3 -- 2017-05-02

    - fix QuickPdoRowsGenerator, getAliasNames and getFunctionalNames bug
    
- 1.2.2 -- 2017-05-01

    - fix ArrayRowsGenerator
    
- 1.2.1 -- 2017-05-01

    - fix RowsTransformerUtil
    
- 1.2.0 -- 2017-05-01

    - add RowsTransformerUtil
    
- 1.1.0 -- 2017-04-30

    - add getPage method
    
- 1.0.0 -- 2017-04-30

    - initial commit
    