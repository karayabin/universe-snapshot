[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The TagApiInterface class
================
2019-09-27 --> 2021-06-03






Introduction
============

The TagApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">TagApiInterface</span>  {

- Methods
    - abstract public [insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTags.md)(array $tags, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTags.md)($where, ?array $markers = []) : array
    - abstract public [getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceId.md)(string $resourceId) : array
    - abstract public [getTagsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceId.md)(string $resourceId) : array
    - abstract public [getTagIdsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceId.md)(string $resourceId) : array
    - abstract public [getTagNamesByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getAllIds.md)() : array
    - abstract public [updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagById.md)(int $id, array $tag, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagByName.md)(string $name, array $tag, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [updateTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTag.md)(array $tag, ?$where = null, ?array $markers = []) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagById.md)(int $id) : void
    - abstract public [deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByName.md)(string $name) : void
    - abstract public [deleteTagByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByIds.md)(array $ids) : void
    - abstract public [deleteTagByNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByNames.md)(array $names) : void

}






Methods
==============

- [TagApiInterface::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTag.md) &ndash; Inserts the given tag in the database.
- [TagApiInterface::insertTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTags.md) &ndash; Inserts the given tag rows in the database.
- [TagApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [TagApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [TagApiInterface::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagById.md) &ndash; Returns the tag row identified by the given id.
- [TagApiInterface::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagByName.md) &ndash; Returns the tag row identified by the given name.
- [TagApiInterface::getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTag.md) &ndash; Returns the tag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApiInterface::getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTags.md) &ndash; Returns the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApiInterface::getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApiInterface::getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumns.md) &ndash; Returns a subset of the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApiInterface::getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsKey2Value.md) &ndash; Returns an array of $key => $value from the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApiInterface::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdByName.md) &ndash; Returns the id of the luda_tag table.
- [TagApiInterface::getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceId.md) &ndash; Returns the rows of the luda_tag table bound to the given resource id.
- [TagApiInterface::getTagsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceLudUserIdAndCanonical.md) &ndash; Returns the rows of the luda_tag table bound to the given resource lud_user_id and canonical.
- [TagApiInterface::getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceId.md) &ndash; Returns an array of luda_tag.id bound to the given resource id.
- [TagApiInterface::getTagIdsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceLudUserIdAndCanonical.md) &ndash; Returns an array of luda_tag.id bound to the given resource lud_user_id and canonical.
- [TagApiInterface::getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceId.md) &ndash; Returns an array of luda_tag.name bound to the given resource id.
- [TagApiInterface::getTagNamesByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceLudUserIdAndCanonical.md) &ndash; Returns an array of luda_tag.name bound to the given resource lud_user_id and canonical.
- [TagApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getAllIds.md) &ndash; Returns an array of all tag ids.
- [TagApiInterface::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagById.md) &ndash; Updates the tag row identified by the given id.
- [TagApiInterface::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagByName.md) &ndash; Updates the tag row identified by the given name.
- [TagApiInterface::updateTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTag.md) &ndash; Updates the tag row.
- [TagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/delete.md) &ndash; Deletes the tag rows matching the given where conditions, and returns the number of deleted rows.
- [TagApiInterface::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagById.md) &ndash; Deletes the tag identified by the given id.
- [TagApiInterface::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByName.md) &ndash; Deletes the tag identified by the given name.
- [TagApiInterface::deleteTagByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByIds.md) &ndash; Deletes the tag rows identified by the given ids.
- [TagApiInterface::deleteTagByNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByNames.md) &ndash; Deletes the tag rows identified by the given names.





Location
=============
Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/TagApiInterface.php)



SeeAlso
==============
Previous class: [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md)<br>Next class: [LightUserDataApiFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/LightUserDataApiFactory.md)<br>
