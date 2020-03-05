[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi.md)


MysqlPermissionApi::getPermissionByName
================



MysqlPermissionApi::getPermissionByName — Returns the permission row identified by the given name.




Description
================


public [MysqlPermissionApi::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permission row identified by the given name.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

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
See the source code for method [MysqlPermissionApi::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionApi.php#L93-L107)


See Also
================

The [MysqlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi.md) class.

Previous method: [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionById.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getAllIds.md)<br>

