[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The MysqlInfoUtil class
================
2019-07-22 --> 2019-07-22






Introduction
============

The MysqlInfoUtil class.



Class synopsis
==============


class <span class="pl-k">MysqlInfoUtil</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$wrapper](#property-wrapper) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/__construct.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper = null) : void
    - public [setWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/setWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper) : void
    - public [changeDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/changeDatabase.md)(string $database) : void
    - public [getDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabase.md)() : string
    - public [getDatabases](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabases.md)(bool $filterMysql = true) : array
    - public [getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md)(string $prefix = null) : array
    - public [hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md)(string $table) : bool
    - protected [dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md)(string $table) : string

}




Properties
=============

- <span id="property-wrapper"><b>wrapper</b></span>

    This property holds the wrapper for this instance.
    
    



Methods
==============

- [MysqlInfoUtil::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/__construct.md) &ndash; Builds the MysqlInfoUtil instance.
- [MysqlInfoUtil::setWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/setWrapper.md) &ndash; Sets the wrapper.
- [MysqlInfoUtil::changeDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/changeDatabase.md) &ndash; Changes the current database.
- [MysqlInfoUtil::getDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabase.md) &ndash; Returns the name of the current database.
- [MysqlInfoUtil::getDatabases](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabases.md) &ndash; Returns the array of databases.
- [MysqlInfoUtil::getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md) &ndash; Returns the tables of the current database.
- [MysqlInfoUtil::hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md) &ndash; Returns whether the current database contains the given table.
- [MysqlInfoUtil::dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md) &ndash; Returns the double quote protected full version of the given table.





Location
=============
Ling\SimplePdoWrapper\Util\MysqlInfoUtil<br>
See the source code of [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php)



SeeAlso
==============
Previous class: [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)<br>
