[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md)


PluginOptionApiInterface::deletePluginOptionsByPluginName
================



PluginOptionApiInterface::deletePluginOptionsByPluginName — Deletes all the plugin options which belongs to the given pluginName.




Description
================


abstract public [PluginOptionApiInterface::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionsByPluginName.md)(string $pluginName) : void




Deletes all the plugin options which belongs to the given pluginName.

Note: remember that the category column's notation is: pluginName.categoryName.
See the [Light_UserDatabase conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- pluginName

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [PluginOptionApiInterface::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PluginOptionApiInterface.php#L126-L126)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md) class.

Previous method: [deletePluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/deletePluginOptionById.md)<br>Next method: [getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getOptionByCategoryAndUserId.md)<br>

