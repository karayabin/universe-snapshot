[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomUserApi class
================
2019-07-19 --> 2020-06-25






Introduction
============

The CustomUserApi class.



Class synopsis
==============


class <span class="pl-k">CustomUserApi</span> extends [UserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi.md) implements [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md), [CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [LightUserDatabaseBaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseBaseApi::$container](#property-container) ;
    - protected string [LightUserDatabaseBaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserApi/__construct.md)() : void

- Inherited methods
    - public [UserApi::insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/insertUser.md)(array $user, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [UserApi::getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserApi::getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserApi::getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUser.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [UserApi::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsers.md)($where, ?array $markers = []) : array
    - public [UserApi::getUsersColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersColumn.md)(string $column, $where, ?array $markers = []) : array
    - public [UserApi::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersColumns.md)($columns, $where, ?array $markers = []) : array
    - public [UserApi::getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - public [UserApi::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - public [UserApi::getUsersByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersByPermissionGroupId.md)(string $permissionGroupId) : array
    - public [UserApi::getUsersByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersByPermissionGroupName.md)(string $permissionGroupName) : array
    - public [UserApi::getUserIdsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdsByPermissionGroupId.md)(string $permissionGroupId) : array
    - public [UserApi::getUserIdsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdsByPermissionGroupName.md)(string $permissionGroupName) : array
    - public [UserApi::getUserIdentifiersByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdentifiersByPermissionGroupId.md)(string $permissionGroupId) : array
    - public [UserApi::getUserIdentifiersByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdentifiersByPermissionGroupName.md)(string $permissionGroupName) : array
    - public [UserApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getAllIds.md)() : array
    - public [UserApi::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/updateUserById.md)(int $id, array $user) : void
    - public [UserApi::updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/updateUserByIdentifier.md)(string $identifier, array $user) : void
    - public [UserApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/delete.md)(?$where = null, ?array $markers = []) : false | int
    - public [UserApi::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserById.md)(int $id) : void
    - public [UserApi::deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIdentifier.md)(string $identifier) : void
    - public [UserApi::deleteUserByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIds.md)(array $ids) : void
    - public [UserApi::deleteUserByIdentifiers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIdentifiers.md)(array $identifiers) : void
    - public [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomUserApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserApi/__construct.md) &ndash; Builds the CustomUserApi instance.
- [UserApi::insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/insertUser.md) &ndash; Inserts the given user in the database.
- [UserApi::getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserById.md) &ndash; Returns the user row identified by the given id.
- [UserApi::getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserByIdentifier.md) &ndash; Returns the user row identified by the given identifier.
- [UserApi::getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUser.md) &ndash; Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsers.md) &ndash; Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersColumns.md) &ndash; Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersKey2Value.md) &ndash; Returns an array of $key => $value from the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApi::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdByIdentifier.md) &ndash; Returns the id of the lud_user table.
- [UserApi::getUsersByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersByPermissionGroupId.md) &ndash; Returns the rows of the lud_user table bound to the given permission_group id.
- [UserApi::getUsersByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUsersByPermissionGroupName.md) &ndash; Returns the rows of the lud_user table bound to the given permission_group name.
- [UserApi::getUserIdsByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdsByPermissionGroupId.md) &ndash; Returns an array of lud_user.id bound to the given permission_group id.
- [UserApi::getUserIdsByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdsByPermissionGroupName.md) &ndash; Returns an array of lud_user.id bound to the given permission_group name.
- [UserApi::getUserIdentifiersByPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdentifiersByPermissionGroupId.md) &ndash; Returns an array of lud_user.identifier bound to the given permission_group id.
- [UserApi::getUserIdentifiersByPermissionGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getUserIdentifiersByPermissionGroupName.md) &ndash; Returns an array of lud_user.identifier bound to the given permission_group name.
- [UserApi::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/getAllIds.md) &ndash; Returns an array of all user ids.
- [UserApi::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/updateUserById.md) &ndash; Updates the user row identified by the given id.
- [UserApi::updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/updateUserByIdentifier.md) &ndash; Updates the user row identified by the given identifier.
- [UserApi::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/delete.md) &ndash; Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
- [UserApi::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [UserApi::deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIdentifier.md) &ndash; Deletes the user identified by the given identifier.
- [UserApi::deleteUserByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIds.md) &ndash; Deletes the user rows identified by the given ids.
- [UserApi::deleteUserByIdentifiers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/UserApi/deleteUserByIdentifiers.md) &ndash; Deletes the user rows identified by the given identifiers.
- [LightUserDatabaseBaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightUserDatabaseBaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/LightUserDatabaseBaseApi/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Classes\CustomUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Classes/CustomUserApi.php)



SeeAlso
==============
Previous class: [CustomPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomPluginOptionApi.md)<br>Next class: [CustomUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Classes/CustomUserGroupApi.md)<br>
