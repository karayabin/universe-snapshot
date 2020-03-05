[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md)


PluginOptionApiInterface::getPluginOptionIdByName
================



PluginOptionApiInterface::getPluginOptionIdByName — Returns the pluginOption id identified by the given name.




Description
================


abstract public [PluginOptionApiInterface::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the pluginOption id identified by the given name.

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

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PluginOptionApiInterface::getPluginOptionIdByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PluginOptionApiInterface.php#L140-L140)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md) class.

Previous method: [deletePluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/deletePluginOptionByName.md)<br>

