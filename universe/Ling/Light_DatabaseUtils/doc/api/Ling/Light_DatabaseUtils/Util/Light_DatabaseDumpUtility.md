[Back to the Ling/Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md)



The Light_DatabaseDumpUtility class
================
2019-10-01 --> 2020-11-17






Introduction
============

The Light_DatabaseDumpUtility class.



Class synopsis
==============


class <span class="pl-k">Light_DatabaseDumpUtility</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [dumpTable](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/dumpTable.md)(string $table, string $targetDir, ?array $options = []) : mixed

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [Light_DatabaseDumpUtility::__construct](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/__construct.md) &ndash; Builds the Light_DatabaseDumpUtility instance.
- [Light_DatabaseDumpUtility::setContainer](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/setContainer.md) &ndash; Sets the container.
- [Light_DatabaseDumpUtility::dumpTable](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/Light_DatabaseDumpUtility/dumpTable.md) &ndash; in the targetDir.





Location
=============
Ling\Light_DatabaseUtils\Util\Light_DatabaseDumpUtility<br>
See the source code of [Ling\Light_DatabaseUtils\Util\Light_DatabaseDumpUtility](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/Util/Light_DatabaseDumpUtility.php)



SeeAlso
==============
Previous class: [LightDatabaseUtilsService](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Service/LightDatabaseUtilsService.md)<br>Next class: [RowDuplicator](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils/Util/RowDuplicator.md)<br>
