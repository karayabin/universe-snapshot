[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlPermissionOptionsApi class
================
2019-07-19 --> 2019-12-17






Introduction
============

The MysqlPermissionOptionsApi class.



Class synopsis
==============


class <span class="pl-k">MysqlPermissionOptionsApi</span> implements [PermissionOptionsApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionOptionsApiInterface.md) {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/__construct.md)() : void
    - public [insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/insertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/getPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/updatePermissionOptionsById.md)(int $id, array $permissionOptions) : void
    - public [deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/deletePermissionOptionsById.md)(int $id) : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - protected [doInsertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doInsertPermissionOptions.md)(array $permissionOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - protected [doGetPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doGetPermissionOptionsById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - protected [doUpdatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doUpdatePermissionOptionsById.md)(int $id, array $permissionOptions) : void
    - protected [doDeletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doDeletePermissionOptionsById.md)(int $id) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    



Methods
==============

- [MysqlPermissionOptionsApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/__construct.md) &ndash; Builds the PermissionOptionsApi instance.
- [MysqlPermissionOptionsApi::insertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/insertPermissionOptions.md) &ndash; Inserts the given permissionOptions in the database.
- [MysqlPermissionOptionsApi::getPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/getPermissionOptionsById.md) &ndash; Returns the permissionOptions row identified by the given id.
- [MysqlPermissionOptionsApi::updatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/updatePermissionOptionsById.md) &ndash; Updates the permissionOptions row identified by the given id.
- [MysqlPermissionOptionsApi::deletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/deletePermissionOptionsById.md) &ndash; Deletes the permissionOptions identified by the given id.
- [MysqlPermissionOptionsApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlPermissionOptionsApi::doInsertPermissionOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doInsertPermissionOptions.md) &ndash; The working horse behind the insertPermissionOptions method.
- [MysqlPermissionOptionsApi::doGetPermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doGetPermissionOptionsById.md) &ndash; The working horse behind the getPermissionOptionsById method.
- [MysqlPermissionOptionsApi::doUpdatePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doUpdatePermissionOptionsById.md) &ndash; The working horse behind the updatePermissionOptionsById method.
- [MysqlPermissionOptionsApi::doDeletePermissionOptionsById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionOptionsApi/doDeletePermissionOptionsById.md) &ndash; The working horse behind the deletePermissionOptionsById method.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionOptionsApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlPermissionOptionsApi.php)



SeeAlso
==============
Previous class: [MysqlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupHasPermissionApi.md)<br>Next class: [MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md)<br>
