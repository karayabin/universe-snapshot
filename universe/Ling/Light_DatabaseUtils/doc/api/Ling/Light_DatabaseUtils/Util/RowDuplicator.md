[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)



The RowDuplicator class
================
2019-10-01 --> 2020-12-08






Introduction
============

The RowDuplicator class.



Class synopsis
==============


class <span class="pl-k">RowDuplicator</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private string [$mainTable](#property-mainTable) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [duplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/duplicate.md)(string $table, array $rics, ?array $options = []) : void
    - protected [doDuplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/doDuplicate.md)(string $table, array $rics, ?array $options = []) : void
    - protected [onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void
    - private [getDependentTables](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/getDependentTables.md)(string $table, Ling\SimplePdoWrapper\Util\MysqlInfoUtil $util) : array
    - private [error](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-mainTable"><b>mainTable</b></span>

    This property holds the mainTable for this instance.
    
    



Methods
==============

- [RowDuplicator::__construct](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/__construct.md) &ndash; Builds the LkaBaseRowDuplicator instance.
- [RowDuplicator::setContainer](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/setContainer.md) &ndash; Sets the container.
- [RowDuplicator::duplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/duplicate.md) &ndash; Duplicates the rows identified by the given rics, of the given table.
- [RowDuplicator::doDuplicate](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/doDuplicate.md) &ndash; Duplicates the rows identified by the given rics, of the given table.
- [RowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/onInsertAfter.md) &ndash; Hook method called whenever a new row is inserted in the database via the duplicate method.
- [RowDuplicator::getDependentTables](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/getDependentTables.md) &ndash; Returns an array of dependent tables.
- [RowDuplicator::error](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_DatabaseUtils\Util\RowDuplicator<br>
See the source code of [Ling\Light_DatabaseUtils\Util\RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/RowDuplicator.php)



SeeAlso
==============
Previous class: [Light_DatabaseDumpUtility](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility.md)<br>
