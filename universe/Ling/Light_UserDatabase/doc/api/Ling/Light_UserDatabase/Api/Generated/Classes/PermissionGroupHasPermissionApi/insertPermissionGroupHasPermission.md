[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupHasPermissionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md)


PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission
================



PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission — Inserts the given permissionGroupHasPermission in the database.




Description
================


public [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/insertPermissionGroupHasPermission.md)(array $permissionGroupHasPermission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given permissionGroupHasPermission in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- permissionGroupHasPermission

    

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
See the source code for method [PermissionGroupHasPermissionApi::insertPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PermissionGroupHasPermissionApi.php#L35-L75)


See Also
================

The [PermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/__construct.md)<br>Next method: [getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PermissionGroupHasPermissionApi/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)<br>

