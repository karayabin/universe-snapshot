[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlUserHasPermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md)


MysqlUserHasPermissionGroupApi::insertUserHasPermissionGroup
================



MysqlUserHasPermissionGroupApi::insertUserHasPermissionGroup — Inserts the given userHasPermissionGroup in the database.




Description
================


public [MysqlUserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed




Inserts the given userHasPermissionGroup in the database.
By default, it returns the result of the PDO::lastInsertId method.

If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the method will return false
- if false, the error will not be caught

If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.




Parameters
================


- userHasPermissionGroup

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlUserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserHasPermissionGroupApi.php#L36-L59)


See Also
================

The [MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/__construct.md)<br>Next method: [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)<br>

