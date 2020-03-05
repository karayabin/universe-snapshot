[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The MysqlUserGroupHasPluginOptionApi class
================
2019-07-19 --> 2020-01-31






Introduction
============

The MysqlUserGroupHasPluginOptionApi class.



Class synopsis
==============


class <span class="pl-k">MysqlUserGroupHasPluginOptionApi</span> extends [MysqlBaseLightUserDatabaseApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi.md) implements [UserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupHasPluginOptionApiInterface.md) {

- Inherited properties
    - protected [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) [MysqlBaseLightUserDatabaseApi::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [MysqlBaseLightUserDatabaseApi::$container](#property-container) ;
    - protected string [MysqlBaseLightUserDatabaseApi::$table](#property-table) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/__construct.md)() : void
    - public [insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md)(array $userGroupHasPluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - public [getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - public [updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption) : void
    - public [deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md)(int $user_group_id, int $plugin_option_id) : void

- Inherited methods
    - public [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md)(string $type) : void

}






Methods
==============

- [MysqlUserGroupHasPluginOptionApi::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/__construct.md) &ndash; Builds the MysqlUserGroupHasPluginOptionApi instance.
- [MysqlUserGroupHasPluginOptionApi::insertUserGroupHasPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/insertUserGroupHasPluginOption.md) &ndash; Inserts the given userGroupHasPluginOption in the database.
- [MysqlUserGroupHasPluginOptionApi::getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [MysqlUserGroupHasPluginOptionApi::updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
- [MysqlUserGroupHasPluginOptionApi::deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupHasPluginOptionApi/deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId.md) &ndash; Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.
- [MysqlBaseLightUserDatabaseApi::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [MysqlBaseLightUserDatabaseApi::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/setContainer.md) &ndash; Sets the container.
- [MysqlBaseLightUserDatabaseApi::checkMicroPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlBaseLightUserDatabaseApi/checkMicroPermission.md) &ndash; Checks whether the current user has the micro permission which type is specified.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\MysqlUserGroupHasPluginOptionApi<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\MysqlUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/MysqlUserGroupHasPluginOptionApi.php)



SeeAlso
==============
Previous class: [MysqlUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserGroupApi.md)<br>Next class: [MysqlUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/MysqlUserHasPermissionGroupApi.md)<br>
