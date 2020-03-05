[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PermissionGroupApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface.md)


PermissionGroupApiInterface::insertPermissionGroup
================



PermissionGroupApiInterface::insertPermissionGroup — Inserts the given permissionGroup in the database.




Description
================


abstract public [PermissionGroupApiInterface::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface/insertPermissionGroup.md)(array $permissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given permissionGroup in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- permissionGroup

    

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
See the source code for method [PermissionGroupApiInterface::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PermissionGroupApiInterface.php#L34-L34)


See Also
================

The [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface.md) class.

Next method: [getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupApiInterface/getPermissionGroupById.md)<br>

