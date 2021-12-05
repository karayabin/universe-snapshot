[Back to the Ling/Light_Vars api](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars.md)<br>
[Back to the Ling\Light_Vars\Service\LightVarsService class](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService.md)


LightVarsService::getVar
================



LightVarsService::getVar — Returns the variable value associated to the given key.




Description
================


public [LightVarsService::getVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/getVar.md)(string $dotKey, ?$default = null, ?bool $throwEx = false) : mixed




Returns the variable value associated to the given key.

If the value is not found, either:
- the default value is returned if throwEx is false
- an exception is thrown if throwEx is true




Parameters
================


- dotKey

    

- default

    

- throwEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightVarsService::getVar](https://github.com/lingtalfi/Light_Vars/blob/master/Service/LightVarsService.php#L64-L73)


See Also
================

The [LightVarsService](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService.md) class.

Previous method: [setVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/setVar.md)<br>Next method: [getVars](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/getVars.md)<br>

