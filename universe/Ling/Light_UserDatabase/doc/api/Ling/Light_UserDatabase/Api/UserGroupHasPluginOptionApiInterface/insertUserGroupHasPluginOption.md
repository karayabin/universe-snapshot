[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\UserGroupHasPluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface.md)


UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption
================



UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption — Inserts the given userGroupHasPluginOption in the database.




Description
================


abstract public [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md)(array $userGroupHasPluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userGroupHasPluginOption in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userGroupHasPluginOption

    

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
See the source code for method [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserGroupHasPluginOptionApiInterface.php#L34-L34)


See Also
================

The [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface.md) class.

Next method: [getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)<br>

