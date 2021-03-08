[Back to the Ling/Light_Vars api](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars.md)<br>
[Back to the Ling\Light_Vars\Service\LightVarsService class](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService.md)


LightVarsService::resolveContainerNotation
================



LightVarsService::resolveContainerNotation — Resolves the container variables in the given string, if they are written in container notation.




Description
================


public [LightVarsService::resolveContainerNotation](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/resolveContainerNotation.md)(string $str) : string




Resolves the container variables in the given string, if they are written in container notation.

The container notation is like ${this}:

- a dollar symbol followed by an opening curly bracket
- the dot path to the variable to resolve (using the [bdot notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md))
- a closing bracket




Parameters
================


- str

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightVarsService::resolveContainerNotation](https://github.com/lingtalfi/Light_Vars/blob/master/Service/LightVarsService.php#L91-L99)


See Also
================

The [LightVarsService](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService.md) class.

Previous method: [getVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/getVar.md)<br>

