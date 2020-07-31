[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PluginOptionApiInterface class
================
2019-07-19 --> 2020-07-21






Introduction
============

The PluginOptionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PluginOptionApiInterface</span>  {

- Methods
    - abstract public [insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [insertPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOptions.md)(array $pluginOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptions.md)($where, ?array $markers = []) : array
    - abstract public [getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [getPluginOptionsByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsByUserGroupId.md)(string $userGroupId) : array
    - abstract public [getPluginOptionsByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsByUserGroupName.md)(string $userGroupName) : array
    - abstract public [getPluginOptionIdsByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionIdsByUserGroupId.md)(string $userGroupId) : array
    - abstract public [getPluginOptionIdsByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionIdsByUserGroupName.md)(string $userGroupName) : array
    - abstract public [getPluginOptionNamesByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionNamesByUserGroupId.md)(string $userGroupId) : array
    - abstract public [getPluginOptionNamesByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionNamesByUserGroupName.md)(string $userGroupName) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getAllIds.md)() : array
    - abstract public [updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md)(int $id, array $pluginOption) : void
    - abstract public [delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md)(int $id) : void
    - abstract public [deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionByIds.md)(array $ids) : void

}






Methods
==============

- [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOption.md) &ndash; Inserts the given pluginOption in the database.
- [PluginOptionApiInterface::insertPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOptions.md) &ndash; Inserts the given pluginOption rows in the database.
- [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionById.md) &ndash; Returns the pluginOption row identified by the given id.
- [PluginOptionApiInterface::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOption.md) &ndash; Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptions.md) &ndash; Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumns.md) &ndash; Returns a subset of the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsKey2Value.md) &ndash; Returns an array of $key => $value from the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsByUserGroupId.md) &ndash; Returns the rows of the lud_plugin_option table bound to the given user_group id.
- [PluginOptionApiInterface::getPluginOptionsByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsByUserGroupName.md) &ndash; Returns the rows of the lud_plugin_option table bound to the given user_group name.
- [PluginOptionApiInterface::getPluginOptionIdsByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionIdsByUserGroupId.md) &ndash; Returns an array of lud_plugin_option.id bound to the given user_group id.
- [PluginOptionApiInterface::getPluginOptionIdsByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionIdsByUserGroupName.md) &ndash; Returns an array of lud_plugin_option.id bound to the given user_group name.
- [PluginOptionApiInterface::getPluginOptionNamesByUserGroupId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionNamesByUserGroupId.md) &ndash; Returns an array of lud_plugin_option.name bound to the given user_group id.
- [PluginOptionApiInterface::getPluginOptionNamesByUserGroupName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionNamesByUserGroupName.md) &ndash; Returns an array of lud_plugin_option.name bound to the given user_group name.
- [PluginOptionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [PluginOptionApiInterface::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md) &ndash; Updates the pluginOption row identified by the given id.
- [PluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/delete.md) &ndash; Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.
- [PluginOptionApiInterface::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md) &ndash; Deletes the pluginOption identified by the given id.
- [PluginOptionApiInterface::deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionByIds.md) &ndash; Deletes the pluginOption rows identified by the given ids.





Location
=============
Ling\Light_UserDatabase\Api\Generated\Interfaces\PluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Generated\Interfaces\PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.md)<br>Next class: [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/UserApiInterface.md)<br>
