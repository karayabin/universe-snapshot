[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The CustomUserApiInterface class
================
2021-04-06 --> 2021-08-02






Introduction
============

The CustomUserApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomUserApiInterface</span> implements [UserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface.md) {

- Methods
    - abstract public [getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/getUserByToken.md)(string $token, string $tokenType, ?mixed $default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updatePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/updatePassword.md)(string $newPassword) : void

- Inherited methods
    - abstract public [UserApiInterface::insertUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/insertUser.md)(array $user, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserApiInterface::insertUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/insertUsers.md)(array $users, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [UserApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [UserApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserApiInterface::getUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUser.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [UserApiInterface::getUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsers.md)($where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getUsersKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [UserApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getAllIds.md)() : array
    - abstract public [UserApiInterface::updateUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/updateUserById.md)(int $id, array $user, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [UserApiInterface::updateUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/updateUser.md)(array $user, ?$where = null, ?array $markers = []) : void
    - abstract public [UserApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [UserApiInterface::deleteUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md)(int $id) : void
    - abstract public [UserApiInterface::deleteUserByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/deleteUserByIds.md)(array $ids) : void

}






Methods
==============

- [CustomUserApiInterface::getUserByToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/getUserByToken.md) &ndash; Returns the user row identified by the given token.
- [CustomUserApiInterface::updatePassword](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserApiInterface/updatePassword.md) &ndash; Updates the user password with the given value.
- [UserApiInterface::insertUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/insertUser.md) &ndash; Inserts the given user in the database.
- [UserApiInterface::insertUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/insertUsers.md) &ndash; Inserts the given user rows in the database.
- [UserApiInterface::fetchAll](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [UserApiInterface::fetch](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUserById.md) &ndash; Returns the user row identified by the given id.
- [UserApiInterface::getUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUser.md) &ndash; Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsers](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsers.md) &ndash; Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersColumn](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersColumns](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersColumns.md) &ndash; Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsersKey2Value](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getUsersKey2Value.md) &ndash; Returns an array of $key => $value from the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getAllIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/getAllIds.md) &ndash; Returns an array of all user ids.
- [UserApiInterface::updateUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/updateUserById.md) &ndash; Updates the user row identified by the given id.
- [UserApiInterface::updateUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/updateUser.md) &ndash; Updates the user row.
- [UserApiInterface::delete](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/delete.md) &ndash; Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
- [UserApiInterface::deleteUserById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [UserApiInterface::deleteUserByIds](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserApiInterface/deleteUserByIds.md) &ndash; Deletes the user rows identified by the given ids.





Location
=============
Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface<br>
See the source code of [Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Custom/Interfaces/CustomUserApiInterface.php)



SeeAlso
==============
Previous class: [CustomItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomItemApiInterface.md)<br>Next class: [CustomUserPurchasesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/Interfaces/CustomUserPurchasesItemApiInterface.md)<br>
