[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getValueToLabels
================



TableListService::getValueToLabels — Returns the formatted value => label(s) for the given value(s).




Description
================


public [TableListService::getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getValueToLabels.md)($value) : string




Returns the formatted value => label(s) for the given value(s).

If a string is passed, the returned array will contain only one element.
If an array is passed, the returned array will contain the same number of elements as the given array.

This uses the "column" directive of the configuration item.
See the [chloroformExtension conception notes](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md) for more info).




Parameters
================


- value

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L173-L218)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/setContainer.md)<br>

