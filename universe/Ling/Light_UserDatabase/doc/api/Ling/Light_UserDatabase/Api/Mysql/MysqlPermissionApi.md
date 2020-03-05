[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlPermissionApi class
================
2019-07-19 --> 2020-01-31






Introduction
============

The MysqlPermissionApi class.



Class synopsis
==============


class <span class="pl-k">MysqlPermissionApi</span> extends [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi.md) implements [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlBaseLightUserDatabaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlBaseLightUserDatabaseApi::$container](#property-container) ;
    - protected string [MysqlBaseLightUserDatabaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/__construct.md)() : void
    - public [insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/insertPermission.md)(array $permission, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getAllIds.md)() : array
    - public [updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/updatePermissionById.md)(int $id, array $permission) : void
    - public [updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/updatePermissionByName.md)(string $name, array $permission) : void
    - public [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/deletePermissionById.md)(int $id) : void
    - public [deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/deletePermissionByName.md)(string $name) : void
    - public [getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionNamesByUserId.md)(int $id) : array

- Inherited methods
    - public [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [MysqlPermissionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/__construct.md) &ndash; Builds the MysqlPermissionApi instance.
- [MysqlPermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/insertPermission.md) &ndash; Inserts the given permission in the database.
- [MysqlPermissionApi::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [MysqlPermissionApi::getPermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionByName.md) &ndash; Returns the permission row identified by the given name.
- [MysqlPermissionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getAllIds.md) &ndash; Returns an array of all permission ids.
- [MysqlPermissionApi::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/updatePermissionById.md) &ndash; Updates the permission row identified by the given id.
- [MysqlPermissionApi::updatePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/updatePermissionByName.md) &ndash; Updates the permission row identified by the given name.
- [MysqlPermissionApi::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/deletePermissionById.md) &ndash; Deletes the permission identified by the given id.
- [MysqlPermissionApi::deletePermissionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/deletePermissionByName.md) &ndash; Deletes the permission identified by the given name.
- [MysqlPermissionApi::getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi/getPermissionNamesByUserId.md) &ndash; Returns all the permission names associated with the given user id.
- [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md) &ndash; Sets the container.
- [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionApi.php)



SeeAlso
==============
Previous class: [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi.md)<br>Next class: [MysqlPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupApi.md)<br>
