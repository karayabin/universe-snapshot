[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md)


LightChloroformExtensionService::getTableListLabel
================



LightChloroformExtensionService::getTableListLabel — Returns the formatted label of the column, based on the given raw value.




Description
================


public [LightChloroformExtensionService::getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListLabel.md)(string $columnValue, string $tableListIdentifier) : string




Returns the formatted label of the column, based on the given raw value.
The formatting is based on the configuration pointed by the given tableListIdentifier (i.e. if your
fields property use concat, see the [chloroformExtension conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md) for more info).




Parameters
================


- columnValue

    

- tableListIdentifier

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightChloroformExtensionService::getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php#L134-L153)


See Also
================

The [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) class.

Previous method: [getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListItems.md)<br>Next method: [getTableListConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListConfigurationItem.md)<br>

