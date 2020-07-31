[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserHasPermissionGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md)


UserHasPermissionGroupApi::insertUserHasPermissionGroups
================



UserHasPermissionGroupApi::insertUserHasPermissionGroups — Inserts the given userHasPermissionGroup rows in the database.




Description
================


public [UserHasPermissionGroupApi::insertUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroups.md)(array $userHasPermissionGroups, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userHasPermissionGroup rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userHasPermissionGroups

    

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
See the source code for method [UserHasPermissionGroupApi::insertUserHasPermissionGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserHasPermissionGroupApi.php#L94-L105)


See Also
================

The [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md) class.

Previous method: [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/insertUserHasPermissionGroup.md)<br>Next method: [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)<br>

