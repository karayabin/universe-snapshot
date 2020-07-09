[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPluginOptionApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomPluginOptionApi class.



Class synopsis
==============


class <span class="pl-k">CustomPluginOptionApi</span> extends [PluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi.md) implements [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface.md), [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/__construct.md)() : void
    - public [deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/deletePluginOptionsByPluginName.md)(string $pluginName) : void
    - public [getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/getOptionByCategoryAndUserId.md)(string $category, int $userId) : array

- Inherited methods
    - public [PluginOptionApi::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [PluginOptionApi::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PluginOptionApi::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [PluginOptionApi::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptions.md)($where, ?array $markers = []) : array
    - public [PluginOptionApi::getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [PluginOptionApi::getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [PluginOptionApi::getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [PluginOptionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getAllIds.md)() : array
    - public [PluginOptionApi::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/updatePluginOptionById.md)(int $id, array $pluginOption) : void
    - public [PluginOptionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [PluginOptionApi::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/deletePluginOptionById.md)(int $id) : void
    - public [PluginOptionApi::deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/deletePluginOptionByIds.md)(array $ids) : void
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomPluginOptionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/__construct.md) &ndash; Builds the CustomPluginOptionApi instance.
- [CustomPluginOptionApi::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/deletePluginOptionsByPluginName.md) &ndash; Deletes all the plugin options which belongs to the given pluginName.
- [CustomPluginOptionApi::getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi/getOptionByCategoryAndUserId.md) &ndash; Returns the plugin option row identified by the given category and the user id.
- [PluginOptionApi::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/insertPluginOption.md) &ndash; Inserts the given pluginOption in the database.
- [PluginOptionApi::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionById.md) &ndash; Returns the pluginOption row identified by the given id.
- [PluginOptionApi::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOption.md) &ndash; Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApi::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptions.md) &ndash; Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApi::getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApi::getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsColumns.md) &ndash; Returns a subset of the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApi::getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionsKey2Value.md) &ndash; Returns an array of $key => $value from the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [PluginOptionApi::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/updatePluginOptionById.md) &ndash; Updates the pluginOption row identified by the given id.
- [PluginOptionApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/delete.md) &ndash; Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.
- [PluginOptionApi::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/deletePluginOptionById.md) &ndash; Deletes the pluginOption identified by the given id.
- [PluginOptionApi::deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/deletePluginOptionByIds.md) &ndash; Deletes the pluginOption rows identified by the given ids.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Classes\CustomPluginOptionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Classes\CustomPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Classes/CustomPluginOptionApi.php)



SeeAlso
==============
Previous class: [CustomPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPermissionGroupHasPermissionApi.md)<br>Next class: [CustomUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserApi.md)<br>
