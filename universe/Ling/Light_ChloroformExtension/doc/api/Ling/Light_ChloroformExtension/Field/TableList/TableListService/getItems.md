[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getItems
================



TableListService::getItems — Returns an array of rows based on the defined pluginId.




Description
================


public [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)(?string $userQuery = , ?bool $valueAsIndex = true) : array




Returns an array of rows based on the defined pluginId.
The returned array structure depends on the valueAsIndex flag.

If valueAsIndex=true, then it's an array of value => label.
If valueAsIndex=false, then it's an array of rows, each of which containing:
     - value: the value
     - label: the label




Parameters
================


- userQuery

    

- valueAsIndex

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L94-L108)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md)<br>Next method: [getLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getLabel.md)<br>

