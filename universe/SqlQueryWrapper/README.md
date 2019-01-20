SqlQueryWrapper
===========
2018-04-17



A wrapper for the [SqlQuery](https://github.com/lingtalfi/SqlQuery) planet, used to display lists in a front.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import SqlQueryWrapper
```

Or just download it and place it where you want otherwise.



How to
==========

Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php 


//... in a controller...

$sqlQuery = SqlQuery::create(); // configure your sqlQuery here...

$wrapper = SqlQueryWrapper::create() 
    ->setSqlQuery($sqlQuery)
    ->setPlugin("pagination", SqlQueryWrapperPaginationPlugin::create()->setNumberOfItemsPerPage(5))
    ->setPlugin("sort", SqlQueryWrapperSortPlugin::create()->setSortItems([
        "label_asc" => "Nom ascendant",
        "label_desc" => "Nom descendant",
        "price_asc" => "Prix ascendant",
        "price_desc" => "Prix descendant",
        "popularity_desc" => "Popularité",
    ]))
    // ->setPlugin("price_filter", EkomSqlQueryWrapperPriceFilterPlugin::create()->setRange(0, 10000)) // we can add any number of plugins we want :) 
    ->prepare();


```


More doc
===========

A list is separated between the sqlQuery on the model side, and the list widget on the view side.

A plugin has a foot on each side, it's an element that:
  - listens to uri params and interacts with the sqlQuery on the model side
  - provides a model (i.e. array of properties) for the view side

The SqlQuery by default should be such as the rows it returns are not filtered (no pagination, no order, no filters),
it basically just focuses on returning the right row structure.

The list pagination, order and filters are provided by the plugins.




History Log
------------------
    
- 1.6.0 -- 2018-06-11

    - add SqlQueryWrapper.doGetNbItems protected method
    - add SqlQueryWrapper.doGetRows protected method
    
- 1.5.0 -- 2018-05-25

    - add SqlQueryWrapperBasePlugin.setContext method

- 1.4.1 -- 2018-05-25

    - fix SqlQueryWrapper.getNumberOfItems return int

- 1.4.0 -- 2018-05-11

    - add SqlQueryWrapperInterface.getNumberOfItems method
    
- 1.3.0 -- 2018-05-02

    - add SqlQueryWrapperInterface.setPlugin method
    
- 1.2.0 -- 2018-04-23

    - add SqlQueryWrapperSortPlugin.appendSortItems and prependSortItems methods
    
- 1.1.0 -- 2018-04-17

    - add SqlQueryPluginInterface onQueryReady method
    
- 1.0.0 -- 2018-04-17

    - initial commit