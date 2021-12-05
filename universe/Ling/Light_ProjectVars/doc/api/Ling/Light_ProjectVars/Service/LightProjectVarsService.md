[Back to the Ling/Light_ProjectVars api](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars.md)



The LightProjectVarsService class
================
2021-06-11 --> 2021-06-28






Introduction
============

The LightProjectVarsService class.



Class synopsis
==============


class <span class="pl-k">LightProjectVarsService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private array [$variables](#property-variables) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getVariables](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/getVariables.md)() : array
    - public [setVariables](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/setVariables.md)(array $variables) : void
    - public [getVariable](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/getVariable.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed
    - private [error](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-variables"><b>variables</b></span>

    This property holds the variables for this instance.
    
    



Methods
==============

- [LightProjectVarsService::__construct](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/__construct.md) &ndash; Builds the LightProjectVarsService instance.
- [LightProjectVarsService::setContainer](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/setContainer.md) &ndash; Sets the container.
- [LightProjectVarsService::getVariables](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/getVariables.md) &ndash; Returns the variables of this instance.
- [LightProjectVarsService::setVariables](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/setVariables.md) &ndash; Sets the variables.
- [LightProjectVarsService::getVariable](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/getVariable.md) &ndash; Returns the value associated with the given key.
- [LightProjectVarsService::error](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Service/LightProjectVarsService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_ProjectVars\Service\LightProjectVarsService<br>
See the source code of [Ling\Light_ProjectVars\Service\LightProjectVarsService](https://github.com/lingtalfi/Light_ProjectVars/blob/master/Service/LightProjectVarsService.php)



SeeAlso
==============
Previous class: [LightProjectVarsException](https://github.com/lingtalfi/Light_ProjectVars/blob/master/doc/api/Ling/Light_ProjectVars/Exception/LightProjectVarsException.md)<br>
