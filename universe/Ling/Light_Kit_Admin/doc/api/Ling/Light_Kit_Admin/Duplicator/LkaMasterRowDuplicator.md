[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LkaMasterRowDuplicator class
================
2019-05-17 --> 2021-03-05






Introduction
============

The LkaMasterRowDuplicator class.



Class synopsis
==============


class <span class="pl-k">LkaMasterRowDuplicator</span> extends [RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md)  {

- Properties
    - private [Ling\Light_Kit_Admin\Duplicator\LkaRowDuplicatorHooksInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface.md) [$customDuplicator](#property-customDuplicator) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [RowDuplicator::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/__construct.md)() : void
    - public [duplicateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/duplicateRows.md)(string $planetId, string $table, array $rics, ?array $options = []) : void
    - protected [onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/onInsertAfter.md)(string $mainTable, string $table, array $oldRow, array $newRow, ?$lastInsertId = null) : void

- Inherited methods
    - public RowDuplicator::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public RowDuplicator::duplicate(string $table, array $rics, ?array $options = []) : void
    - protected RowDuplicator::doDuplicate(string $table, array $rics, ?array $options = []) : void

}




Properties
=============

- <span id="property-customDuplicator"><b>customDuplicator</b></span>

    This property holds the customDuplicator for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LkaMasterRowDuplicator::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/__construct.md) &ndash; Builds the LkaBaseRowDuplicator instance.
- [LkaMasterRowDuplicator::duplicateRows](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/duplicateRows.md) &ndash; Duplicates the rows identified by the given rics, for the given plugin and table.
- [LkaMasterRowDuplicator::onInsertAfter](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaMasterRowDuplicator/onInsertAfter.md) &ndash; Hook method called whenever a new row is inserted in the database via the duplicate method.
- RowDuplicator::setContainer &ndash; Sets the container.
- RowDuplicator::duplicate &ndash; Duplicates the rows identified by the given rics, of the given table.
- RowDuplicator::doDuplicate &ndash; Duplicates the rows identified by the given rics, of the given table.





Location
=============
Ling\Light_Kit_Admin\Duplicator\LkaMasterRowDuplicator<br>
See the source code of [Ling\Light_Kit_Admin\Duplicator\LkaMasterRowDuplicator](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Duplicator/LkaMasterRowDuplicator.php)



SeeAlso
==============
Previous class: [NotificationsDataExtractor](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/NotificationsDataExtractor.md)<br>Next class: [LkaRowDuplicatorHooksInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Duplicator/LkaRowDuplicatorHooksInterface.md)<br>
