[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlPermissionGroupApi class
================
2019-07-19 --> 2020-01-31






Introduction
============

The MysqlPermissionGroupApi class.



Class synopsis
==============


class <span class="pl-k">MysqlPermissionGroupApi</span> extends [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi.md) implements [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlBaseLightUserDatabaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlBaseLightUserDatabaseApi::$container](#property-container) ;
    - protected string [MysqlBaseLightUserDatabaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/__construct.md)() : void
    - public [insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/insertPermissionGroup.md)(array $permissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getAllIds.md)() : array
    - public [updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/updatePermissionGroupById.md)(int $id, array $permissionGroup) : void
    - public [updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/updatePermissionGroupByName.md)(string $name, array $permissionGroup) : void
    - public [deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/deletePermissionGroupById.md)(int $id) : void
    - public [deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/deletePermissionGroupByName.md)(string $name) : void
    - public [getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupIdByName.md)(string $name) : int | false

- Inherited methods
    - public [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [MysqlPermissionGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/__construct.md) &ndash; Builds the MysqlPermissionGroupApi instance.
- [MysqlPermissionGroupApi::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/insertPermissionGroup.md) &ndash; Inserts the given permissionGroup in the database.
- [MysqlPermissionGroupApi::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupById.md) &ndash; Returns the permissionGroup row identified by the given id.
- [MysqlPermissionGroupApi::getPermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupByName.md) &ndash; Returns the permissionGroup row identified by the given name.
- [MysqlPermissionGroupApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getAllIds.md) &ndash; Returns an array of all permissionGroup ids.
- [MysqlPermissionGroupApi::updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/updatePermissionGroupById.md) &ndash; Updates the permissionGroup row identified by the given id.
- [MysqlPermissionGroupApi::updatePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/updatePermissionGroupByName.md) &ndash; Updates the permissionGroup row identified by the given name.
- [MysqlPermissionGroupApi::deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/deletePermissionGroupById.md) &ndash; Deletes the permissionGroup identified by the given id.
- [MysqlPermissionGroupApi::deletePermissionGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/deletePermissionGroupByName.md) &ndash; Deletes the permissionGroup identified by the given name.
- [MysqlPermissionGroupApi::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi/getPermissionGroupIdByName.md) &ndash; or false if the group doesn't exist.
- [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md) &ndash; Sets the container.
- [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionGroupApi.php)



SeeAlso
==============
Previous class: [MysqlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi.md)<br>Next class: [MysqlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupHasPermissionApi.md)<br>
