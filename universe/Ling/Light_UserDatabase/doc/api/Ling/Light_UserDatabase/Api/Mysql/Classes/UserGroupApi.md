[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupApi class
================
2019-07-19 --> 2020-02-07






Introduction
============

The UserGroupApi class.



Class synopsis
==============


class <span class="pl-k">UserGroupApi</span> extends [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi.md) implements [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlBaseLightUserDatabaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlBaseLightUserDatabaseApi::$container](#property-container) ;
    - protected string [MysqlBaseLightUserDatabaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/__construct.md)() : void
    - public [insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/insertUserGroup.md)(array $userGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroups.md)($where, ?array $markers = []) : array
    - public [getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getAllIds.md)() : array
    - public [updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/updateUserGroupById.md)(int $id, array $userGroup) : void
    - public [updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/updateUserGroupByName.md)(string $name, array $userGroup) : void
    - public [deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/deleteUserGroupById.md)(int $id) : void
    - public [deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/deleteUserGroupByName.md)(string $name) : void

- Inherited methods
    - public [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [UserGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/__construct.md) &ndash; Builds the UserGroupApi instance.
- [UserGroupApi::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/insertUserGroup.md) &ndash; Inserts the given userGroup in the database.
- [UserGroupApi::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupById.md) &ndash; Returns the userGroup row identified by the given id.
- [UserGroupApi::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupByName.md) &ndash; Returns the userGroup row identified by the given name.
- [UserGroupApi::getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroup.md) &ndash; Returns the userGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroups.md) &ndash; Returns the userGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApi::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getUserGroupIdByName.md) &ndash; Returns the id of the lud_user_group table.
- [UserGroupApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/getAllIds.md) &ndash; Returns an array of all userGroup ids.
- [UserGroupApi::updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/updateUserGroupById.md) &ndash; Updates the userGroup row identified by the given id.
- [UserGroupApi::updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/updateUserGroupByName.md) &ndash; Updates the userGroup row identified by the given name.
- [UserGroupApi::deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/deleteUserGroupById.md) &ndash; Deletes the userGroup identified by the given id.
- [UserGroupApi::deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupApi/deleteUserGroupByName.md) &ndash; Deletes the userGroup identified by the given name.
- [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/setContainer.md) &ndash; Sets the container.
- [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\Classes\UserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/UserGroupApi.php)



SeeAlso
==============
Previous class: [UserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserApi.md)<br>Next class: [UserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/UserGroupHasPluginOptionApi.md)<br>
