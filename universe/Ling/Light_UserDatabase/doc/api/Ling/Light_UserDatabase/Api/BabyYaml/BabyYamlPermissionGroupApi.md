[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlPermissionGroupApi class
================
2019-07-19 --> 2019-10-04






Introduction
============

The BabyYamlPermissionGroupApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlPermissionGroupApi</span> extends [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md) implements [PermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupApiInterface.md) {

- Inherited properties
    - protected string [BabyYamlBaseApi::$file](#property-file) ;
    - protected string [BabyYamlBaseApi::$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [BabyYamlBaseApi::$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [BabyYamlBaseApi::$table](#property-table) ;
    - protected array [BabyYamlBaseApi::$ric](#property-ric) ;
    - protected string [BabyYamlBaseApi::$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/__construct.md)() : void
    - public [getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/getPermissionGroupById.md)(int $id, $default = null, bool $throwNotFoundEx = false) : mixed
    - public [updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/updatePermissionGroupById.md)(int $id, array $permissionGroup) : void
    - public [insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/insertPermissionGroup.md)(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed
    - public [deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/deletePermissionGroupById.md)(int $id) : void
    - public [getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/getPermissionGroupIdByName.md)(string $name) : int | false

- Inherited methods
    - public [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md)(string $file) : void
    - public [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md)(string $rootKey) : void
    - protected [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md)() : [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)
    - protected [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md)(array $key, $default = null, bool $throwNotFoundEx = false) : array | false | null
    - protected [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md)(array $item, bool $ignoreDuplicate = true, bool $returnRic = false) : array | bool | int | null

}






Methods
==============

- [BabyYamlPermissionGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/__construct.md) &ndash; Builds the BabyYamlPermissionGroupApi instance.
- [BabyYamlPermissionGroupApi::getPermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/getPermissionGroupById.md) &ndash; Returns the permissionGroup row identified by the given id.
- [BabyYamlPermissionGroupApi::updatePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/updatePermissionGroupById.md) &ndash; Updates the permissionGroup row identified by the given id.
- [BabyYamlPermissionGroupApi::insertPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/insertPermissionGroup.md) &ndash; Inserts the given permissionGroup in the database.
- [BabyYamlPermissionGroupApi::deletePermissionGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/deletePermissionGroupById.md) &ndash; Deletes the permissionGroup identified by the given id.
- [BabyYamlPermissionGroupApi::getPermissionGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi/getPermissionGroupIdByName.md) &ndash; or false if the group doesn't exist.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlPermissionGroupApi.php)



SeeAlso
==============
Previous class: [BabyYamlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi.md)<br>Next class: [BabyYamlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupHasPermissionApi.md)<br>
