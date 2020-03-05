[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlUserOptionsApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi.md)


MysqlUserOptionsApi::getUserOptionsById
================



MysqlUserOptionsApi::getUserOptionsById — Returns the userOptions row identified by the given id.




Description
================


public [MysqlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userOptions row identified by the given id.

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
See the source code for method [MysqlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserOptionsApi.php#L50-L53)


See Also
================

The [MysqlUserOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi.md) class.

Previous method: [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/insertUserOptions.md)<br>Next method: [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/updateUserOptionsById.md)<br>

