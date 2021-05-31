[Back to the Ling/Light_Nugget api](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget.md)



The LightNuggetService class
================
2020-08-21 --> 2021-05-31






Introduction
============

The LightNuggetService class.



Class synopsis
==============


class <span class="pl-k">LightNuggetService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getNuggetByPath](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md)(string $path, ?array $options = []) : array
    - public [getNugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNugget.md)(string $nuggetId, string $relPath, ?array $options = []) : array
    - public [getNuggetDirective](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetDirective.md)(string $nuggetDirectiveId, string $relPath, ?array $options = []) : void
    - public [checkSecurity](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/checkSecurity.md)(array $nugget, ?array $params = []) : void
    - public [resolveVariables](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/resolveVariables.md)(array &$nugget, ?string $key = null) : void
    - private [error](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightNuggetService::__construct](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/__construct.md) &ndash; Builds the LightNuggetService instance.
- [LightNuggetService::setContainer](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/setContainer.md) &ndash; Sets the container.
- [LightNuggetService::getNuggetByPath](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md) &ndash; Returns the nugget configuration from its path.
- [LightNuggetService::getNugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNugget.md) &ndash; Returns the output of the [getNuggetByPath method](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md).
- [LightNuggetService::getNuggetDirective](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetDirective.md) &ndash; Returns the value of the directive identified by the given nuggetDirectiveId and relPath.
- [LightNuggetService::checkSecurity](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/checkSecurity.md) &ndash; Check that the user is granted the permission to execute an action, and throws an exception if that's not the case.
- [LightNuggetService::resolveVariables](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/resolveVariables.md) &ndash; Resolve the variables in place in the given nugget.
- [LightNuggetService::error](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Nugget\Service\LightNuggetService<br>
See the source code of [Ling\Light_Nugget\Service\LightNuggetService](https://github.com/lingtalfi/Light_Nugget/blob/master/Service/LightNuggetService.php)



SeeAlso
==============
Previous class: [LightNuggetSecurityHandlerInterface](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/SecurityHandler/LightNuggetSecurityHandlerInterface.md)<br>
