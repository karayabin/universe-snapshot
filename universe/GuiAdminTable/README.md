GuiAdminTable
===============
2018-01-15


An object to display administrable list of rows.



[![guiadmin.png](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin.png)](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin.png)



GuiAdminTable is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import GuiAdminTable
```



This is a follow up of the [AdminTable](https://github.com/lingtalfi/AdminTable) planet.


The reason I was not happy with AdminTable is that it was mixing both the view and the logic.

Now GuiAdminTable does not reproduce this error: it only focuses on the display, 
and let you handle the "rows generating" logic.



How to
===========

In the following examples, I'm using bootstrap 3.3.7, but GuiAdminTable is framework agnostic.



Simplest example
---------------------

[![guiadmin-demo1.png](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin-demo1.png)](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin-demo1.png)

To start with, we just need to set the rows, and define the headers.

```php
<div class="x_content table-responsive">

    <?php

    $arr = [
        [
            'id' => 1,
            'name' => "Paul",
            'age' => 6,
        ],
        [
            'id' => 2,
            'name' => "Rachel",
            'age' => 12,
        ],
        [
            'id' => 3,
            'name' => "Marie",
            'age' => 17,
        ],
        [
            'id' => 4,
            'name' => "Koala",
            'age' => 39,
        ],
        [
            'id' => 5,
            'name' => "Michelle",
            'age' => 39,
        ],
        [
            'id' => 6,
            'name' => "Felicia",
            'age' => 39,
        ],
    ];

    Bootstrap3GuiAdminHtmlTableRenderer::create()
        ->setHeaders([
            'id' => "Id",
            'name' => 'Name',
            'age' => 'Age',
        ])
        ->setRows($arr)
        ->render();
    ?>
</div>
```



Playing with options
---------------------

Then, we can play with different options.
The details are explained in the comments.


[![guiadmin-demo2.png](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin-demo2.png)](http://lingtalfi.com/img/universe/GuiAdminTable/guiadmin-demo2.png)



```php
<div class="x_content table-responsive">
<?php

function getBtn(){
    return <<<EEE
<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pencil"></i>
        Modifier <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>

EEE;
                }


$arr = [
    [
        'id' => 1,
        'name' => "Paul",
        'age' => 6,
        '_action' => getBtn(),
    ],
    [
        'id' => 2,
        'name' => "Rachel",
        'age' => 12,
        '_action' => getBtn(),
    ],
    [
        'id' => 3,
        'name' => "Marie",
        'age' => 17,
        '_action' => getBtn(),
    ],
    [
        'id' => 4,
        'name' => "Koala",
        'age' => 39,
        '_action' => getBtn(),
    ],
    [
        'id' => 5,
        'name' => "Michelle",
        'age' => 39,
        '_action' => getBtn(),
    ],
    [
        'id' => 6,
        'name' => "Felicia",
        'age' => 39,
        '_action' => getBtn(),
    ],
];

Bootstrap3GuiAdminHtmlTableRenderer::create()
    ->setHeaders([
        'id' => "Id",
        'name' => 'Name',
        'age' => 'Age',
        /**
         * The _action key is special:
         * the search row will put a search button in it automatically.
         */
        '_action' => '',
    ])
    ->setHeadersDirection([
        'id' => null, // null: no order, true: asc, false: desc
        'name' => true, // null: no order, true: asc, false: desc
        'age' => false,
    ])
    /**
     * We transform the name column into an image.
     * The $v value contains the name,
     * but for this example I'm just using a static image.
     */
    ->addColTransformer('name', function($v){
        return '<img class="img-responsive" src="/img/products/product_mini_9_1.jpg" alt="some product" title="'. $v .'">';
    })
    /**
     * Since our name column is now an image, we decide to disable the search ability
     * for this column.
     */
    ->addSearchColumnGenerator("name", function(){
        return "";
    })
    /**
     * Just for the sake of showing off the various options,
     * we disable the checkboxes on the left.
     */
    ->setUseCheckboxes(false)
    ->setUseFilters(true)
    /**
     * We reduce the column width for id and name columns, 
     * using bootstrap sizing css markup.
     */
    ->setColWidth('id', "col-md-1")
    ->setColWidth('name', "col-md-1")
    ->setRows($arr)
    ->render();


?>
</div>

```







History Log
------------------
    
- 1.12.0 -- 2018-03-19

    - add MorphicBootstrap3GuiAdminHtmlTableRenderer.addSearchColumnHelper method 
    
- 1.11.0 -- 2018-03-09

    - add GuiAdminHtmlTableRenderer.deadCols property 
    
- 1.10.0 -- 2018-02-08

    - add GuiAdminHtmlTableRenderer protected displaySearchColCell method 
    
- 1.9.0 -- 2018-02-07

    - enhance GuiAdminHtmlTableRenderer added display: flex to search buttons  
    
- 1.8.0 -- 2018-02-01

    - add MorphicBootstrap3GuiAdminHtmlTableRenderer search reset button  
    
- 1.7.0 -- 2018-01-25

    - now GuiAdminHtmlTableRenderer _action column doesn't display sort triggers in the header  
    
- 1.6.2 -- 2018-01-25

    - now GuiAdminHtmlTableRenderer handles headersVisibility correctly  
    
- 1.6.1 -- 2018-01-23

    - fix GuiAdminHtmlTableRenderer.setHeadersOrder change method name 
    
- 1.6.0 -- 2018-01-23

    - change method name GuiAdminHtmlTableRenderer.setHeadersOrder -> setHeadersDirection 
    
- 1.5.0 -- 2018-01-18

    - add GuiAdminHtmlTableRenderer row argument to transformer callable
    
- 1.4.0 -- 2018-01-17

    - fix GuiAdminHtmlTableRenderer header visible on search rows and body rows
    - add GuiAdminHtmlTableRenderer.getBodyColAttributes internal method
    
- 1.3.0 -- 2018-01-17

    - add GuiAdminHtmlTableRenderer.displayCheckboxCell protected method
    
- 1.2.0 -- 2018-01-16

    - enhance GuiAdminHtmlTableRenderer.getHeaderColClasses now reacts to asc and desc keywords (in addition to true and/or false)  
    
- 1.1.3 -- 2018-01-16

    - fix GuiAdminHtmlTableRenderer.addHtmlAttributes now return this 
    
- 1.1.2 -- 2018-01-15

    - enhance GuiAdminHtmlTableRenderer.addHtmlAttributes now merges css classes 
    
- 1.1.1 -- 2018-01-15

    - fix GuiAdminHtmlTableRenderer.getHeaderColAttributes method wrong argument for htmlspecialchars 
    
- 1.1.0 -- 2018-01-15

    - add GuiAdminHtmlTableRenderer.getHeaderColAttributes method
    
- 1.0.0 -- 2018-01-15

    - initial commit
    