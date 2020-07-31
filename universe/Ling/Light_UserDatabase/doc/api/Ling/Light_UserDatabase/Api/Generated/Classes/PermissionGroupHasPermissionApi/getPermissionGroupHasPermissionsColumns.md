[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupHasPermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md)


PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns
================



PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns — Returns a subset of the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [PermissionGroupHasPermissionApi::getPermissionGroupHasPermissionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionGroupHasPermissionApi.php#L181-L190)


See Also
================

The [PermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md) class.

Previous method: [getPermissionGroupHasPermissionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsColumn.md)<br>Next method: [getPermissionGroupHasPermissionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionsKey2Value.md)<br>

