[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md)


PluginOptionApiInterface::getPluginOptionById
================



PluginOptionApiInterface::getPluginOptionById — Returns the pluginOption row identified by the given id.




Description
================


abstract public [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the pluginOption row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [PluginOptionApiInterface::getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/PluginOptionApiInterface.php#L50-L50)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface.md) class.

Previous method: [insertPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/insertPluginOption.md)<br>Next method: [getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/PluginOptionApiInterface/getPluginOptionByName.md)<br>

