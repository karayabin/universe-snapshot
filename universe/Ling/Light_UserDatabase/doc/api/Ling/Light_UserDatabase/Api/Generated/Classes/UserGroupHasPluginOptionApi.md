[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupHasPluginOptionApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The UserGroupHasPluginOptionApi class.



Class synopsis
==============


class <span class="pl-k">UserGroupHasPluginOptionApi</span> extends [CustomLightUserDatabaseBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomLightUserDatabaseBaseApi.md) implements [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupHasPluginOptionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/__construct.md)() : void
    - public [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md)(array $userGroupHasPluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptions.md)($where, ?array $markers = []) : array
    - public [getUserGroupHasPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getUserGroupHasPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption) : void
    - public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id) : void
    - public [deleteUserGroupHasPluginOptionByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupId.md)(int $user_group_id) : void
    - public [deleteUserGroupHasPluginOptionByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByPluginOptionId.md)(int $plugin_option_id) : void
    - public [deleteUserGroupHasPluginOptionByUserGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIds.md)(array $user_group_ids) : void
    - public [deleteUserGroupHasPluginOptionByPluginOptionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByPluginOptionIds.md)(array $plugin_option_ids) : void

- Inherited methods
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [UserGroupHasPluginOptionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/__construct.md) &ndash; Builds the UserGroupHasPluginOptionApi instance.
- [UserGroupHasPluginOptionApi::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md) &ndash; Inserts the given userGroupHasPluginOption in the database.
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOption.md) &ndash; Returns the userGroupHasPluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptions.md) &ndash; Returns the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsColumns.md) &ndash; Returns a subset of the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApi::getUserGroupHasPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/getUserGroupHasPluginOptionsKey2Value.md) &ndash; Returns an array of $key => $value from the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupHasPluginOptionApi::updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/delete.md) &ndash; Deletes the userGroupHasPluginOption rows matching the given where conditions, and returns the number of deleted rows.
- [UserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.
- [UserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id.
- [UserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given plugin_option_id.
- [UserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByUserGroupIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIds.md) &ndash; Deletes the userGroupHasPluginOption rows identified by the given user_group_user_group_ids.
- [UserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByPluginOptionIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByPluginOptionIds.md) &ndash; Deletes the userGroupHasPluginOption rows identified by the given plugin_option_plugin_option_ids.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupHasPluginOptionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserGroupHasPluginOptionApi.php)



SeeAlso
==============
Previous class: [UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi.md)<br>Next class: [UserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserHasPermissionGroupApi.md)<br>
