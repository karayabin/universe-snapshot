[Back to the Ling/Light_LingStandardService api](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService.md)



The LightLingStandardService02 class
================
2020-07-28 --> 2021-01-29






Introduction
============

The LightLingStandardService02 class.



Class synopsis
==============


abstract class <span class="pl-k">LightLingStandardService02</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - private string [$_exceptionClassName](#property-_exceptionClassName) ;
    - private string [$_serviceName](#property-_serviceName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/setOptions.md)(array $options) : void
    - public [logDebug](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/logDebug.md)($msg) : void
    - protected [error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/error.md)(string $msg) : void
    - private [prepareNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/prepareNames.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    Available options are:
    - useDebug: bool, whether to enable the debug log (more about that in https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)
    
    

- <span id="property-_exceptionClassName"><b>_exceptionClassName</b></span>

    Cache for exception class name.
    This is only available after a call to the prepareNames method.
    
    

- <span id="property-_serviceName"><b>_serviceName</b></span>

    Cache for service name.
    This is only available after a call to the prepareNames method.
    
    



Methods
==============

- [LightLingStandardService02::__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/__construct.md) &ndash; Builds the LightLingStandardService01 instance.
- [LightLingStandardService02::setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/setContainer.md) &ndash; Sets the container.
- [LightLingStandardService02::setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/setOptions.md) &ndash; Sets the options.
- [LightLingStandardService02::logDebug](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/logDebug.md) &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- [LightLingStandardService02::error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/error.md) &ndash; Throws an exception.
- [LightLingStandardService02::prepareNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02/prepareNames.md) &ndash; Prepare names used by this class.





Location
=============
Ling\Light_LingStandardService\Service\LightLingStandardService02<br>
See the source code of [Ling\Light_LingStandardService\Service\LightLingStandardService02](https://github.com/lingtalfi/Light_LingStandardService/blob/master/Service/LightLingStandardService02.php)



SeeAlso
==============
Previous class: [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md)<br>
