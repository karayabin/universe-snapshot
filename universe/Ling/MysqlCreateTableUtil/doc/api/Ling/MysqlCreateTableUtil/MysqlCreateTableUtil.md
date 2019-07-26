[Back to the Ling/MysqlCreateTableUtil api](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil.md)



The MysqlCreateTableUtil class
================
2019-07-23 --> 2019-07-23






Introduction
============

The MysqlCreateTableUtil class.



Class synopsis
==============


class <span class="pl-k">MysqlCreateTableUtil</span>  {

- Properties
    - protected string|null [$database](#property-database) ;
    - protected string [$table](#property-table) ;
    - protected string [$engine](#property-engine) ;
    - protected string [$defaultCharset](#property-defaultCharset) ;
    - protected [Ling\MysqlCreateTableUtil\Column\Column[]](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md) [$columns](#property-columns) ;

- Methods
    - protected [__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/create.md)(string $table, string $database = null) : [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)
    - public [setEngine](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setEngine.md)(string $engine) : [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)
    - public [setDefaultCharset](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setDefaultCharset.md)(string $defaultCharset) : [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)
    - public [addColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/addColumn.md)([Ling\MysqlCreateTableUtil\Column\Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md) $column) : [MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil.md)
    - public [render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/render.md)() : string
    - protected [checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/checkColumn.md)([Ling\MysqlCreateTableUtil\Column\Column](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Column/Column.md) $column) : void
    - protected [sanitizeReferentialAction](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/sanitizeReferentialAction.md)(string $action) : string

}




Properties
=============

- <span id="property-database"><b>database</b></span>

    This property holds the database for this instance.
    If null, the database name will be omitted.
    
    

- <span id="property-table"><b>table</b></span>

    This property holds the table for this instance.
    
    

- <span id="property-engine"><b>engine</b></span>

    This property holds the engine for this instance.
    The available engine types are:
    
    - innodb
    - myisam
    - memory
    - csv
    - archive
    - example
    - federated
    - heap
    - merge
    - ndb
    
    

- <span id="property-defaultCharset"><b>defaultCharset</b></span>

    This property holds the defaultCharset for this instance.
    
    

- <span id="property-columns"><b>columns</b></span>

    This property holds the columns for this instance.
    
    



Methods
==============

- [MysqlCreateTableUtil::__construct](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/__construct.md) &ndash; Builds the MysqlCreateTableUtil instance.
- [MysqlCreateTableUtil::create](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/create.md) &ndash; Creates and returns an instance of MysqlCreateTableUtil.
- [MysqlCreateTableUtil::setEngine](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setEngine.md) &ndash; Sets the engine.
- [MysqlCreateTableUtil::setDefaultCharset](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/setDefaultCharset.md) &ndash; Sets the defaultCharset.
- [MysqlCreateTableUtil::addColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/addColumn.md) &ndash; Adds a column to this instance, and returns itself.
- [MysqlCreateTableUtil::render](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/render.md) &ndash; Returns the create table statement for this instance.
- [MysqlCreateTableUtil::checkColumn](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/checkColumn.md) &ndash; Checks that the given column can be rendered, and throws an exception otherwise.
- [MysqlCreateTableUtil::sanitizeReferentialAction](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/MysqlCreateTableUtil/sanitizeReferentialAction.md) &ndash; Returns a proper referential action, valid inside a create table statement.





Location
=============
Ling\MysqlCreateTableUtil\MysqlCreateTableUtil<br>
See the source code of [Ling\MysqlCreateTableUtil\MysqlCreateTableUtil](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/MysqlCreateTableUtil.php)



SeeAlso
==============
Previous class: [MysqlCreateTableUtilException](https://github.com/lingtalfi/MysqlCreateTableUtil/blob/master/doc/api/Ling/MysqlCreateTableUtil/Exception/MysqlCreateTableUtilException.md)<br>
