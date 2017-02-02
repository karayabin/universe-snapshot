AdminTable
===============
2016-12-23


An object to display administrable list of rows.

AdminTable is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.


[![admintable.png](https://s19.postimg.org/k6nl1f2sj/admintable.png)](https://postimg.org/image/l8xrjyllr/)



Features
=============

- customizable
- flexible
- works with array or with rows from databases
- prebuilt with a few widgets (search, pagination, multiple action, ...)



What's a ric?
================

Ric = row unique identifier.


So you want to display a list of rows.

Each row is an array with a given structure.

Only the values change from a row to another (the keys don't change).

Ric stands for the row unique identifier.

It's the minimal set of keys that allow to identify any row.
 
If your rows come from a mysql database, then often the ric is a simple array containing the id column:

```php
$ric = ['id'];
```

In terms of mysql, the ric is the equivalent of the primary key if you will.

However, the interesting thing is that this property is also needed for regular arrays,
as we still need to identify every row (for instance if we want to link to an edit form specific to that row).

In some cases, the ric needs more than just one column:

```php
$ric = ['pseudo', 'city'];
```

The conception notes
=======================

The following notes are taken from the source code of the AdminTable class; they explain the basic mechanism of the AdminTable.


```php
The AdminTable features
------------------------------

- display the table rows
     - each row is composed of the same number of columns
     - each column is identified by a <column id>
     - accepts <extra columns> which can be positioned with precision

- display the table widgets. Widgets are things around the table, that you can activate/deactivate:
     - pageSelector
     - search
     - nippSelector
     - pagination
     - multipleActions

- can show/hide the checkboxes

- can trigger actions:
     - multipleAction, using the multipleAction widget
             you register a multipleAction using the setMultipleAction method.
             setMultipleAction ( actionId, func )
                     The func will receive a rics arguments.
                     rics is an array of ric (an array containing "ric field => value" entries).


     - singleAction, per row, using javascript built-in features.
                 you register a singleAction using the setSingleAction method.
                 setSingleAction ( actionId, func )
                     The func will receive a ric argument.
                     ric is an array containing "ric field => value" entries.

             The following css classes have special meaning when added to an element (like a link for instance):
             - confirmlink: will trigger a confirm dialog before processing the click on the element
             - postlink: the element must also have two attributes:
                             data-action="the-action-id"
                             data-ric="{ric}"
                         A third attribute is optional, for your convenience:
                             data-value="what you want here"
                         The postlink will create a form and submit it, so that you can handle it
                         with a singleAction handler.
                         The form will contain the following values:
                                 action: the-action-id
                                 ric: 42 (for instance)
                                 ?value: what you want here


- provide actions handling methods
     - you can manually call the handleActions method, which will handle the actions.
             By default, the actions will be called only when you print the table (displayTable method),
             but sometimes, you need to print something special before the table is displayed,
             and after the actions are handled, so.
             If you call the handleActions method manually, then the displayTable method
             won't handle the actions again.



- can transform any column content (including <extra columns>)

- drives a Listable object, passing it the right parameters (search, sort, sortDirection, nbItemsPerPage, page)


```





The full example, using array
=====================

The example below shows a list from a regular php array, purposely using all the available options,
so that the experienced user can get a gist of how it works.

It illustrates the flexibility of AdminTable. 

Don't be scared, simple examples are following...

```php
<?php


use AdminTable\Listable\ArrayListable;
use AdminTable\Table\AdminTable;
use AdminTable\Table\ListWidgets;
use AdminTable\View\AdminTableRenderer;

require_once "bigbang.php";
ini_set('display_errors', 1);
?>
    <link rel="stylesheet" href="/style/admintable.css">
<?php

$arr = [
    [
        'id' => 1,
        'name' => "Paul",
    ],
    [
        'id' => 2,
        'name' => "Rachel",
    ],
    [
        'id' => 3,
        'name' => "Marie",
    ],
    [
        'id' => 4,
        'name' => "Koala",
    ],
    [
        'id' => 5,
        'name' => "Michelle",
    ],
    [
        'id' => 6,
        'name' => "Felicia",
    ],
];

$list = AdminTable::create()
    ->setRic(['id', 'name'])
    ->setRicSeparator('--*--')
    ->setWidgets(ListWidgets::create()
        ->setNbItemsPerPageList([1, 2, 5, 'all'])
//        ->disableMultipleActions()
        ->disablePagination()
        ->disableNippSelector()
        ->disablePageSelector()
        ->disableSearch()
    )
    ->setListable(ArrayListable::create()->setArray($arr))
    ->setExtraColumn('edit', '<a href="/somepath?ric={ric}" >Edit</a>', 0)
    ->setExtraColumn('delete', '<a href="#" class="confirmlink postlink" data-action="delete" data-ric="{ric}" data-value="myvalue">Delete</a>')
    ->setTransformer('name', function ($v, $item, $ricValue) {
        return strtoupper($v);
    })
    ->setTransformer('edit', function ($v, $item, $ricValue) {
        return str_replace('{ric}', $ricValue, $v);
    })
    ->setTransformer('delete', function ($v, $item, $ricValue) {
        return str_replace('{ric}', $ricValue, $v);
    })
    ->setSingleActionHandler('delete', function ($ric) {
        a($ric);
    })
    ->setMultipleActionHandler('deleteAll', 'Delete All', function ($rics) {
        a($rics);
    }, true)
    ->setRenderer(AdminTableRenderer::create());


$list->tableGetKey = "name";
$list->pageGetKey = "page";
$list->nbItemsPerPageGetKey = "nipp";
$list->sortColumnGetKey = "sort";
$list->sortColumnDirGetKey = "dir";
$list->searchGetKey = "search";


$list->nbItemsPerPage = 2;
$list->sortColumn = "id";
$list->sortColumnDir = "desc";

$list->showCheckboxes = true;
$list->columnLabels = [
    'edit' => "",
];
$list->hiddenColumns = [
    'id',
];

$list->displayTable();

```


My comments: here we have a lot of flexibility because of the setExtraColumn and setTransformer methods, coupled together.

Basically, we can write anything, anywhere.

For instance, the edit link is create using the following statements:

```php
->setExtraColumn('edit', '<a href="/somepath?ric={ric}" >Edit</a>', 0)
->setTransformer('edit', function ($v, $item, $ricValue) {
        return str_replace('{ric}', $ricValue, $v);
    })
```

This can be used as a pattern to create any external link that needs the ric values.

Decoupling the extra columns and the transformer (with the help of the javascript built-in tools) really makes the AdminTable 
object intuitive to use, flexible and powerful.





The simple example, using pdo
===============================

And now a regular example, using [QuickPdo](https://github.com/lingtalfi/QuickPdo).

```php
<?php



use AdminTable\Listable\QuickPdoListable;
use AdminTable\Table\AdminTable;
use AdminTable\View\AdminTableRenderer;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);
?>
    <link rel="stylesheet" href="/style/admintable.css">
<?php


$fields = '
c.id,
c.equipe_id,
o.nom as equipe_nom,
c.titre,
c.url_photo,
c.url_video,
c.date_debut,
c.date_fin,
c.lots,
c.reglement,
c.description
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$list = AdminTable::create()
    ->setRic(['id'])
    ->setListable(QuickPdoListable::create()->setFields($fields)->setQuery($query))
    ->setRenderer(AdminTableRenderer::create());
$list->displayTable();



```




Dependencies
------------------

- [lingtalfi/QuickPdo 1.23.0](https://github.com/lingtalfi/QuickPdo), if you use the QuickPdo Listable




History Log
------------------

- 1.2.0 -- 2017-01-01

    - AdminTableRenderer, add getTableId method
    
- 1.1.0 -- 2016-12-24

    - add some hooks
    
- 1.0.1 -- 2016-12-24

    - fix singleActions not initialized
    
- 1.0.0 -- 2016-12-23

    - initial commit
    