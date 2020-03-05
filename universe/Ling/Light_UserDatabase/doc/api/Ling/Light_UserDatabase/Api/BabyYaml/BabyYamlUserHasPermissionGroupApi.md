[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlUserHasPermissionGroupApi class
================
2019-07-19 --> 2019-12-17






Introduction
============

The BabyYamlUserHasPermissionGroupApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlUserHasPermissionGroupApi</span> extends [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md) implements [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserHasPermissionGroupApiInterface.md) {

- Inherited properties
    - protected string [BabyYamlBaseApi::$file](#property-file) ;
    - protected string [BabyYamlBaseApi::$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [BabyYamlBaseApi::$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [BabyYamlBaseApi::$table](#property-table) ;
    - protected array [BabyYamlBaseApi::$ric](#property-ric) ;
    - protected string [BabyYamlBaseApi::$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, array $userHasPermissionGroup) : void
    - public [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id) : void

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

- [BabyYamlUserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [BabyYamlUserHasPermissionGroupApi::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Updates the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [BabyYamlUserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/insertUserHasPermissionGroup.md) &ndash; Inserts the given userHasPermissionGroup in the database.
- [BabyYamlUserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
- [BabyYamlBaseApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md) &ndash; Builds the BabyYamlBaseApi instance.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserHasPermissionGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi.php)



SeeAlso
==============
Previous class: [BabyYamlPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlPermissionOptionsApi.md)<br>Next class: [BabyYamlUserOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi.md)<br>
