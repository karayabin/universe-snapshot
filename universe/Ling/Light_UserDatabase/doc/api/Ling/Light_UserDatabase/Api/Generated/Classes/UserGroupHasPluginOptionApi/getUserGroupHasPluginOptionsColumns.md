[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupHasPluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi.md)


UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumns
================



UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumns — Returns a subset of the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserGroupHasPluginOptionApi.php#L151-L160)


See Also
================

The [UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi.md) class.

Previous method: [getUserGroupHasPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumn.md)<br>Next method: [getUserGroupHasPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsKey2Value.md)<br>

