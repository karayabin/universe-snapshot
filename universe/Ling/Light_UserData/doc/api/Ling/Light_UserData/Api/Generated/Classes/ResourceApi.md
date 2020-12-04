[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceApi class
================
2019-09-27 --> 2020-11-20






Introduction
============

The ResourceApi class.



Class synopsis
==============


class <span class="pl-k">ResourceApi</span> extends [CustomLightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomLightUserDataBaseApi.md) implements [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/__construct.md)() : void
    - public [insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResources.md)(array $resources, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetch.md)(?array $components = []) : array
    - public [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResources.md)($where, ?array $markers = []) : array
    - public [getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getResourceIdByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceIdByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getAllIds.md)() : array
    - public [updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceById.md)(int $id, array $resource, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, array $resource, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResource.md)(array $resource, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceById.md)(int $id) : void
    - public [deleteResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical) : void
    - public [deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByIds.md)(array $ids) : void
    - public [deleteResourceByLudUserIdsAndCanonicals](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserIdsAndCanonicals.md)(array $lud_user_ids) : void
    - public [deleteResourceByLudUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserId.md)(int $userId) : void
    - private [fetchRoutine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetchRoutine.md)(string &$q, array &$markers, array $components) : array

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [ResourceApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/__construct.md) &ndash; Builds the ResourceApi instance.
- [ResourceApi::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApi::insertResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResources.md) &ndash; Inserts the given resource rows in the database.
- [ResourceApi::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ResourceApi::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ResourceApi::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApi::getResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceByLudUserIdAndCanonical.md) &ndash; Returns the resource row identified by the given lud_user_id and canonical.
- [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResource.md) &ndash; Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResources.md) &ndash; Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumns.md) &ndash; Returns a subset of the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesKey2Value.md) &ndash; Returns an array of $key => $value from the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourceIdByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceIdByLudUserIdAndCanonical.md) &ndash; Returns the id of the luda_resource table.
- [ResourceApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApi::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApi::updateResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceByLudUserIdAndCanonical.md) &ndash; Updates the resource row identified by the given lud_user_id and canonical.
- [ResourceApi::updateResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResource.md) &ndash; Updates the resource row.
- [ResourceApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/delete.md) &ndash; Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceApi::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApi::deleteResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserIdAndCanonical.md) &ndash; Deletes the resource identified by the given lud_user_id and canonical.
- [ResourceApi::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByIds.md) &ndash; Deletes the resource rows identified by the given ids.
- [ResourceApi::deleteResourceByLudUserIdsAndCanonicals](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserIdsAndCanonicals.md) &ndash; Deletes the resource rows identified by the given lud_user_ids.
- [ResourceApi::deleteResourceByLudUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByLudUserId.md) &ndash; Deletes the resource rows having the given user id.
- [ResourceApi::fetchRoutine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Generated\Classes\ResourceApi<br>
See the source code of [Ling\Light_UserData\Api\Generated\Classes\ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceApi.php)



SeeAlso
==============
Previous class: [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi.md)<br>Next class: [ResourceFileApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceFileApi.md)<br>
