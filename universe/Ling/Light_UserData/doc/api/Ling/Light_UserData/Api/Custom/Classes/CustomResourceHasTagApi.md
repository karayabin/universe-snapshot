[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceHasTagApi class
================
2019-09-27 --> 2020-06-23






Introduction
============

The CustomResourceHasTagApi class.



Class synopsis
==============


class <span class="pl-k">CustomResourceHasTagApi</span> extends [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md) implements [ResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceHasTagApiInterface.md), [CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDataBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDataBaseApi::$container](#property-container) ;
    - protected string [LightUserDataBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceHasTagApi/__construct.md)() : void

- Inherited methods
    - public [ResourceHasTagApi::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/insertResourceHasTag.md)(array $resourceHasTag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [ResourceHasTagApi::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ResourceHasTagApi::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [ResourceHasTagApi::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTags.md)($where, ?array $markers = []) : array
    - public [ResourceHasTagApi::getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [ResourceHasTagApi::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsColumns.md)($columns, $where, ?array $markers = []) : array
    - public [ResourceHasTagApi::getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [ResourceHasTagApi::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/updateResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id, array $resourceHasTag) : void
    - public [ResourceHasTagApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [ResourceHasTagApi::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIdAndTagId.md)(int $resource_id, int $tag_id) : void
    - public [ResourceHasTagApi::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceId.md)(int $resource_id) : void
    - public [ResourceHasTagApi::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByTagId.md)(int $tag_id) : void
    - public [ResourceHasTagApi::deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIds.md)(array $resource_ids) : void
    - public [ResourceHasTagApi::deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByTagIds.md)(array $tag_ids) : void
    - public [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomResourceHasTagApi::__construct](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceHasTagApi/__construct.md) &ndash; Builds the CustomResourceHasTagApi instance.
- [ResourceHasTagApi::insertResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/insertResourceHasTag.md) &ndash; Inserts the given resourceHasTag in the database.
- [ResourceHasTagApi::getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagByResourceIdAndTagId.md) &ndash; Returns the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApi::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTag.md) &ndash; Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTags.md) &ndash; Returns the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::getResourceHasTagsColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::getResourceHasTagsColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsColumns.md) &ndash; Returns a subset of the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::getResourceHasTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagsKey2Value.md) &ndash; Returns an array of $key => $value from the resourceHasTag rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceHasTagApi::updateResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/updateResourceHasTagByResourceIdAndTagId.md) &ndash; Updates the resourceHasTag row identified by the given resource_id and tag_id.
- [ResourceHasTagApi::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/delete.md) &ndash; Deletes the resourceHasTag rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceHasTagApi::deleteResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIdAndTagId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id and tag_id.
- [ResourceHasTagApi::deleteResourceHasTagByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceId.md) &ndash; Deletes the resourceHasTag identified by the given resource_id.
- [ResourceHasTagApi::deleteResourceHasTagByTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByTagId.md) &ndash; Deletes the resourceHasTag identified by the given tag_id.
- [ResourceHasTagApi::deleteResourceHasTagByResourceIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByResourceIds.md) &ndash; Deletes the resourceHasTag rows identified by the given resource_resource_ids.
- [ResourceHasTagApi::deleteResourceHasTagByTagIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/deleteResourceHasTagByTagIds.md) &ndash; Deletes the resourceHasTag rows identified by the given tag_tag_ids.
- [LightUserDataBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDataBaseApi::setContainer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/LightUserDataBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserData\Api\Custom\Classes\CustomResourceHasTagApi<br>
See the source code of [Ling\Light_UserData\Api\Custom\Classes\CustomResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Classes/CustomResourceHasTagApi.php)



SeeAlso
==============
Previous class: [CustomResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi.md)<br>Next class: [CustomTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomTagApi.md)<br>
