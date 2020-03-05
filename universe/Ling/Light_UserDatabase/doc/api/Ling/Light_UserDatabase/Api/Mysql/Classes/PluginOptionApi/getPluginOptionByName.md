[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Mysql\Classes\PluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PluginOptionApi.md)


PluginOptionApi::getPluginOptionByName
================



PluginOptionApi::getPluginOptionByName — Returns the pluginOption row identified by the given name.




Description
================


public [PluginOptionApi::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PluginOptionApi/getPluginOptionByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [PluginOptionApi::getPluginOptionByName](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Mysql/Classes/PluginOptionApi.php#L96-L110)


See Also
================

The [PluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PluginOptionApi.md) class.

Previous method: [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PluginOptionApi/getPluginOptionById.md)<br>Next method: [getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Mysql/Classes/PluginOptionApi/getPluginOption.md)<br>

