[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md)


UserApiInterface::getUsersColumns
================



UserApiInterface::getUsersColumns — Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumns.md)($columns, $where, ?array $markers = []) : array




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
See the source code for method [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserApiInterface.php#L130-L130)


See Also
================

The [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md) class.

Previous method: [getUsersColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumn.md)<br>Next method: [getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersKey2Value.md)<br>

