[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md)


PluginOptionApiInterface::getPluginOptionIdByName
================



PluginOptionApiInterface::getPluginOptionIdByName — Returns the id of the lud_plugin_option table.




Description
================


abstract public [PluginOptionApiInterface::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lud_plugin_option table.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns string | mixed.








Source Code
===========
See the source code for method [PluginOptionApiInterface::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PluginOptionApiInterface.php#L112-L112)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md) class.

Previous method: [getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptions.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getAllIds.md)<br>

