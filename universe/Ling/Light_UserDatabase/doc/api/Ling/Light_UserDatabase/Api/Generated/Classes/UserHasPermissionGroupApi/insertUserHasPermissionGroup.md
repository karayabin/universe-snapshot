[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserHasPermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md)


UserHasPermissionGroupApi::insertUserHasPermissionGroup
================



UserHasPermissionGroupApi::insertUserHasPermissionGroup — Inserts the given userHasPermissionGroup in the database.




Description
================


public [UserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userHasPermissionGroup in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




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
See the source code for method [UserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserHasPermissionGroupApi.php#L35-L75)


See Also
================

The [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/__construct.md)<br>Next method: [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)<br>

