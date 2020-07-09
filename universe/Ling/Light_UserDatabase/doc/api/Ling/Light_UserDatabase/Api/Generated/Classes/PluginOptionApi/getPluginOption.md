[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Classes\PluginOptionApi class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi.md)


PluginOptionApi::getPluginOption
================



PluginOptionApi::getPluginOption — Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [PluginOptionApi::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOption.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [PluginOptionApi::getPluginOption](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Classes/PluginOptionApi.php#L100-L119)


See Also
================

The [PluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi.md) class.

Previous method: [getPluginOptionById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptionById.md)<br>Next method: [getPluginOptions](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Classes/PluginOptionApi/getPluginOptions.md)<br>

