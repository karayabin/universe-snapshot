[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceApiInterface class
================
2019-09-27 --> 2021-03-05






Introduction
============

The CustomResourceApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomResourceApiInterface</span> implements [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) {

- Methods
    - abstract public [hasResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/hasResourceByResourceIdentifier.md)(string $resourceIdentifier) : bool
    - abstract public [getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getBaseResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array | false
    - abstract public [getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceFilePathInfoByResourceIdentifier.md)(string $resourceIdentifier) : array | false

- Inherited methods
    - abstract public [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceApiInterface::insertResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResources.md)(array $resources, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [ResourceApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceApiInterface::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResources.md)($where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [ResourceApiInterface::getResourceIdByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceIdByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [ResourceApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getAllIds.md)() : array
    - abstract public [ResourceApiInterface::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceById.md)(int $id, array $resource, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ResourceApiInterface::updateResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical, array $resource, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ResourceApiInterface::updateResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResource.md)(array $resource, ?$where = null, ?array $markers = []) : void
    - abstract public [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [ResourceApiInterface::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceById.md)(int $id) : void
    - abstract public [ResourceApiInterface::deleteResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserIdAndCanonical.md)(int $lud_user_id, string $canonical) : void
    - abstract public [ResourceApiInterface::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByIds.md)(array $ids) : void
    - abstract public [ResourceApiInterface::deleteResourceByLudUserIdsAndCanonicals](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserIdsAndCanonicals.md)(array $lud_user_ids) : void
    - abstract public [ResourceApiInterface::deleteResourceByLudUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserId.md)(int $userId) : void

}






Methods
==============

- [CustomResourceApiInterface::hasResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/hasResourceByResourceIdentifier.md) &ndash; Returns whether a resource with the given identifier exists in the database.
- [CustomResourceApiInterface::getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getBaseResourceInfoByResourceIdentifier.md) &ndash;     - is_source: bool, whether this file is the source file.
- [CustomResourceApiInterface::getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceFilePathInfoByResourceIdentifier.md) &ndash; Returns an array of information for the resource which identifier is given, or false if not found.
- [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApiInterface::insertResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResources.md) &ndash; Inserts the given resource rows in the database.
- [ResourceApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ResourceApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApiInterface::getResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByLudUserIdAndCanonical.md) &ndash; Returns the resource row identified by the given lud_user_id and canonical.
- [ResourceApiInterface::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResource.md) &ndash; Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResources.md) &ndash; Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesColumns.md) &ndash; Returns a subset of the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourcesKey2Value.md) &ndash; Returns an array of $key => $value from the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApiInterface::getResourceIdByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceIdByLudUserIdAndCanonical.md) &ndash; Returns the id of the luda_resource table.
- [ResourceApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApiInterface::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApiInterface::updateResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResourceByLudUserIdAndCanonical.md) &ndash; Updates the resource row identified by the given lud_user_id and canonical.
- [ResourceApiInterface::updateResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/updateResource.md) &ndash; Updates the resource row.
- [ResourceApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/delete.md) &ndash; Deletes the resource rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceApiInterface::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApiInterface::deleteResourceByLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserIdAndCanonical.md) &ndash; Deletes the resource identified by the given lud_user_id and canonical.
- [ResourceApiInterface::deleteResourceByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByIds.md) &ndash; Deletes the resource rows identified by the given ids.
- [ResourceApiInterface::deleteResourceByLudUserIdsAndCanonicals](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserIdsAndCanonicals.md) &ndash; Deletes the resource rows identified by the given lud_user_ids.
- [ResourceApiInterface::deleteResourceByLudUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/deleteResourceByLudUserId.md) &ndash; Deletes the resource rows having the given user id.





Location
=============
Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceApiInterface.php)



SeeAlso
==============
Previous class: [CustomLightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomLightUserDataApiFactory.md)<br>Next class: [CustomResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceFileApiInterface.md)<br>
