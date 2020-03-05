[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomTagApi class
================
2019-09-27 --> 2020-03-05






Introduction
============

The CustomTagApi class.



Class synopsis
==============


class <span class="pl-k">CustomTagApi</span> extends [TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi.md) implements [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/TagApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [removeUnusedTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomTagApi/removeUnusedTags.md)() : void

- Inherited methods
    - public [TagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/__construct.md)() : void
    - public [TagApi::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TagApi::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TagApi::getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [TagApi::getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTags.md)($where, ?array $markers = []) : array
    - public [TagApi::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [TagApi::getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagsByResourceId.md)(string $resourceId) : array
    - public [TagApi::getTagsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagsByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [TagApi::getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdsByResourceId.md)(string $resourceId) : array
    - public [TagApi::getTagIdsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdsByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [TagApi::getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagNamesByResourceId.md)(string $resourceId) : array
    - public [TagApi::getTagNamesByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagNamesByResourceResourceIdentifier.md)(string $resourceResourceIdentifier) : array
    - public [TagApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getAllIds.md)() : array
    - public [TagApi::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/updateTagById.md)(int $id, array $tag) : void
    - public [TagApi::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/updateTagByName.md)(string $name, array $tag) : void
    - public [TagApi::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/deleteTagById.md)(int $id) : void
    - public [TagApi::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/deleteTagByName.md)(string $name) : void
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [CustomTagApi::removeUnusedTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomTagApi/removeUnusedTags.md) &ndash; This cleaning routing removes all tags from the luda_tag table not bound to any resource.
- [TagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/__construct.md) &ndash; Builds the TagApi instance.
- [TagApi::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/insertTag.md) &ndash; Inserts the given tag in the database.
- [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagById.md) &ndash; Returns the tag row identified by the given id.
- [TagApi::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagByName.md) &ndash; Returns the tag row identified by the given name.
- [TagApi::getTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTag.md) &ndash; Returns the tag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTags.md) &ndash; Returns the tag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TagApi::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdByName.md) &ndash; Returns the id of the luda_tag table.
- [TagApi::getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagsByResourceId.md) &ndash; Returns the rows of the luda_tag table bound to the given resource id.
- [TagApi::getTagsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagsByResourceResourceIdentifier.md) &ndash; Returns the rows of the luda_tag table bound to the given resource resource_identifier.
- [TagApi::getTagIdsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdsByResourceId.md) &ndash; Returns an array of luda_tag.id bound to the given resource id.
- [TagApi::getTagIdsByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagIdsByResourceResourceIdentifier.md) &ndash; Returns an array of luda_tag.id bound to the given resource resource_identifier.
- [TagApi::getTagNamesByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagNamesByResourceId.md) &ndash; Returns an array of luda_tag.name bound to the given resource id.
- [TagApi::getTagNamesByResourceResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagNamesByResourceResourceIdentifier.md) &ndash; Returns an array of luda_tag.name bound to the given resource resource_identifier.
- [TagApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getAllIds.md) &ndash; Returns an array of all tag ids.
- [TagApi::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/updateTagById.md) &ndash; Updates the tag row identified by the given id.
- [TagApi::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/updateTagByName.md) &ndash; Updates the tag row identified by the given name.
- [TagApi::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/deleteTagById.md) &ndash; Deletes the tag identified by the given id.
- [TagApi::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/deleteTagByName.md) &ndash; Deletes the tag identified by the given name.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\Custom\CustomTagApi<br>
See the source code of [Ling\Light_UserData\Api\Custom\CustomTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/CustomTagApi.php)



SeeAlso
==============
Previous class: [CustomResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomResourceApi.md)<br>Next class: [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface.md)<br>
