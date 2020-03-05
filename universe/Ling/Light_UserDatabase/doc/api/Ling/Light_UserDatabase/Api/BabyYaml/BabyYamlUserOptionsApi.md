[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The BabyYamlUserOptionsApi class
================
2019-07-19 --> 2019-12-17






Introduction
============

The BabyYamlUserOptionsApi class.



Class synopsis
==============


class <span class="pl-k">BabyYamlUserOptionsApi</span> extends [BabyYamlBaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi.md) implements [UserOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface.md) {

- Inherited properties
    - protected string [BabyYamlBaseApi::$file](#property-file) ;
    - protected string [BabyYamlBaseApi::$rootKey](#property-rootKey) ;
    - protected [Ling\BabyYamlDatabase\BabyYamlDatabaseInterface](https://github.com/lingtalfi/BabyYamlDatabase/blob/master/doc/api/Ling/BabyYamlDatabase/BabyYamlDatabaseInterface.md) [BabyYamlBaseApi::$babyYamlDatabase](#property-babyYamlDatabase) ;
    - protected string [BabyYamlBaseApi::$table](#property-table) ;
    - protected array [BabyYamlBaseApi::$ric](#property-ric) ;
    - protected string [BabyYamlBaseApi::$autoIncrementedKey](#property-autoIncrementedKey) ;

- Methods
    - public [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/insertUserOptions.md)(array $userOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/updateUserOptionsById.md)(int $id, array $userOptions) : void
    - public [deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/deleteUserOptionsById.md)(int $id) : void

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

- [BabyYamlUserOptionsApi::insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/insertUserOptions.md) &ndash; Inserts the given userOptions in the database.
- [BabyYamlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/getUserOptionsById.md) &ndash; Returns the userOptions row identified by the given id.
- [BabyYamlUserOptionsApi::updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/updateUserOptionsById.md) &ndash; Updates the userOptions row identified by the given id.
- [BabyYamlUserOptionsApi::deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserOptionsApi/deleteUserOptionsById.md) &ndash; Deletes the userOptions identified by the given id.
- [BabyYamlBaseApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/__construct.md) &ndash; Builds the BabyYamlBaseApi instance.
- [BabyYamlBaseApi::setFile](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setFile.md) &ndash; Sets the file.
- [BabyYamlBaseApi::setRootKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/setRootKey.md) &ndash; Sets the rootKey.
- [BabyYamlBaseApi::getBabyYamlDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getBabyYamlDatabase.md) &ndash; Returns the babyYamlDatabase object for this instance.
- [BabyYamlBaseApi::getItemByKey](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/getItemByKey.md) &ndash; Returns the first row matching the given key.
- [BabyYamlBaseApi::insertItem](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlBaseApi/insertItem.md) &ndash; Inserts the given item in the database.





Location
=============
Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserOptionsApi<br>
See the source code of [Ling\Light_UserDatabase\Api\BabyYaml\BabyYamlUserOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/BabyYaml/BabyYamlUserOptionsApi.php)



SeeAlso
==============
Previous class: [BabyYamlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/BabyYaml/BabyYamlUserHasPermissionGroupApi.md)<br>Next class: [MysqlPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionApi.md)<br>
