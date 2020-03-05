[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionOptionsApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi.md)


MysqlPermissionOptionsApi::insertPermissionOptions
================



MysqlPermissionOptionsApi::insertPermissionOptions — Inserts the given permissionOptions in the database.




Description
================


public [MysqlPermissionOptionsApi::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/insertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given permissionOptions in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- permissionOptions

    

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
See the source code for method [MysqlPermissionOptionsApi::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionOptionsApi.php#L42-L45)


See Also
================

The [MysqlPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/__construct.md)<br>Next method: [getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/getPermissionOptionsById.md)<br>

