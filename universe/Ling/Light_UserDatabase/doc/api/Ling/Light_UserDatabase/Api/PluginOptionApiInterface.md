[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The PluginOptionApiInterface class
================
2019-07-19 --> 2020-01-31






Introduction
============

The PluginOptionApiInterface interface.
It implements the [ling standard object methods](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-standard-object-methods.md) concept.



Class synopsis
==============


abstract class <span class="pl-k">PluginOptionApiInterface</span>  {

- Methods
    - abstract public [insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/insertPluginOption.md)(array $pluginOption, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getAllIds.md)() : array
    - abstract public [updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/updatePluginOptionById.md)(int $id, array $pluginOption) : void
    - abstract public [updatePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/updatePluginOptionByName.md)(string $name, array $pluginOption) : void
    - abstract public [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/deletePluginOptionById.md)(int $id) : void
    - abstract public [deletePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/deletePluginOptionByName.md)(string $name) : void
    - abstract public [getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed

}






Methods
==============

- [PluginOptionApiInterface::insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/insertPluginOption.md) &ndash; Inserts the given pluginOption in the database.
- [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionById.md) &ndash; Returns the pluginOption row identified by the given id.
- [PluginOptionApiInterface::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionByName.md) &ndash; Returns the pluginOption row identified by the given name.
- [PluginOptionApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getAllIds.md) &ndash; Returns an array of all pluginOption ids.
- [PluginOptionApiInterface::updatePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/updatePluginOptionById.md) &ndash; Updates the pluginOption row identified by the given id.
- [PluginOptionApiInterface::updatePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/updatePluginOptionByName.md) &ndash; Updates the pluginOption row identified by the given name.
- [PluginOptionApiInterface::deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/deletePluginOptionById.md) &ndash; Deletes the pluginOption identified by the given id.
- [PluginOptionApiInterface::deletePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/deletePluginOptionByName.md) &ndash; Deletes the pluginOption identified by the given name.
- [PluginOptionApiInterface::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionIdByName.md) &ndash; Returns the pluginOption id identified by the given name.





Location
=============
Ling\Light_UserDatabase\Api\PluginOptionApiInterface<br>
See the source code of [Ling\Light_UserDatabase\Api\PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PluginOptionApiInterface.php)



SeeAlso
==============
Previous class: [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PermissionGroupHasPermissionApiInterface.md)<br>Next class: [UserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/UserGroupApiInterface.md)<br>
