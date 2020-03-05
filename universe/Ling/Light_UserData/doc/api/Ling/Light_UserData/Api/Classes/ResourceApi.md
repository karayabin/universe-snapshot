[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceApi class
================
2019-09-27 --> 2020-03-05






Introduction
============

The ResourceApi class.



Class synopsis
==============


abstract class <span class="pl-k">ResourceApi</span> extends [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi.md) implements [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/__construct.md)() : void
    - public [insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResources.md)($where, ?array $markers = []) : array
    - public [getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceIdByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getAllIds.md)() : array
    - public [updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/updateResourceById.md)(int $id, array $resource) : void
    - public [updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/updateResourceByResourceIdentifier.md)(string $resource_identifier, array $resource) : void
    - public [deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/deleteResourceById.md)(int $id) : void
    - public [deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/deleteResourceByResourceIdentifier.md)(string $resource_identifier) : void

- Inherited methods
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md)(string $type) : void
    - abstract public [ResourceApiInterface::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface/getResourceInfoByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed

}






Methods
==============

- [ResourceApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/__construct.md) &ndash; Builds the ResourceApi instance.
- [ResourceApi::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApi::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApi::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceByResourceIdentifier.md) &ndash; Returns the resource row identified by the given resource_identifier.
- [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResource.md) &ndash; Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResources.md) &ndash; Returns the resource rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceApi::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getResourceIdByResourceIdentifier.md) &ndash; Returns the id of the luda_resource table.
- [ResourceApi::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApi::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApi::updateResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/updateResourceByResourceIdentifier.md) &ndash; Updates the resource row identified by the given resource_identifier.
- [ResourceApi::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApi::deleteResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceApi/deleteResourceByResourceIdentifier.md) &ndash; Deletes the resource identified by the given resource_identifier.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.
- [LightUserDataBaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.
- [ResourceApiInterface::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface/getResourceInfoByResourceIdentifier.md) &ndash; Returns the resource info identified by the given resource_identifier.





Location
=============
Ling\Light_UserData\Api\Classes\ResourceApi<br>
See the source code of [Ling\Light_UserData\Api\Classes\ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Classes/ResourceApi.php)



SeeAlso
==============
Previous class: [LightUserDataBaseApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/LightUserDataBaseApi.md)<br>Next class: [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/ResourceHasTagApi.md)<br>
