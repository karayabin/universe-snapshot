[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md)


PermissionOptionsApiInterface::insertPermissionOptions
================



PermissionOptionsApiInterface::insertPermissionOptions — Inserts the given permissionOptions in the database.




Description
================


abstract public [PermissionOptionsApiInterface::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/insertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




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
See the source code for method [PermissionOptionsApiInterface::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PermissionOptionsApiInterface.php#L34-L34)


See Also
================

The [PermissionOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md) class.

Next method: [getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface/getPermissionOptionsById.md)<br>

