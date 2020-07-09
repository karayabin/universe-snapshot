[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceApi class
================
2019-09-27 --> 2020-06-23






Introduction
============

The CustomResourceApi class.



Class synopsis
==============


class <span class="pl-k">CustomResourceApi</span> extends [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md) implements [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md), [CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/__construct.md)() : void
    - public [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getResourceInfoByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getRelatedByResourceIdentifier.md)(string $resource_identifier) : array
    - public [getRelatedIdsByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getRelatedIdsByResourceIdentifier.md)(string $resource_identifier) : array
    - public [getSourceAndRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getSourceAndRelatedByResourceIdentifier.md)(string $resource_identifier) : array

- Inherited methods
    - public [ResourceApi::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ResourceApi::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ResourceApi::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ResourceApi::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResources.md)($where, ?array $markers = []) : array
    - public [ResourceApi::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ResourceApi::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ResourceApi::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ResourceApi::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceIdByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [ResourceApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getAllIds.md)() : array
    - public [ResourceApi::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceById.md)(int $id, array $resource) : void
    - public [ResourceApi::updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceByResourceIdentifier.md)(string $resource_identifier, array $resource) : void
    - public [ResourceApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ResourceApi::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceById.md)(int $id) : void
    - public [ResourceApi::deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByResourceIdentifier.md)(string $resource_identifier) : void
    - public [ResourceApi::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByIds.md)(array $ids) : void
    - public [ResourceApi::deleteResourceByResourceIdentifiers](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByResourceIdentifiers.md)(array $resource_identifiers) : void
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomResourceApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/__construct.md) &ndash; Builds the CustomResourceApi instance.
- [CustomResourceApi::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getResourceInfoByResourceIdentifier.md) &ndash; Returns the resource info identified by the given resource_identifier.
- [CustomResourceApi::getRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getRelatedByResourceIdentifier.md) &ndash; Returns the related sources of the file which identifier is given.
- [CustomResourceApi::getRelatedIdsByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getRelatedIdsByResourceIdentifier.md) &ndash; Returns the array of the ids of the [related files](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) of the resource which identifier was given.
- [CustomResourceApi::getSourceAndRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getSourceAndRelatedByResourceIdentifier.md) &ndash; Returns the rows for the source (identified by the given resource identifier) along with its related files.
- [ResourceApi::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApi::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApi::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceByResourceIdentifier.md) &ndash; Returns the resource row identified by the given resource_identifier.
- [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResource.md) &ndash; Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResources.md) &ndash; Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesColumns.md) &ndash; Returns a subset of the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesKey2Value.md) &ndash; Returns an array of $key => $value from the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceIdByResourceIdentifier.md) &ndash; Returns the id of the luda_resource table.
- [ResourceApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApi::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApi::updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/updateResourceByResourceIdentifier.md) &ndash; Updates the resource row identified by the given resource_identifier.
- [ResourceApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/delete.md) &ndash; Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceApi::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApi::deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByResourceIdentifier.md) &ndash; Deletes the resource identified by the given resource_identifier.
- [ResourceApi::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByIds.md) &ndash; Deletes the resource rows identified by the given ids.
- [ResourceApi::deleteResourceByResourceIdentifiers](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/deleteResourceByResourceIdentifiers.md) &ndash; Deletes the resource rows identified by the given resource_identifiers.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Custom\Classes\CustomResourceApi<br>
See the source code of [Ling\Light_UserData\Api\Custom\Classes\CustomResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Classes/CustomResourceApi.php)



SeeAlso
==============
Previous class: [CustomLightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomLightUserDataBaseApi.md)<br>Next class: [CustomResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceHasTagApi.md)<br>
