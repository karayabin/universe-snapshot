[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomUserApiInterface class
================
2019-07-19 --> 2020-07-21






Introduction
============

The CustomUserApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomUserApiInterface</span> implements [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md) {

- Methods
    - abstract public [getUsersByEmail](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface/getUsersByEmail.md)(string $email) : array

- Inherited methods
    - abstract public [UserApiInterface::insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/insertUser.md)(array $user, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserApiInterface::insertUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/insertUsers.md)(array $users, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserApiInterface::getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserApiInterface::getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUser.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserApiInterface::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsers.md)($where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [UserApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getAllIds.md)() : array
    - abstract public [UserApiInterface::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/updateUserById.md)(int $id, array $user) : void
    - abstract public [UserApiInterface::updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/updateUserByIdentifier.md)(string $identifier, array $user) : void
    - abstract public [UserApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [UserApiInterface::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md)(int $id) : void
    - abstract public [UserApiInterface::deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIdentifier.md)(string $identifier) : void
    - abstract public [UserApiInterface::deleteUserByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIds.md)(array $ids) : void
    - abstract public [UserApiInterface::deleteUserByIdentifiers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIdentifiers.md)(array $identifiers) : void

}






Methods
==============

- [CustomUserApiInterface::getUsersByEmail](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface/getUsersByEmail.md) &ndash; Returns the user rows matching the given email.
- [UserApiInterface::insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/insertUser.md) &ndash; Inserts the given user in the database.
- [UserApiInterface::insertUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/insertUsers.md) &ndash; Inserts the given user rows in the database.
- [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserById.md) &ndash; Returns the user row identified by the given id.
- [UserApiInterface::getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserByIdentifier.md) &ndash; Returns the user row identified by the given identifier.
- [UserApiInterface::getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUser.md) &ndash; Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsers.md) &ndash; Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersColumns.md) &ndash; Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUsersKey2Value.md) &ndash; Returns an array of $key => $value from the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getUserIdByIdentifier.md) &ndash; Returns the id of the lud_user table.
- [UserApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/getAllIds.md) &ndash; Returns an array of all user ids.
- [UserApiInterface::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/updateUserById.md) &ndash; Updates the user row identified by the given id.
- [UserApiInterface::updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/updateUserByIdentifier.md) &ndash; Updates the user row identified by the given identifier.
- [UserApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/delete.md) &ndash; Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
- [UserApiInterface::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [UserApiInterface::deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIdentifier.md) &ndash; Deletes the user identified by the given identifier.
- [UserApiInterface::deleteUserByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIds.md) &ndash; Deletes the user rows identified by the given ids.
- [UserApiInterface::deleteUserByIdentifiers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface/deleteUserByIdentifiers.md) &ndash; Deletes the user rows identified by the given identifiers.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomUserApiInterface.php)



SeeAlso
==============
Previous class: [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md)<br>Next class: [CustomUserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupApiInterface.md)<br>
