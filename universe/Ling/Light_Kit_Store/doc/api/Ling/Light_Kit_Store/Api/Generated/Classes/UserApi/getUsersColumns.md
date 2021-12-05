[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\UserApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi.md)


UserApi::getUsersColumns
================



UserApi::getUsersColumns — Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserApi::getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [UserApi::getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserApi.php#L223-L232)


See Also
================

The [UserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi.md) class.

Previous method: [getUsersColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumn.md)<br>Next method: [getUsersKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersKey2Value.md)<br>

