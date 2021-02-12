[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The CustomResourceFileApiInterface class
================
2019-09-27 --> 2021-02-11






Introduction
============

The CustomResourceFileApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomResourceFileApiInterface</span> implements [ResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface.md) {

- Methods
    - abstract public [fetchAllByUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceFileApiInterface/fetchAllByUserId.md)(string $userId, ?array $components = []) : array

- Inherited methods
    - abstract public [ResourceFileApiInterface::insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFile.md)(array $resourceFile, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceFileApiInterface::insertResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFiles.md)(array $resourceFiles, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [ResourceFileApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [ResourceFileApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [ResourceFileApiInterface::getResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFileById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceFileApiInterface::getResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFile.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [ResourceFileApiInterface::getResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFiles.md)($where, ?array $markers = []) : array
    - abstract public [ResourceFileApiInterface::getResourceFilesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [ResourceFileApiInterface::getResourceFilesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [ResourceFileApiInterface::getResourceFilesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [ResourceFileApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getAllIds.md)() : array
    - abstract public [ResourceFileApiInterface::updateResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/updateResourceFileById.md)(int $id, array $resourceFile, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [ResourceFileApiInterface::updateResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/updateResourceFile.md)(array $resourceFile, ?$where = null, ?array $markers = []) : void
    - abstract public [ResourceFileApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [ResourceFileApiInterface::deleteResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileById.md)(int $id) : void
    - abstract public [ResourceFileApiInterface::deleteResourceFileByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileByIds.md)(array $ids) : void
    - abstract public [ResourceFileApiInterface::deleteResourceFileByLudaResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileByLudaResourceId.md)(int $resourceId) : void

}






Methods
==============

- [CustomResourceFileApiInterface::fetchAllByUserId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceFileApiInterface/fetchAllByUserId.md) &ndash; Returns the array of resource file rows matching the given components.
- [ResourceFileApiInterface::insertResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFile.md) &ndash; Inserts the given resource file in the database.
- [ResourceFileApiInterface::insertResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/insertResourceFiles.md) &ndash; Inserts the given resource file rows in the database.
- [ResourceFileApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [ResourceFileApiInterface::fetch](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [ResourceFileApiInterface::getResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFileById.md) &ndash; Returns the resource file row identified by the given id.
- [ResourceFileApiInterface::getResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFile.md) &ndash; Returns the resourceFile row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApiInterface::getResourceFiles](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFiles.md) &ndash; Returns the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApiInterface::getResourceFilesColumn](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApiInterface::getResourceFilesColumns](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesColumns.md) &ndash; Returns a subset of the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApiInterface::getResourceFilesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getResourceFilesKey2Value.md) &ndash; Returns an array of $key => $value from the resourceFile rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [ResourceFileApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/getAllIds.md) &ndash; Returns an array of all resourceFile ids.
- [ResourceFileApiInterface::updateResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/updateResourceFileById.md) &ndash; Updates the resource file row identified by the given id.
- [ResourceFileApiInterface::updateResourceFile](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/updateResourceFile.md) &ndash; Updates the resource file row.
- [ResourceFileApiInterface::delete](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/delete.md) &ndash; Deletes the resourceFile rows matching the given where conditions, and returns the number of deleted rows.
- [ResourceFileApiInterface::deleteResourceFileById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileById.md) &ndash; Deletes the resource file identified by the given id.
- [ResourceFileApiInterface::deleteResourceFileByIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileByIds.md) &ndash; Deletes the resource file rows identified by the given ids.
- [ResourceFileApiInterface::deleteResourceFileByLudaResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceFileApiInterface/deleteResourceFileByLudaResourceId.md) &ndash; Deletes the resource file rows having the given resource id.





Location
=============
Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceFileApiInterface<br>
See the source code of [Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceFileApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceFileApiInterface.php)



SeeAlso
==============
Previous class: [CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md)<br>Next class: [CustomResourceHasTagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceHasTagApiInterface.md)<br>
