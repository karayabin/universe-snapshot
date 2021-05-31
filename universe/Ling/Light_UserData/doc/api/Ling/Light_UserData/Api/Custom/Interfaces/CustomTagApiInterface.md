[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomTagApiInterface class
================
2019-09-27 --> 2021-05-31






Introduction
============

The CustomTagApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomTagApiInterface</span> implements [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md) {

- Methods
    - abstract public [removeUnusedTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomTagApiInterface/removeUnusedTags.md)() : void

- Inherited methods
    - abstract public [TagApiInterface::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TagApiInterface::insertTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/insertTags.md)(array $tags, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [TagApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [TagApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [TagApiInterface::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TagApiInterface::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TagApiInterface::getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [TagApiInterface::getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTags.md)($where, ?array $markers = []) : array
    - abstract public [TagApiInterface::getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [TagApiInterface::getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [TagApiInterface::getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [TagApiInterface::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [TagApiInterface::getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceId.md)(string $resourceId) : array
    - abstract public [TagApiInterface::getTagsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [TagApiInterface::getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceId.md)(string $resourceId) : array
    - abstract public [TagApiInterface::getTagIdsByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdsByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [TagApiInterface::getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceId.md)(string $resourceId) : array
    - abstract public [TagApiInterface::getTagNamesByResourceLudUserIdAndCanonical](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagNamesByResourceLudUserIdAndCanonical.md)(string $resourceLudUserId, string $resourceCanonical) : array
    - abstract public [TagApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getAllIds.md)() : array
    - abstract public [TagApiInterface::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagById.md)(int $id, array $tag, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [TagApiInterface::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTagByName.md)(string $name, array $tag, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [TagApiInterface::updateTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/updateTag.md)(array $tag, ?$where = null, ?array $markers = []) : void
    - abstract public [TagApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [TagApiInterface::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagById.md)(int $id) : void
    - abstract public [TagApiInterface::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByName.md)(string $name) : void
    - abstract public [TagApiInterface::deleteTagByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByIds.md)(array $ids) : void
    - abstract public [TagApiInterface::deleteTagByNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/deleteTagByNames.md)(array $names) : void

}






Methods
==============

- [CustomTagApiInterface::removeUnusedTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomTagApiInterface/removeUnusedTags.md) &ndash; This cleaning routing removes all tags from the luda_tag table not bound to any resource.
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
Ling\Light_UserData\Api\Custom\Interfaces\CustomTagApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Custom\Interfaces\CustomTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomTagApiInterface.php)



SeeAlso
==============
Previous class: [CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.md)<br>Next class: [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi.md)<br>
