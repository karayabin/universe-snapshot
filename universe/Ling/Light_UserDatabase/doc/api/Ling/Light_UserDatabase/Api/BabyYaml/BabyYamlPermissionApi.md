[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlPermissionApi class
================
2019-07-19 --> 2019-09-18






Introduction
============

The BabyYamlPermissionApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlPermissionApi</span> extends [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md) implements [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface.md) {

- Inherited properties
    - protected string [BabyYamlBaseApi::$file](#property-file) ;
    - protected string [BabyYamlBaseApi::$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [BabyYamlBaseApi::$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [BabyYamlBaseApi::$table](#property-table) ;
    - protected array [BabyYamlBaseApi::$ric](#property-ric) ;
    - protected string [BabyYamlBaseApi::$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/__construct.md)() : void
    - public [getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/getPermissionById.md)(int $id, $default = null, bool $throwNotFoundEx = false) : mixed
    - public [updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/updatePermissionById.md)(int $id, array $permission) : void
    - public [insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/insertPermission.md)(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed
    - public [deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/deletePermissionById.md)(int $id) : void
    - public [getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/getPermissionNamesByUserId.md)(int $id) : array

- Inherited methods
    - public [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md)(string $file) : void
    - public [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md)(string $rootKey) : void
    - protected [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md)() : [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)
    - protected [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md)(array $key, $default = null, bool $throwNotFoundEx = false) : array | false | null
    - protected [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md)(array $item, bool $ignoreDuplicate = true, bool $returnRic = false) : array | bool | int | null

}






Methods
==============

- [BabyYamlPermissionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/__construct.md) &ndash; Builds the BabyYamlPermissionApi instance.
- [BabyYamlPermissionApi::getPermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/getPermissionById.md) &ndash; Returns the permission row identified by the given id.
- [BabyYamlPermissionApi::updatePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/updatePermissionById.md) &ndash; Updates the permission row identified by the given id.
- [BabyYamlPermissionApi::insertPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/insertPermission.md) &ndash; Inserts the given permission in the database.
- [BabyYamlPermissionApi::deletePermissionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/deletePermissionById.md) &ndash; Deletes the permission identified by the given id.
- [BabyYamlPermissionApi::getPermissionNamesByUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionApi/getPermissionNamesByUserId.md) &ndash; Returns all the permission names associated with the given user id.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlPermissionApi.php)



SeeAlso
==============
Previous class: [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md)<br>Next class: [BabyYamlPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupApi.md)<br>
