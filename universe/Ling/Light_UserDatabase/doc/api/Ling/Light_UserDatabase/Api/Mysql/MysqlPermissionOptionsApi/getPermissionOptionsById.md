[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionOptionsApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi.md)


MysqlPermissionOptionsApi::getPermissionOptionsById
================



MysqlPermissionOptionsApi::getPermissionOptionsById — Returns the permissionOptions row identified by the given id.




Description
================


public [MysqlPermissionOptionsApi::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/getPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permissionOptions row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlPermissionOptionsApi::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionOptionsApi.php#L50-L53)


See Also
================

The [MysqlPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi.md) class.

Previous method: [insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/insertPermissionOptions.md)<br>Next method: [updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/updatePermissionOptionsById.md)<br>

