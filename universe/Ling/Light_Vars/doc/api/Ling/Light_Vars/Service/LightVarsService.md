[Back to the Ling/Light_Vars api](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars.md)



The LightVarsService class
================
2021-02-25 --> 2021-03-05






Introduction
============

The LightVarsService class.



Class synopsis
==============


class <span class="pl-k">LightVarsService</span>  {

- Properties
    - private array [$vars](#property-vars) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/__construct.md)() : void
    - public [setVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/setVar.md)(string $dotKey, mixed $value) : void
    - public [getVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/getVar.md)(string $dotKey, ?$default = null, ?bool $throwEx = false) : mixed
    - public [resolveContainerNotation](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/resolveContainerNotation.md)(string $str) : string

}




Properties
=============

- <span id="property-vars"><b>vars</b></span>

    This property holds the vars for this instance.
    
    



Methods
==============

- [LightVarsService::__construct](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/__construct.md) &ndash; Builds the LightVarsService instance.
- [LightVarsService::setVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/setVar.md) &ndash; Sets a value in the container.
- [LightVarsService::getVar](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/getVar.md) &ndash; Returns the variable value associated to the given key.
- [LightVarsService::resolveContainerNotation](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Service/LightVarsService/resolveContainerNotation.md) &ndash; Resolves the container variables in the given string, if they are written in container notation.





Location
=============
Ling\Light_Vars\Service\LightVarsService<br>
See the source code of [Ling\Light_Vars\Service\LightVarsService](https://github.com/lingtalfi/Light_Vars/blob/master/Service/LightVarsService.php)



SeeAlso
==============
Previous class: [LightVarsException](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars/Exception/LightVarsException.md)<br>
