[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceHasTagApiInterface class
================
2019-09-27 --> 2020-06-23






Introduction
============

The ResourceHasTagApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">ResourceHasTagApiInterface</span>  {

- Methods
    - abstract public [insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTag.md)(array $resourceHasTag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTags.md)($where, ?array $markers = []) : array
    - abstract public [getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, array $resourceHasTag) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id) : void
    - abstract public [deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceId.md)(int $resource_id) : void
    - abstract public [deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagId.md)(int $tag_id) : void
    - abstract public [deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIds.md)(array $resource_ids) : void
    - abstract public [deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagIds.md)(array $tag_ids) : void

}






Methods
==============

- [ResourceHasTagApiInterface::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/insertResourceHasTag.md) &ndash; Inserts the given resourceHasTag in the database.
- [ResourceHasTagApiInterface::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagByResourceIdAndTagId.md) &ndash; Returns the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTag.md) &ndash; Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTags.md) &ndash; Returns the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsColumns.md) &ndash; Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/getResourceHasTagsKey2Value.md) &ndash; Returns an array of $key => $value from the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApiInterface::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/updateResourceHasTagByResourceIdAndTagId.md) &ndash; Updates the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/delete.md) &ndash; Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIdAndTagId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id and tag_id.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id.
- [ResourceHasTagApiInterface::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagId.md) &ndash; Deletes the resourceHasTag identified by the given tag_id.
- [ResourceHasTagApiInterface::deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByResourceIds.md) &ndash; Deletes the resourceHasTag rows identified by the given resource_resource_ids.
- [ResourceHasTagApiInterface::deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface/deleteResourceHasTagByTagIds.md) &ndash; Deletes the resourceHasTag rows identified by the given tag_tag_ids.





Location
=============
Ling\Light_UserData\Api\Generated\Interfaces\ResourceHasTagApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Generated\Interfaces\ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceHasTagApiInterface.php)



SeeAlso
==============
Previous class: [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)<br>Next class: [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md)<br>
