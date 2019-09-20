[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlUserHasPermissionGroupApi class
================
2019-07-19 --> 2019-09-18






Introduction
============

The MysqlUserHasPermissionGroupApi class.



Class synopsis
==============


class <span class="pl-k">MysqlUserHasPermissionGroupApi</span> implements [UserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserHasPermissionGroupApiInterface.md) {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/__construct.md)() : void
    - public [insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/insertUserHasPermissionGroup.md)(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false) : mixed
    - public [getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false) : mixed
    - public [updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id, array $userHasPermissionGroup) : void
    - public [deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md)(int $user_id, int $permission_group_id) : void
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    



Methods
==============

- [MysqlUserHasPermissionGroupApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/__construct.md) &ndash; Builds the UserHasPermissionGroupApi instance.
- [MysqlUserHasPermissionGroupApi::insertUserHasPermissionGroup](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/insertUserHasPermissionGroup.md) &ndash; Inserts the given userHasPermissionGroup in the database.
- [MysqlUserHasPermissionGroupApi::getUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/getUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [MysqlUserHasPermissionGroupApi::updateUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/updateUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Updates the userHasPermissionGroup row identified by the given user_id and permission_group_id.
- [MysqlUserHasPermissionGroupApi::deleteUserHasPermissionGroupByUserIdAndPermissionGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/deleteUserHasPermissionGroupByUserIdAndPermissionGroupId.md) &ndash; Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
- [MysqlUserHasPermissionGroupApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlUserHasPermissionGroupApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserHasPermissionGroupApi.php)



SeeAlso
==============
Previous class: [MysqlPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlPermissionGroupHasPermissionApi.md)<br>Next class: [PermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionApiInterface.md)<br>
