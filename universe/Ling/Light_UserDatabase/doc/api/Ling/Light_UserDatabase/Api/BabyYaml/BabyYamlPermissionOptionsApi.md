[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlPermissionOptionsApi class
================
2019-07-19 --> 2019-12-17






Introduction
============

The BabyYamlPermissionOptionsApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlPermissionOptionsApi</span> extends [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md) implements [PermissionOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md) {

- Inherited properties
    - protected string [BabyYamlBaseApi::$file](#property-file) ;
    - protected string [BabyYamlBaseApi::$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [BabyYamlBaseApi::$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [BabyYamlBaseApi::$table](#property-table) ;
    - protected array [BabyYamlBaseApi::$ric](#property-ric) ;
    - protected string [BabyYamlBaseApi::$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/insertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/getPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/updatePermissionOptionsById.md)(int $id, array $permissionOptions) : void
    - public [deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/deletePermissionOptionsById.md)(int $id) : void

- Inherited methods
    - public [BabyYamlBaseApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md)() : void
    - public [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md)(string $file) : void
    - public [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md)(string $rootKey) : void
    - protected [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md)() : [BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md)
    - protected [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md)(array $key, ?$default = null, ?bool $throwNotFoundEx = false) : array | false | null
    - protected [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md)(array $item, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : array | bool | int | null

}






Methods
==============

- [BabyYamlPermissionOptionsApi::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/insertPermissionOptions.md) &ndash; Inserts the given permissionOptions in the database.
- [BabyYamlPermissionOptionsApi::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/getPermissionOptionsById.md) &ndash; Returns the permissionOptions row identified by the given id.
- [BabyYamlPermissionOptionsApi::updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/updatePermissionOptionsById.md) &ndash; Updates the permissionOptions row identified by the given id.
- [BabyYamlPermissionOptionsApi::deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi/deletePermissionOptionsById.md) &ndash; Deletes the permissionOptions identified by the given id.
- [BabyYamlBaseApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md) &ndash; Builds the BabyYamlBaseApi instance.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionOptionsApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlPermissionOptionsApi.php)



SeeAlso
==============
Previous class: [BabyYamlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionGroupHasPermissionApi.md)<br>Next class: [BabyYamlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi.md)<br>
