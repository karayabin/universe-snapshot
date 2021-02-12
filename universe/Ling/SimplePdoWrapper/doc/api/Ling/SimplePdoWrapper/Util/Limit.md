[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The Limit class
================
2019-07-22 --> 2020-12-08






Introduction
============

The Limit class.



Class synopsis
==============


class <span class="pl-k">Limit</span>  {

- Properties
    - protected int [$offset](#property-offset) ;
    - protected int [$rowCount](#property-rowCount) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/__construct.md)() : void
    - public static [inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/inst.md)() : static
    - public [set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/set.md)(int $offset, int $rowCount) : [Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit.md)
    - public [apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/apply.md)(string &$query, ?string $flavour = null) : void
    - public [getOffset](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getOffset.md)() : int
    - public [getRowCount](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getRowCount.md)() : int

}




Properties
=============

- <span id="property-offset"><b>offset</b></span>

    This property holds the offset for this instance.
    
    

- <span id="property-rowCount"><b>rowCount</b></span>

    This property holds the rowCount for this instance.
    
    



Methods
==============

- [Limit::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/__construct.md) &ndash; Builds the Limit instance.
- [Limit::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/inst.md) &ndash; Creates a new instance and returns it.
- [Limit::set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/set.md) &ndash; Sets the offset and rowcount, and returns itself for chaining.
- [Limit::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/apply.md) &ndash; Appends the relevant sql to the given query.
- [Limit::getOffset](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getOffset.md) &ndash; Returns the offset of this instance.
- [Limit::getRowCount](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getRowCount.md) &ndash; Returns the rowCount of this instance.





Location
=============
Ling\SimplePdoWrapper\Util\Limit<br>
See the source code of [Ling\SimplePdoWrapper\Util\Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/Limit.php)



SeeAlso
==============
Previous class: [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md)<br>Next class: [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)<br>
