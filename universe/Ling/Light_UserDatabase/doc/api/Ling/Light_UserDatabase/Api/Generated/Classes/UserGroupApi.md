[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The UserGroupApi class.



Class synopsis
==============


class <span class="pl-k">UserGroupApi</span> extends [CustomLightUserDatabaseBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomLightUserDatabaseBaseApi.md) implements [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserGroupApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/__construct.md)() : void
    - public [insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/insertUserGroup.md)(array $userGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroups.md)($where, ?array $markers = []) : array
    - public [getUserGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getUserGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getUserGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getUserGroupsByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsByPluginOptionId.md)(string $pluginOptionId) : array
    - public [getUserGroupIdsByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupIdsByPluginOptionId.md)(string $pluginOptionId) : array
    - public [getUserGroupNamesByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupNamesByPluginOptionId.md)(string $pluginOptionId) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getAllIds.md)() : array
    - public [updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/updateUserGroupById.md)(int $id, array $userGroup) : void
    - public [updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/updateUserGroupByName.md)(string $name, array $userGroup) : void
    - public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupById.md)(int $id) : void
    - public [deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByName.md)(string $name) : void
    - public [deleteUserGroupByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByIds.md)(array $ids) : void
    - public [deleteUserGroupByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByNames.md)(array $names) : void

- Inherited methods
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [UserGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/__construct.md) &ndash; Builds the UserGroupApi instance.
- [UserGroupApi::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/insertUserGroup.md) &ndash; Inserts the given userGroup in the database.
- [UserGroupApi::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupById.md) &ndash; Returns the userGroup row identified by the given id.
- [UserGroupApi::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupByName.md) &ndash; Returns the userGroup row identified by the given name.
- [UserGroupApi::getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroup.md) &ndash; Returns the userGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroups.md) &ndash; Returns the userGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroupsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroupsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsColumns.md) &ndash; Returns a subset of the userGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroupsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsKey2Value.md) &ndash; Returns an array of $key => $value from the userGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupIdByName.md) &ndash; Returns the id of the lud_user_group table.
- [UserGroupApi::getUserGroupsByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupsByPluginOptionId.md) &ndash; Returns the rows of the lud_user_group table bound to the given plugin_option id.
- [UserGroupApi::getUserGroupIdsByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupIdsByPluginOptionId.md) &ndash; Returns an array of lud_user_group.id bound to the given plugin_option id.
- [UserGroupApi::getUserGroupNamesByPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getUserGroupNamesByPluginOptionId.md) &ndash; Returns an array of lud_user_group.name bound to the given plugin_option id.
- [UserGroupApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/getAllIds.md) &ndash; Returns an array of all userGroup ids.
- [UserGroupApi::updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/updateUserGroupById.md) &ndash; Updates the userGroup row identified by the given id.
- [UserGroupApi::updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/updateUserGroupByName.md) &ndash; Updates the userGroup row identified by the given name.
- [UserGroupApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/delete.md) &ndash; Deletes the userGroup rows matching the given where conditions, and returns the number of deleted rows.
- [UserGroupApi::deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupById.md) &ndash; Deletes the userGroup identified by the given id.
- [UserGroupApi::deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByName.md) &ndash; Deletes the userGroup identified by the given name.
- [UserGroupApi::deleteUserGroupByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByIds.md) &ndash; Deletes the userGroup rows identified by the given ids.
- [UserGroupApi::deleteUserGroupByNames](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupApi/deleteUserGroupByNames.md) &ndash; Deletes the userGroup rows identified by the given names.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/UserGroupApi.php)



SeeAlso
==============
Previous class: [UserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi.md)<br>Next class: [UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserGroupHasPluginOptionApi.md)<br>
