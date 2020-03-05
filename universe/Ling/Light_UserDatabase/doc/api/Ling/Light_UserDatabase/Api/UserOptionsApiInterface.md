[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The UserOptionsApiInterface class
================
2019-07-19 --> 2019-12-17






Introduction
============

The UserOptionsApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">UserOptionsApiInterface</span>  {

- Methods
    - abstract public [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/insertUserOptions.md)(array $userOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/updateUserOptionsById.md)(int $id, array $userOptions) : void
    - abstract public [deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/deleteUserOptionsById.md)(int $id) : void

}






Methods
==============

- [UserOptionsApiInterface::insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/insertUserOptions.md) &ndash; Inserts the given userOptions in the database.
- [UserOptionsApiInterface::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/getUserOptionsById.md) &ndash; Returns the userOptions row identified by the given id.
- [UserOptionsApiInterface::updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/updateUserOptionsById.md) &ndash; Updates the userOptions row identified by the given id.
- [UserOptionsApiInterface::deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface/deleteUserOptionsById.md) &ndash; Deletes the userOptions identified by the given id.





Location
=============
Ling\Light_UserDatabase\Api\UserOptionsApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\UserOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/UserOptionsApiInterface.php)



SeeAlso
==============
Previous class: [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserHasPermissionGroupApiInterface.md)<br>Next class: [BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md)<br>
