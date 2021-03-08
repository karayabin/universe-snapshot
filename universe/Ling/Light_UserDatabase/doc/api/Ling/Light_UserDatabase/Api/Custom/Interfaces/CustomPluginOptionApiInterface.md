[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The CustomPluginOptionApiInterface class
================
2019-07-19 --> 2021-03-05






Introduction
============

The CustomPluginOptionApiInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">CustomPluginOptionApiInterface</span> implements [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface.md) {

- Methods
    - abstract public [deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface/deletePluginOptionsByPluginName.md)(string $pluginName) : void
    - abstract public [getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface/getOptionByCategoryAndUserId.md)(string $category, int $userId) : array

- Inherited methods
    - abstract public [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PluginOptionApiInterface::insertPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOptions.md)(array $pluginOptions, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [PluginOptionApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/fetchAll.md)(?array $components = []) : array
    - abstract public [PluginOptionApiInterface::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/fetch.md)(?array $components = []) : array
    - abstract public [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PluginOptionApiInterface::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [PluginOptionApiInterface::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptions.md)($where, ?array $markers = []) : array
    - abstract public [PluginOptionApiInterface::getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumn.md)(string $column, $where, ?array $markers = []) : array
    - abstract public [PluginOptionApiInterface::getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumns.md)($columns, $where, ?array $markers = []) : array
    - abstract public [PluginOptionApiInterface::getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsKey2Value.md)(string $key, string $value, $where, ?array $markers = []) : array
    - abstract public [PluginOptionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getAllIds.md)() : array
    - abstract public [PluginOptionApiInterface::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md)(int $id, array $pluginOption, ?array $extraWhere = [], ?array $markers = []) : void
    - abstract public [PluginOptionApiInterface::updatePluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOption.md)(array $pluginOption, ?$where = null, ?array $markers = []) : void
    - abstract public [PluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int
    - abstract public [PluginOptionApiInterface::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md)(int $id) : void
    - abstract public [PluginOptionApiInterface::deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionByIds.md)(array $ids) : void

}






Methods
==============

- [CustomPluginOptionApiInterface::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface/deletePluginOptionsByPluginName.md) &ndash; Deletes all the plugin options which belongs to the given pluginName.
- [CustomPluginOptionApiInterface::getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface/getOptionByCategoryAndUserId.md) &ndash; Returns the plugin option row identified by the given category and the user id.
- [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOption.md) &ndash; Inserts the given plugin option in the database.
- [PluginOptionApiInterface::insertPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/insertPluginOptions.md) &ndash; Inserts the given plugin option rows in the database.
- [PluginOptionApiInterface::fetchAll](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/fetchAll.md) &ndash; Returns the rows corresponding to given components.
- [PluginOptionApiInterface::fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/fetch.md) &ndash; Returns the first row corresponding to given components, or false if there is no match.
- [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionById.md) &ndash; Returns the plugin option row identified by the given id.
- [PluginOptionApiInterface::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOption.md) &ndash; Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptions.md) &ndash; Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsColumn](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumn.md) &ndash; identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsColumns](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsColumns.md) &ndash; Returns a subset of the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptionsKey2Value](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getPluginOptionsKey2Value.md) &ndash; Returns an array of $key => $value from the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [PluginOptionApiInterface::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md) &ndash; Updates the plugin option row identified by the given id.
- [PluginOptionApiInterface::updatePluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/updatePluginOption.md) &ndash; Updates the plugin option row.
- [PluginOptionApiInterface::delete](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/delete.md) &ndash; Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.
- [PluginOptionApiInterface::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md) &ndash; Deletes the plugin option identified by the given id.
- [PluginOptionApiInterface::deletePluginOptionByIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PluginOptionApiInterface/deletePluginOptionByIds.md) &ndash; Deletes the plugin option rows identified by the given ids.





Location
=============
Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Custom/Interfaces/CustomPluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md)<br>Next class: [CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface.md)<br>
