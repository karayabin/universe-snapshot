[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The TagApi class
================
2019-09-27 --> 2019-12-20






Introduction
============

The TagApi class.



Class synopsis
==============


class <span class="pl-k">TagApi</span> extends [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi.md) implements [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface.md) {

- Inherited properties
    - protected Ling\Light_Database\Service\LightDatabaseService [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/__construct.md)() : void
    - public [insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getAllIds.md)() : array
    - public [updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/updateTagById.md)(int $id, array $tag) : void
    - public [updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/updateTagByName.md)(string $name, array $tag) : void
    - public [deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/deleteTagById.md)(int $id) : void
    - public [deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/deleteTagByName.md)(string $name) : void

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [TagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/__construct.md) &ndash; Builds the TagApi instance.
- [TagApi::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/insertTag.md) &ndash; Inserts the given tag in the database.
- [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getTagById.md) &ndash; Returns the tag row identified by the given id.
- [TagApi::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getTagByName.md) &ndash; Returns the tag row identified by the given name.
- [TagApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/getAllIds.md) &ndash; Returns an array of all tag ids.
- [TagApi::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/updateTagById.md) &ndash; Updates the tag row identified by the given id.
- [TagApi::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/updateTagByName.md) &ndash; Updates the tag row identified by the given name.
- [TagApi::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/deleteTagById.md) &ndash; Deletes the tag identified by the given id.
- [TagApi::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi/deleteTagByName.md) &ndash; Deletes the tag identified by the given name.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\TagApi<br>
See the source code of [Ling\Light_UserData\Api\TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/TagApi.php)



SeeAlso
==============
Previous class: [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApiInterface.md)<br>Next class: [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface.md)<br>
