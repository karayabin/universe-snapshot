[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The UserApi class
================
2021-04-06 --> 2021-08-02






Introduction
============

The UserApi class.



Class synopsis
==============


class <span class="pl-k">UserApi</span> extends [CustomLightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Classes/CustomLightKitStoreBaseApi.md) implements [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightKitStoreBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitStoreBaseApi::$container](#property-container) ;
    - protected string [LightKitStoreBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/__construct.md)() : void
    - public [insertUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/insertUser.md)(array $user, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [insertUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/insertUsers.md)(array $users, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetchAll.md)(?array $components = []) : array
    - public [fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetch.md)(?array $components = []) : array
    - public [getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUser.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [getUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsers.md)($where, ?array $markers = []) : array
    - public [getUsersColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumns.md)($columns, $where, ?array $markers = []) : array
    - public [getUsersKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getAllIds.md)() : array
    - public [updateUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/updateUserById.md)(int $id, array $user, ?array $extraWhere = [], ?array $markers = []) : void
    - public [updateUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/updateUser.md)(array $user, ?$where = null, ?array $markers = []) : void
    - public [delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [deleteUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/deleteUserById.md)(int $id) : void
    - public [deleteUserByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/deleteUserByIds.md)(array $ids) : void
    - protected [getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getDefaultValues.md)() : array
    - protected [fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetchRoutine.md)(string &$q, array &$markers, array $components, ?array $options = []) : array

- Inherited methods
    - public [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [UserApi::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/__construct.md) &ndash; Builds the UserApi instance.
- [UserApi::insertUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/insertUser.md) &ndash; Inserts the given user in the database.
- [UserApi::insertUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/insertUsers.md) &ndash; Inserts the given user rows in the database.
- [UserApi::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserApi::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserApi::getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUserById.md) &ndash; Returns the user row identified by the given id.
- [UserApi::getUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUser.md) &ndash; Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsers.md) &ndash; Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersColumns.md) &ndash; Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getUsersKey2Value.md) &ndash; Returns an array of $key => $value from the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getAllIds.md) &ndash; Returns an array of all user ids.
- [UserApi::updateUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/updateUserById.md) &ndash; Updates the user row identified by the given id.
- [UserApi::updateUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/updateUser.md) &ndash; Updates the user row.
- [UserApi::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/delete.md) &ndash; Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
- [UserApi::deleteUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [UserApi::deleteUserByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/deleteUserByIds.md) &ndash; Deletes the user rows identified by the given ids.
- [UserApi::getDefaultValues](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/getDefaultValues.md) &ndash; Returns the array of default values for this instance.
- [UserApi::fetchRoutine](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserApi/fetchRoutine.md) &ndash; Appends the given components to the given query, and returns an array of options.
- [LightKitStoreBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightKitStoreBaseApi::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_Kit_Store\Api\Generated\Classes\UserApi<br>
See the source code of [Ling\Light_Kit_Store\Api\Generated\Classes\UserApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/UserApi.php)



SeeAlso
==============
Previous class: [LightKitStoreBaseApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/LightKitStoreBaseApi.md)<br>Next class: [UserPurchasesItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/UserPurchasesItemApi.md)<br>
