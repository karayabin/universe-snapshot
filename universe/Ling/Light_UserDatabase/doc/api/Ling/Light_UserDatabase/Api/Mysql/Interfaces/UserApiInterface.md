[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserApiInterface class
================
2019-07-19 --> 2020-02-07






Introduction
============

The UserApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserApiInterface</span>  {

- Methods
    - abstract public [insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/insertUser.md)(array $user, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUser.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUsers.md)($where, ?array $markers = []) : array
    - abstract public [getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserIdByIdentifier.md)(string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getAllIds.md)() : array
    - abstract public [updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/updateUserById.md)(int $id, array $user) : void
    - abstract public [updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/updateUserByIdentifier.md)(string $identifier, array $user) : void
    - abstract public [deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/deleteUserById.md)(int $id) : void
    - abstract public [deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/deleteUserByIdentifier.md)(string $identifier) : void

}






Methods
==============

- [UserApiInterface::insertUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/insertUser.md) &ndash; Inserts the given user in the database.
- [UserApiInterface::getUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserById.md) &ndash; Returns the user row identified by the given id.
- [UserApiInterface::getUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserByIdentifier.md) &ndash; Returns the user row identified by the given identifier.
- [UserApiInterface::getUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUser.md) &ndash; Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUsers](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUsers.md) &ndash; Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserApiInterface::getUserIdByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getUserIdByIdentifier.md) &ndash; Returns the id of the lud_user table.
- [UserApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/getAllIds.md) &ndash; Returns an array of all user ids.
- [UserApiInterface::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/updateUserById.md) &ndash; Updates the user row identified by the given id.
- [UserApiInterface::updateUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/updateUserByIdentifier.md) &ndash; Updates the user row identified by the given identifier.
- [UserApiInterface::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [UserApiInterface::deleteUserByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface/deleteUserByIdentifier.md) &ndash; Deletes the user identified by the given identifier.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserApiInterface.php)



SeeAlso
==============
Previous class: [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md)<br>Next class: [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface.md)<br>
