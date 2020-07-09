[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceApiInterface class
================
2019-09-27 --> 2020-06-23






Introduction
============

The CustomResourceApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomResourceApiInterface</span> implements [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) {

- Methods
    - abstract public [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getResourceInfoByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getRelatedByResourceIdentifier.md)(string $resource_identifier) : array
    - abstract public [getRelatedIdsByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getRelatedIdsByResourceIdentifier.md)(string $resource_identifier) : array
    - abstract public [getSourceAndRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceAndRelatedByResourceIdentifier.md)(string $resource_identifier) : array

- Inherited methods
    - abstract public [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResources.md)($where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceIdByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [ResourceApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getAllIds.md)() : array
    - abstract public [ResourceApiInterface::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceById.md)(int $id, array $resource) : void
    - abstract public [ResourceApiInterface::updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceByResourceIdentifier.md)(string $resource_identifier, array $resource) : void
    - abstract public [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [ResourceApiInterface::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceById.md)(int $id) : void
    - abstract public [ResourceApiInterface::deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByResourceIdentifier.md)(string $resource_identifier) : void
    - abstract public [ResourceApiInterface::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByIds.md)(array $ids) : void
    - abstract public [ResourceApiInterface::deleteResourceByResourceIdentifiers](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByResourceIdentifiers.md)(array $resource_identifiers) : void

}






Methods
==============

- [CustomResourceApiInterface::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getResourceInfoByResourceIdentifier.md) &ndash; Returns the resource info identified by the given resource_identifier.
- [CustomResourceApiInterface::getRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getRelatedByResourceIdentifier.md) &ndash; Returns the related sources of the file which identifier is given.
- [CustomResourceApiInterface::getRelatedIdsByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getRelatedIdsByResourceIdentifier.md) &ndash; Returns the array of the ids of the [related files](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/related-files.md) of the resource which identifier was given.
- [CustomResourceApiInterface::getSourceAndRelatedByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceAndRelatedByResourceIdentifier.md) &ndash; Returns the rows for the source (identified by the given resource identifier) along with its related files.
- [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApiInterface::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByResourceIdentifier.md) &ndash; Returns the resource row identified by the given resource_identifier.
- [ResourceApiInterface::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResource.md) &ndash; Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResources.md) &ndash; Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumns.md) &ndash; Returns a subset of the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesKey2Value.md) &ndash; Returns an array of $key => $value from the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceIdByResourceIdentifier.md) &ndash; Returns the id of the luda_resource table.
- [ResourceApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApiInterface::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApiInterface::updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceByResourceIdentifier.md) &ndash; Updates the resource row identified by the given resource_identifier.
- [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/delete.md) &ndash; Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceApiInterface::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApiInterface::deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByResourceIdentifier.md) &ndash; Deletes the resource identified by the given resource_identifier.
- [ResourceApiInterface::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByIds.md) &ndash; Deletes the resource rows identified by the given ids.
- [ResourceApiInterface::deleteResourceByResourceIdentifiers](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByResourceIdentifiers.md) &ndash; Deletes the resource rows identified by the given resource_identifiers.





Location
=============
Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceApiInterface.php)



SeeAlso
==============
Previous class: [CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md)<br>Next class: [CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.md)<br>
