[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Custom\CustomPluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPluginOptionApi.md)


CustomPluginOptionApi::deletePluginOptionsByPluginName
================



CustomPluginOptionApi::deletePluginOptionsByPluginName — Deletes all the plugin options which belongs to the given pluginName.




Description
================


public [CustomPluginOptionApi::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPluginOptionApi/deletePluginOptionsByPluginName.md)(string $pluginName) : void




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
See the source code for method [CustomPluginOptionApi::deletePluginOptionsByPluginName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Custom/CustomPluginOptionApi.php#L21-L24)


See Also
================

The [CustomPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPluginOptionApi.md) class.

Next method: [getOptionByCategoryAndUserId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Custom/CustomPluginOptionApi/getOptionByCategoryAndUserId.md)<br>

