[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserGroupApiInterface class
================
2019-07-19 --> 2020-01-31






Introduction
============

The UserGroupApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserGroupApiInterface</span>  {

- Methods
    - abstract public [insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/insertUserGroup.md)(array $userGroup, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getAllIds.md)() : array
    - abstract public [updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/updateUserGroupById.md)(int $id, array $userGroup) : void
    - abstract public [updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/updateUserGroupByName.md)(string $name, array $userGroup) : void
    - abstract public [deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/deleteUserGroupById.md)(int $id) : void
    - abstract public [deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/deleteUserGroupByName.md)(string $name) : void
    - abstract public [getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed

}






Methods
==============

- [UserGroupApiInterface::insertUserGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/insertUserGroup.md) &ndash; Inserts the given userGroup in the database.
- [UserGroupApiInterface::getUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupById.md) &ndash; Returns the userGroup row identified by the given id.
- [UserGroupApiInterface::getUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupByName.md) &ndash; Returns the userGroup row identified by the given name.
- [UserGroupApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getAllIds.md) &ndash; Returns an array of all userGroup ids.
- [UserGroupApiInterface::updateUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/updateUserGroupById.md) &ndash; Updates the userGroup row identified by the given id.
- [UserGroupApiInterface::updateUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/updateUserGroupByName.md) &ndash; Updates the userGroup row identified by the given name.
- [UserGroupApiInterface::deleteUserGroupById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/deleteUserGroupById.md) &ndash; Deletes the userGroup identified by the given id.
- [UserGroupApiInterface::deleteUserGroupByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/deleteUserGroupByName.md) &ndash; Deletes the userGroup identified by the given name.
- [UserGroupApiInterface::getUserGroupIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface/getUserGroupIdByName.md) &ndash; Returns the id of the user group which name is given.





Location
=============
Ling\Light_UserDatabase\Api\UserGroupApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserGroupApiInterface.php)



SeeAlso
==============
Previous class: [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md)<br>Next class: [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface.md)<br>
