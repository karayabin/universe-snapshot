[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getLabel
================



TableListService::getLabel — Returns the formatted label of the column, based on the given raw value.




Description
================


public [TableListService::getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getLabel.md)(string $columnValue) : string




Returns the formatted label of the column, based on the given raw value.

The formatting is based on the configuration pointed by the defined pluginId (i.e. if your
fields property use concat, see the [chloroformExtension conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md) for more info).




Parameters
================


- columnValue

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L122-L141)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md)<br>

