[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupHasPluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi.md)


UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId
================



UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId — Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.




Description
================


public [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/UserGroupHasPluginOptionApi.php#L78-L93)


See Also
================

The [UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi.md) class.

Previous method: [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md)<br>Next method: [getUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOption.md)<br>

