[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PluginOptionApiInterface class
================
2019-07-19 --> 2020-02-07






Introduction
============

The PluginOptionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PluginOptionApiInterface</span>  {

- Methods
    - abstract public [insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptions.md)($where, ?array $markers = []) : array
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getAllIds.md)() : array
    - abstract public [updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md)(int $id, array $pluginOption) : void
    - abstract public [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md)(int $id) : void
    - abstract public [deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionsByPluginName.md)(string $pluginName) : void
    - abstract public [getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getOptionByCategoryAndUserId.md)(string $category, int $userId) : array

}






Methods
==============

- [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/insertPluginOption.md) &ndash; Inserts the given pluginOption in the database.
- [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptionById.md) &ndash; Returns the pluginOption row identified by the given id.
- [PluginOptionApiInterface::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOption.md) &ndash; Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptions.md) &ndash; Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [PluginOptionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [PluginOptionApiInterface::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/updatePluginOptionById.md) &ndash; Updates the pluginOption row identified by the given id.
- [PluginOptionApiInterface::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md) &ndash; Deletes the pluginOption identified by the given id.
- [PluginOptionApiInterface::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionsByPluginName.md) &ndash; Deletes all the plugin options which belongs to the given pluginName.
- [PluginOptionApiInterface::getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getOptionByCategoryAndUserId.md) &ndash; Returns the plugin option row identified by the given category and the user id.





Location
=============
Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PermissionGroupHasPermissionApiInterface.md)<br>Next class: [UserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/UserApiInterface.md)<br>
