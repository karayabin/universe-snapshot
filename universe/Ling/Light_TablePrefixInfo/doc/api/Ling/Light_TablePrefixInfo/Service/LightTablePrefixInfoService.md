[Back to the Ling/Light_TablePrefixInfo api](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo.md)



The LightTablePrefixInfoService class
================
2020-12-01 --> 2021-03-15






Introduction
============

The LightTablePrefixInfoService class.



Class synopsis
==============


class <span class="pl-k">LightTablePrefixInfoService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected array [$prefixInfo](#property-prefixInfo) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/setOptions.md)(array $options) : void
    - public [registerPrefixInfo](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/registerPrefixInfo.md)(string $prefix, array $prefixInfo) : void
    - public [getPrefixInfo](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/getPrefixInfo.md)(string $prefix) : array | null
    - private [error](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_TablePrefixInfo conception notes](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-prefixInfo"><b>prefixInfo</b></span>

    This property holds the prefixInfo for this instance.
    
    



Methods
==============

- [LightTablePrefixInfoService::__construct](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/__construct.md) &ndash; Builds the LightTablePrefixInfoService instance.
- [LightTablePrefixInfoService::setContainer](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/setContainer.md) &ndash; Sets the container.
- [LightTablePrefixInfoService::setOptions](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/setOptions.md) &ndash; Sets the options.
- [LightTablePrefixInfoService::registerPrefixInfo](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/registerPrefixInfo.md) &ndash; Registers the information for the $prefix.
- [LightTablePrefixInfoService::getPrefixInfo](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/getPrefixInfo.md) &ndash; Returns the prefix information attached to the given $prefix.
- [LightTablePrefixInfoService::error](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Service/LightTablePrefixInfoService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_TablePrefixInfo\Service\LightTablePrefixInfoService<br>
See the source code of [Ling\Light_TablePrefixInfo\Service\LightTablePrefixInfoService](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/Service/LightTablePrefixInfoService.php)



SeeAlso
==============
Previous class: [LightTablePrefixInfoException](https://github.com/lingtalfi/Light_TablePrefixInfo/blob/master/doc/api/Ling/Light_TablePrefixInfo/Exception/LightTablePrefixInfoException.md)<br>
