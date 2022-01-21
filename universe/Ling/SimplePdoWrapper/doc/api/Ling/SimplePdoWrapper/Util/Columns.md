[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The Columns class
================
2019-07-22 --> 2022-01-20






Introduction
============

The Columns class.



Class synopsis
==============


class <span class="pl-k">Columns</span>  {

- Properties
    - protected string [$mode](#property-mode) ;
    - protected array [$columns](#property-columns) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/__construct.md)() : void
    - public static [inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/inst.md)() : static
    - public [set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/set.md)($columns) : [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md)
    - public [singleColumn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/singleColumn.md)() : [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md)
    - public [getColumns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getColumns.md)() : array
    - public [apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/apply.md)(string &$query) : void
    - public [getMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getMode.md)() : string

}




Properties
=============

- <span id="property-mode"><b>mode</b></span>

    This property holds the mode.
    
    The mode can be one of:
    - default
    - singleColumn
    
    
    In default mode, the query shall reduce the rows to a single column, which name is defined
    with the columns property.
    
    

- <span id="property-columns"><b>columns</b></span>

    This property holds the columns for this instance.
    
    



Methods
==============

- [Columns::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/__construct.md) &ndash; Builds the Columns instance.
- [Columns::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/inst.md) &ndash; Creates a new instance and returns it.
- [Columns::set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/set.md) &ndash; Sets the columns, and returns itself for chaining.
- [Columns::singleColumn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/singleColumn.md) &ndash; Sets the mode to singleColumn, and returns itself for chaining.
- [Columns::getColumns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getColumns.md) &ndash; Returns the columns of this instance.
- [Columns::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/apply.md) &ndash; Appends the relevant sql to the given query, and returns itself for chaining.
- [Columns::getMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getMode.md) &ndash; Returns the mode of this instance.





Location
=============
Ling\SimplePdoWrapper\Util\Columns<br>
See the source code of [Ling\SimplePdoWrapper\Util\Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/Columns.php)



SeeAlso
==============
Previous class: [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)<br>Next class: [Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit.md)<br>
