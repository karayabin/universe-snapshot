[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupHasPluginOptionApiInterface class
================
2019-07-19 --> 2020-01-31






Introduction
============

The UserGroupHasPluginOptionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserGroupHasPluginOptionApiInterface</span>  {

- Methods
    - abstract public [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md)(array $userGroupHasPluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption) : void
    - abstract public [deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id) : void

}






Methods
==============

- [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md) &ndash; Inserts the given userGroupHasPluginOption in the database.
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.





Location
=============
Ling\Light_UserDatabase\Api\UserGroupHasPluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserGroupHasPluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface.md)<br>Next class: [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserHasPermissionGroupApiInterface.md)<br>
