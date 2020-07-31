[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupHasPluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md)


UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOptions
================



UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOptions — Inserts the given userGroupHasPluginOption rows in the database.




Description
================


abstract public [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOptions.md)(array $userGroupHasPluginOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userGroupHasPluginOption rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userGroupHasPluginOptions

    

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
See the source code for method [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.php#L56-L56)


See Also
================

The [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md) class.

Previous method: [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md)<br>Next method: [getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)<br>

