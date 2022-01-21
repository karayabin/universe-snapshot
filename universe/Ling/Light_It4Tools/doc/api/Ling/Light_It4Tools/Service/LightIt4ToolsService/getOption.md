[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Service\LightIt4ToolsService class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md)


LightIt4ToolsService::getOption
================



LightIt4ToolsService::getOption — Returns the option value corresponding to the given key.




Description
================


public [LightIt4ToolsService::getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void




Returns the option value corresponding to the given key.

If the option is not found, the return depends on the throwEx flag:

- if set to true, an exception is thrown
- if set to false, the default value is returned

The key uses the bdot format (https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md).




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightIt4ToolsService::getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/Service/LightIt4ToolsService.php#L96-L108)


See Also
================

The [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) class.

Previous method: [getOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOptions.md)<br>Next method: [getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md)<br>

