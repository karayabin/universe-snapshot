[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)<br>
[Back to the Ling\Light_ChloroformExtension\Field\TableList\TableListService class](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md)


TableListService::getItems
================



TableListService::getItems — Returns an array of rows based on the defined nugget.




Description
================


public [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getItems.md)(?string $searchExpression = null) : array




Returns an array of rows based on the defined nugget.


This method operates in one of two modes:

- search mode (if the searchExpression argument is not null)
- regular mode (if the searchExpression argument is null)


The returned array structure depends on the mode:

- in regular mode, it's an array of value => label.
- in search mode, it's an array of rows, each of which containing:
     - value: the value
     - label: the label



The sql query is provided by the nugget ("sql" directive).

In search mode, the given "search expression" will be searched in a column provided by the "search_column" directive of the nugget.




Parameters
================


- searchExpression

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TableListService::getItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Field/TableList/TableListService.php#L125-L155)


See Also
================

The [TableListService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService.md) class.

Previous method: [getNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getNumberOfItems.md)<br>Next method: [getValueToLabels](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableList/TableListService/getValueToLabels.md)<br>

