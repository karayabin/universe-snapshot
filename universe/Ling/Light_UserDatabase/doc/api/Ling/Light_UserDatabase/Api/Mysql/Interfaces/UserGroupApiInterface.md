[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupApiInterface class
================
2019-07-19 --> 2020-02-07






Introduction
============

The UserGroupApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserGroupApiInterface</span>  {

- Methods
    - abstract public [insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/insertUserGroup.md)(array $userGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroup.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroups.md)($where, ?array $markers = []) : array
    - abstract public [getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getAllIds.md)() : array
    - abstract public [updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/updateUserGroupById.md)(int $id, array $userGroup) : void
    - abstract public [updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/updateUserGroupByName.md)(string $name, array $userGroup) : void
    - abstract public [deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/deleteUserGroupById.md)(int $id) : void
    - abstract public [deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/deleteUserGroupByName.md)(string $name) : void

}






Methods
==============

- [UserGroupApiInterface::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/insertUserGroup.md) &ndash; Inserts the given userGroup in the database.
- [UserGroupApiInterface::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupById.md) &ndash; Returns the userGroup row identified by the given id.
- [UserGroupApiInterface::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupByName.md) &ndash; Returns the userGroup row identified by the given name.
- [UserGroupApiInterface::getUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroup.md) &ndash; Returns the userGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApiInterface::getUserGroups](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroups.md) &ndash; Returns the userGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getUserGroupIdByName.md) &ndash; Returns the id of the lud_user_group table.
- [UserGroupApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/getAllIds.md) &ndash; Returns an array of all userGroup ids.
- [UserGroupApiInterface::updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/updateUserGroupById.md) &ndash; Updates the userGroup row identified by the given id.
- [UserGroupApiInterface::updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/updateUserGroupByName.md) &ndash; Updates the userGroup row identified by the given name.
- [UserGroupApiInterface::deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/deleteUserGroupById.md) &ndash; Deletes the userGroup identified by the given id.
- [UserGroupApiInterface::deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupApiInterface/deleteUserGroupByName.md) &ndash; Deletes the userGroup identified by the given name.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/UserGroupApiInterface.php)



SeeAlso
==============
Previous class: [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface.md)<br>Next class: [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserGroupHasPluginOptionApiInterface.md)<br>
