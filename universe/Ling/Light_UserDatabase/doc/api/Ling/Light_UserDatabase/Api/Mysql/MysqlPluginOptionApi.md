[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlPluginOptionApi class
================
2019-07-19 --> 2020-01-31






Introduction
============

The MysqlPluginOptionApi class.



Class synopsis
==============


class <span class="pl-k">MysqlPluginOptionApi</span> extends [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi.md) implements [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlBaseLightUserDatabaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlBaseLightUserDatabaseApi::$container](#property-container) ;
    - protected string [MysqlBaseLightUserDatabaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/__construct.md)() : void
    - public [insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getAllIds.md)() : array
    - public [updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/updatePluginOptionById.md)(int $id, array $pluginOption) : void
    - public [updatePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/updatePluginOptionByName.md)(string $name, array $pluginOption) : void
    - public [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/deletePluginOptionById.md)(int $id) : void
    - public [deletePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/deletePluginOptionByName.md)(string $name) : void
    - public [getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed

- Inherited methods
    - public [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [MysqlPluginOptionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/__construct.md) &ndash; Builds the MysqlPluginOptionApi instance.
- [MysqlPluginOptionApi::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/insertPluginOption.md) &ndash; Inserts the given pluginOption in the database.
- [MysqlPluginOptionApi::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionById.md) &ndash; Returns the pluginOption row identified by the given id.
- [MysqlPluginOptionApi::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionByName.md) &ndash; Returns the pluginOption row identified by the given name.
- [MysqlPluginOptionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [MysqlPluginOptionApi::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/updatePluginOptionById.md) &ndash; Updates the pluginOption row identified by the given id.
- [MysqlPluginOptionApi::updatePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/updatePluginOptionByName.md) &ndash; Updates the pluginOption row identified by the given name.
- [MysqlPluginOptionApi::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/deletePluginOptionById.md) &ndash; Deletes the pluginOption identified by the given id.
- [MysqlPluginOptionApi::deletePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/deletePluginOptionByName.md) &ndash; Deletes the pluginOption identified by the given name.
- [MysqlPluginOptionApi::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPluginOptionApi/getPluginOptionIdByName.md) &ndash; Returns the pluginOption id identified by the given name.
- [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md) &ndash; Sets the container.
- [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlPluginOptionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPluginOptionApi.php)



SeeAlso
==============
Previous class: [MysqlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupHasPermissionApi.md)<br>Next class: [MysqlUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi.md)<br>
