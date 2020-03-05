[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlUserGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi.md)


MysqlUserGroupApi::getUserGroupById
================



MysqlUserGroupApi::getUserGroupById — Returns the userGroup row identified by the given id.




Description
================


public [MysqlUserGroupApi::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi/getUserGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userGroup row identified by the given id.

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
See the source code for method [MysqlUserGroupApi::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserGroupApi.php#L73-L87)


See Also
================

The [MysqlUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi.md) class.

Previous method: [insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi/insertUserGroup.md)<br>Next method: [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi/getUserGroupByName.md)<br>

