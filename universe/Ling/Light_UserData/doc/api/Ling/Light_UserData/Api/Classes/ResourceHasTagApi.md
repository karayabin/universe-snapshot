[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceHasTagApi class
================
2019-09-27 --> 2020-03-05






Introduction
============

The ResourceHasTagApi class.



Class synopsis
==============


class <span class="pl-k">ResourceHasTagApi</span> extends [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi.md) implements [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceHasTagApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/__construct.md)() : void
    - public [insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/insertResourceHasTag.md)(array $resourceHasTag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTags.md)($where, ?array $markers = []) : array
    - public [updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/updateResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, array $resourceHasTag) : void
    - public [deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id) : void
    - public [deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceId.md)(int $resource_id) : void
    - public [deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByTagId.md)(int $tag_id) : void

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [ResourceHasTagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/__construct.md) &ndash; Builds the ResourceHasTagApi instance.
- [ResourceHasTagApi::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/insertResourceHasTag.md) &ndash; Inserts the given resourceHasTag in the database.
- [ResourceHasTagApi::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTagByResourceIdAndTagId.md) &ndash; Returns the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApi::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTag.md) &ndash; Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/getResourceHasTags.md) &ndash; Returns the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/updateResourceHasTagByResourceIdAndTagId.md) &ndash; Updates the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApi::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIdAndTagId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id and tag_id.
- [ResourceHasTagApi::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id.
- [ResourceHasTagApi::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi/deleteResourceHasTagByTagId.md) &ndash; Deletes the resourceHasTag identified by the given tag_id.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserData\Api\Classes\ResourceHasTagApi<br>
See the source code of [Ling\Light_UserData\Api\Classes\ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Classes/ResourceHasTagApi.php)



SeeAlso
==============
Previous class: [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi.md)<br>Next class: [TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi.md)<br>
