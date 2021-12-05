[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserRatesItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi.md)


UserRatesItemApi::getUserRatesItemsColumns
================



UserRatesItemApi::getUserRatesItemsColumns — Returns a subset of the userRatesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserRatesItemApi::getUserRatesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/getUserRatesItemsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the userRatesItem rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UserRatesItemApi::getUserRatesItemsColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserRatesItemApi.php#L223-L232)


See Also
================

The [UserRatesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi.md) class.

Previous method: [getUserRatesItemsColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/getUserRatesItemsColumn.md)<br>Next method: [getUserRatesItemsKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserRatesItemApi/getUserRatesItemsKey2Value.md)<br>

