[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlUserOptionsApi class
================
2019-07-19 --> 2019-12-17






Introduction
============

The MysqlUserOptionsApi class.



Class synopsis
==============


class <span class="pl-k">MysqlUserOptionsApi</span> implements [UserOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserOptionsApiInterface.md) {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/__construct.md)() : void
    - public [insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/insertUserOptions.md)(array $userOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/getUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/updateUserOptionsById.md)(int $id, array $userOptions) : void
    - public [deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/deleteUserOptionsById.md)(int $id) : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - protected [doInsertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doInsertUserOptions.md)(array $userOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - protected [doGetUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doGetUserOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - protected [doUpdateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doUpdateUserOptionsById.md)(int $id, array $userOptions) : void
    - protected [doDeleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doDeleteUserOptionsById.md)(int $id) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    



Methods
==============

- [MysqlUserOptionsApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/__construct.md) &ndash; Builds the UserOptionsApi instance.
- [MysqlUserOptionsApi::insertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/insertUserOptions.md) &ndash; Inserts the given userOptions in the database.
- [MysqlUserOptionsApi::getUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/getUserOptionsById.md) &ndash; Returns the userOptions row identified by the given id.
- [MysqlUserOptionsApi::updateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/updateUserOptionsById.md) &ndash; Updates the userOptions row identified by the given id.
- [MysqlUserOptionsApi::deleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/deleteUserOptionsById.md) &ndash; Deletes the userOptions identified by the given id.
- [MysqlUserOptionsApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlUserOptionsApi::doInsertUserOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doInsertUserOptions.md) &ndash; The working horse behind the insertUserOptions method.
- [MysqlUserOptionsApi::doGetUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doGetUserOptionsById.md) &ndash; The working horse behind the getUserOptionsById method.
- [MysqlUserOptionsApi::doUpdateUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doUpdateUserOptionsById.md) &ndash; The working horse behind the updateUserOptionsById method.
- [MysqlUserOptionsApi::doDeleteUserOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserOptionsApi/doDeleteUserOptionsById.md) &ndash; The working horse behind the deleteUserOptionsById method.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlUserOptionsApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlUserOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserOptionsApi.php)



SeeAlso
==============
Previous class: [MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md)<br>Next class: [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface.md)<br>
