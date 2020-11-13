[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceHasTagApiInterface class
================
2019-09-27 --> 2020-11-12






Introduction
============

The CustomResourceHasTagApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomResourceHasTagApiInterface</span> implements [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md) {

- Inherited methods
    - abstract public [ResourceHasTagApiInterface::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTag.md)(array $resourceHasTag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceHasTagApiInterface::insertResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTags.md)(array $resourceHasTags, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceHasTagApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [ResourceHasTagApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [ResourceHasTagApiInterface::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceHasTagApiInterface::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceHasTagApiInterface::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTags.md)($where, ?array $markers = []) : array
    - abstract public [ResourceHasTagApiInterface::getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [ResourceHasTagApiInterface::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [ResourceHasTagApiInterface::getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [ResourceHasTagApiInterface::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, array $resourceHasTag, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ResourceHasTagApiInterface::updateResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTag.md)(array $resourceHasTag, ?$where = null, ?array $markers = []) : void
    - abstract public [ResourceHasTagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id) : void
    - abstract public [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIds.md)(array $resource_ids) : void
    - abstract public [ResourceHasTagApiInterface::deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagIds.md)(array $tag_ids) : void
    - abstract public [ResourceHasTagApiInterface::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceId.md)(int $resourceId) : void
    - abstract public [ResourceHasTagApiInterface::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagId.md)(int $tagId) : void

}






Methods
==============

- [ResourceHasTagApiInterface::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTag.md) &ndash; Inserts the given resource has tag in the database.
- [ResourceHasTagApiInterface::insertResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTags.md) &ndash; Inserts the given resource has tag rows in the database.
- [ResourceHasTagApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ResourceHasTagApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ResourceHasTagApiInterface::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagByResourceIdAndTagId.md) &ndash; Returns the resource has tag row identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTag.md) &ndash; Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTags.md) &ndash; Returns the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumns.md) &ndash; Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsKey2Value.md) &ndash; Returns an array of $key => $value from the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTagByResourceIdAndTagId.md) &ndash; Updates the resource has tag row identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::updateResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTag.md) &ndash; Updates the resource has tag row.
- [ResourceHasTagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/delete.md) &ndash; Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIdAndTagId.md) &ndash; Deletes the resource has tag identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIds.md) &ndash; Deletes the resource has tag rows identified by the given resource_ids.
- [ResourceHasTagApiInterface::deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagIds.md) &ndash; Deletes the resource has tag rows identified by the given tag_ids.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceId.md) &ndash; Deletes the resource has tag rows having the given resource id.
- [ResourceHasTagApiInterface::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagId.md) &ndash; Deletes the resource has tag rows having the given tag id.





Location
=============
Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceHasTagApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.php)



SeeAlso
==============
Previous class: [CustomResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceFileApiInterface.md)<br>Next class: [CustomTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomTagApiInterface.md)<br>
