[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceFileApi class
================
2019-09-27 --> 2021-03-05






Introduction
============

The ResourceFileApi class.



Class synopsis
==============


class <span class="pl-k">ResourceFileApi</span> extends [CustomLightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomLightUserDataBaseApi.md) implements [ResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/__construct.md)() : void
    - public [insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/insertResourceFile.md)(array $resourceFile, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/insertResourceFiles.md)(array $resourceFiles, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetch.md)(?array $components = []) : array
    - public [getResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFileById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFile.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFiles.md)($where, ?array $markers = []) : array
    - public [getResourceFilesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getResourceFilesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getResourceFilesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getAllIds.md)() : array
    - public [updateResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/updateResourceFileById.md)(int $id, array $resourceFile, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/updateResourceFile.md)(array $resourceFile, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileById.md)(int $id) : void
    - public [deleteResourceFileByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileByIds.md)(array $ids) : void
    - public [deleteResourceFileByLudaResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileByLudaResourceId.md)(int $resourceId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [ResourceFileApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/__construct.md) &ndash; Builds the ResourceFileApi instance.
- [ResourceFileApi::insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/insertResourceFile.md) &ndash; Inserts the given resource file in the database.
- [ResourceFileApi::insertResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/insertResourceFiles.md) &ndash; Inserts the given resource file rows in the database.
- [ResourceFileApi::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ResourceFileApi::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ResourceFileApi::getResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFileById.md) &ndash; Returns the resource file row identified by the given id.
- [ResourceFileApi::getResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFile.md) &ndash; Returns the resourceFile row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApi::getResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFiles.md) &ndash; Returns the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApi::getResourceFilesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApi::getResourceFilesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesColumns.md) &ndash; Returns a subset of the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApi::getResourceFilesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getResourceFilesKey2Value.md) &ndash; Returns an array of $key => $value from the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/getAllIds.md) &ndash; Returns an array of all resourceFile ids.
- [ResourceFileApi::updateResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/updateResourceFileById.md) &ndash; Updates the resource file row identified by the given id.
- [ResourceFileApi::updateResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/updateResourceFile.md) &ndash; Updates the resource file row.
- [ResourceFileApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/delete.md) &ndash; Deletes the resourceFile rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceFileApi::deleteResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileById.md) &ndash; Deletes the resource file identified by the given id.
- [ResourceFileApi::deleteResourceFileByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileByIds.md) &ndash; Deletes the resource file rows identified by the given ids.
- [ResourceFileApi::deleteResourceFileByLudaResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/deleteResourceFileByLudaResourceId.md) &ndash; Deletes the resource file rows having the given resource id.
- [ResourceFileApi::fetchRoutine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Generated\Classes\ResourceFileApi<br>
See the source code of [Ling\Light_UserData\Api\Generated\Classes\ResourceFileApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceFileApi.php)



SeeAlso
==============
Previous class: [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md)<br>Next class: [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md)<br>
