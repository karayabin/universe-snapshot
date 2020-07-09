[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The TagApi class
================
2019-09-27 --> 2020-06-23






Introduction
============

The TagApi class.



Class synopsis
==============


class <span class="pl-k">TagApi</span> extends [CustomLightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomLightUserDataBaseApi.md) implements [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/__construct.md)() : void
    - public [insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTags.md)($where, ?array $markers = []) : array
    - public [getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsByResourceId.md)(string $resourceId) : array
    - public [getTagsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdsByResourceId.md)(string $resourceId) : array
    - public [getTagIdsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdsByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagNamesByResourceId.md)(string $resourceId) : array
    - public [getTagNamesByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagNamesByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getAllIds.md)() : array
    - public [updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/updateTagById.md)(int $id, array $tag) : void
    - public [updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/updateTagByName.md)(string $name, array $tag) : void
    - public [delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagById.md)(int $id) : void
    - public [deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByName.md)(string $name) : void
    - public [deleteTagByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByIds.md)(array $ids) : void
    - public [deleteTagByNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByNames.md)(array $names) : void

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [TagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/__construct.md) &ndash; Builds the TagApi instance.
- [TagApi::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/insertTag.md) &ndash; Inserts the given tag in the database.
- [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagById.md) &ndash; Returns the tag row identified by the given id.
- [TagApi::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagByName.md) &ndash; Returns the tag row identified by the given name.
- [TagApi::getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTag.md) &ndash; Returns the tag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTags.md) &ndash; Returns the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsColumns.md) &ndash; Returns a subset of the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsKey2Value.md) &ndash; Returns an array of $key => $value from the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdByName.md) &ndash; Returns the id of the luda_tag table.
- [TagApi::getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsByResourceId.md) &ndash; Returns the rows of the luda_tag table bound to the given resource id.
- [TagApi::getTagsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsByResourceResourceIdentifier.md) &ndash; Returns the rows of the luda_tag table bound to the given resource resource_identifier.
- [TagApi::getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdsByResourceId.md) &ndash; Returns an array of luda_tag.id bound to the given resource id.
- [TagApi::getTagIdsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdsByResourceResourceIdentifier.md) &ndash; Returns an array of luda_tag.id bound to the given resource resource_identifier.
- [TagApi::getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagNamesByResourceId.md) &ndash; Returns an array of luda_tag.name bound to the given resource id.
- [TagApi::getTagNamesByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagNamesByResourceResourceIdentifier.md) &ndash; Returns an array of luda_tag.name bound to the given resource resource_identifier.
- [TagApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getAllIds.md) &ndash; Returns an array of all tag ids.
- [TagApi::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/updateTagById.md) &ndash; Updates the tag row identified by the given id.
- [TagApi::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/updateTagByName.md) &ndash; Updates the tag row identified by the given name.
- [TagApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/delete.md) &ndash; Deletes the tag rows matching the given where conditions, and returns the number of deleted rows.
- [TagApi::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagById.md) &ndash; Deletes the tag identified by the given id.
- [TagApi::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByName.md) &ndash; Deletes the tag identified by the given name.
- [TagApi::deleteTagByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByIds.md) &ndash; Deletes the tag rows identified by the given ids.
- [TagApi::deleteTagByNames](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/deleteTagByNames.md) &ndash; Deletes the tag rows identified by the given names.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Generated\Classes\TagApi<br>
See the source code of [Ling\Light_UserData\Api\Generated\Classes\TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/TagApi.php)



SeeAlso
==============
Previous class: [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md)<br>Next class: [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)<br>
