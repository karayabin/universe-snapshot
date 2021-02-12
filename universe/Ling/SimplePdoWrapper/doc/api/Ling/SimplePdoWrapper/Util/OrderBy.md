[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The OrderBy class
================
2019-07-22 --> 2020-12-08






Introduction
============

The OrderBy class.



Class synopsis
==============


class <span class="pl-k">OrderBy</span>  {

- Properties
    - protected array [$colDirs](#property-colDirs) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/__construct.md)() : void
    - public static [inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/inst.md)() : static
    - public [add](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/add.md)(string $col, string $dir) : [OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy.md)
    - public [apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/apply.md)(string &$query) : void
    - public [getColDirs](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/getColDirs.md)() : array
    - private [error](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-colDirs"><b>colDirs</b></span>

    An array of the col/dir pairs.
    
    



Methods
==============

- [OrderBy::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/__construct.md) &ndash; Builds the OrderBy instance.
- [OrderBy::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/inst.md) &ndash; Creates a new instance and returns it.
- [OrderBy::add](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/add.md) &ndash; Adds a column/direction info to this instance, and returns itself for chaining.
- [OrderBy::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/apply.md) &ndash; Appends the relevant sql to the given query.
- [OrderBy::getColDirs](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/getColDirs.md) &ndash; Returns the colDirs of this instance.
- [OrderBy::error](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/error.md) &ndash; Throws an exception.





Location
=============
Ling\SimplePdoWrapper\Util\OrderBy<br>
See the source code of [Ling\SimplePdoWrapper\Util\OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/OrderBy.php)



SeeAlso
==============
Previous class: [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)<br>Next class: [RicHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md)<br>
