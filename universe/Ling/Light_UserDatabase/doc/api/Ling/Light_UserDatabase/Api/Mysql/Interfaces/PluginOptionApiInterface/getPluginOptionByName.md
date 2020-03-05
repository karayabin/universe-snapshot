[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Interfaces\PluginOptionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md)


PluginOptionApiInterface::getPluginOptionByName
================



PluginOptionApiInterface::getPluginOptionByName — Returns the pluginOption row identified by the given name.




Description
================


abstract public [PluginOptionApiInterface::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the pluginOption row identified by the given name.

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
See the source code for method [PluginOptionApiInterface::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Interfaces/PluginOptionApiInterface.php#L66-L66)


See Also
================

The [PluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface.md) class.

Previous method: [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOptionById.md)<br>Next method: [getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Interfaces/PluginOptionApiInterface/getPluginOption.md)<br>

