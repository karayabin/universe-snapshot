[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\MysqlUserGroupHasPluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi.md)


MysqlUserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId
================



MysqlUserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId — Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.




Description
================


public [MysqlUserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- user_group_id

    

- plugin_option_id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlUserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserGroupHasPluginOptionApi.php#L75-L90)


See Also
================

The [MysqlUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi.md) class.

Previous method: [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md)<br>Next method: [updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)<br>

