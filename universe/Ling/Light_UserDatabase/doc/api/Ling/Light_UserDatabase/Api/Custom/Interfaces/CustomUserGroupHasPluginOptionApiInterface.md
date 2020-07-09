[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomUserGroupHasPluginOptionApiInterface class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomUserGroupHasPluginOptionApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomUserGroupHasPluginOptionApiInterface</span> implements [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md) {

- Inherited methods
    - abstract public [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md)(array $userGroupHasPluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptions.md)($where, ?array $markers = []) : array
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [UserGroupHasPluginOptionApiInterface::updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption) : void
    - abstract public [UserGroupHasPluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id) : void
    - abstract public [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupId.md)(int $user_group_id) : void
    - abstract public [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByPluginOptionId.md)(int $plugin_option_id) : void
    - abstract public [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIds.md)(array $user_group_ids) : void
    - abstract public [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByPluginOptionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByPluginOptionIds.md)(array $plugin_option_ids) : void

}






Methods
==============

- [UserGroupHasPluginOptionApiInterface::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/insertUserGroupHasPluginOption.md) &ndash; Inserts the given userGroupHasPluginOption in the database.
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOption.md) &ndash; Returns the userGroupHasPluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptions.md) &ndash; Returns the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsColumns.md) &ndash; Returns a subset of the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApiInterface::getUserGroupHasPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/getUserGroupHasPluginOptionsKey2Value.md) &ndash; Returns an array of $key => $value from the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApiInterface::updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/delete.md) &ndash; Deletes the userGroupHasPluginOption rows matching the given where conditions, and returns the number of deleted rows.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given plugin_option_id.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByUserGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByUserGroupIds.md) &ndash; Deletes the userGroupHasPluginOption rows identified by the given user_group_user_group_ids.
- [UserGroupHasPluginOptionApiInterface::deleteUserGroupHasPluginOptionByPluginOptionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface/deleteUserGroupHasPluginOptionByPluginOptionIds.md) &ndash; Deletes the userGroupHasPluginOption rows identified by the given plugin_option_plugin_option_ids.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupHasPluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomUserGroupHasPluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [CustomUserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupApiInterface.md)<br>Next class: [CustomUserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserHasPermissionGroupApiInterface.md)<br>
