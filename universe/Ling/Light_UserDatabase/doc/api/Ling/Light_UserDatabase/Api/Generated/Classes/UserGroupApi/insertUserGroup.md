[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi.md)


UserGroupApi::insertUserGroup
================



UserGroupApi::insertUserGroup — Inserts the given userGroup in the database.




Description
================


public [UserGroupApi::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/insertUserGroup.md)(array $userGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userGroup in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userGroup

    

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
See the source code for method [UserGroupApi::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserGroupApi.php#L35-L73)


See Also
================

The [UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/__construct.md)<br>Next method: [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupById.md)<br>

