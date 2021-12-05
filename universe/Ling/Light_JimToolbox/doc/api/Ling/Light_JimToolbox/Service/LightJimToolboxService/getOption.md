[Back to the Ling/Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md)<br>
[Back to the Ling\Light_JimToolbox\Service\LightJimToolboxService class](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService.md)


LightJimToolboxService::getOption
================



LightJimToolboxService::getOption — Returns the option value corresponding to the given key.




Description
================


public [LightJimToolboxService::getOption](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void




Returns the option value corresponding to the given key.
If the option is not found, the return depends on the throwEx flag:

- if set to true, an exception is thrown
- if set to false, the default value is returned




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
See the source code for method [LightJimToolboxService::getOption](https://github.com/lingtalfi/Light_JimToolbox/blob/master/Service/LightJimToolboxService.php#L85-L94)


See Also
================

The [LightJimToolboxService](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService.md) class.

Previous method: [setOptions](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/setOptions.md)<br>Next method: [getJimToolboxItems](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox/Service/LightJimToolboxService/getJimToolboxItems.md)<br>

