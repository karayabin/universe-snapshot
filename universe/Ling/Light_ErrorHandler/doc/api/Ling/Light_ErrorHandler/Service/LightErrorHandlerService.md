[Back to the Ling/Light_ErrorHandler api](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler.md)



The LightErrorHandlerService class
================
2020-06-01 --> 2021-03-05






Introduction
============

The LightErrorHandlerService class.


https://www.php.net/manual/en/errorfunc.constants.php



Class synopsis
==============


class <span class="pl-k">LightErrorHandlerService</span>  {

- Properties
    - private bool [$functionsRegistered](#property-functionsRegistered) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/setOptions.md)(array $options) : void
    - public [getOptions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/getOptions.md)() : array
    - public [registerFunctions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/registerFunctions.md)() : void
    - public [fatalErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/fatalErrorHandler.md)() : void
    - public [errorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/errorHandler.md)(int $errno, string $errstr, string $errfile, int $errline) : bool
    - private [sendError](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/sendError.md)(array $phpError, ?string $channel = null) : void

}




Properties
=============

- <span id="property-functionsRegistered"><b>functionsRegistered</b></span>

    Internal flat to know whether the error handling functions are already registered.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    The options are:
    
    - handleFatalErrors: bool=true, whether to handle fatal errors
    - handleErrors: bool=true, whether to handle regular php errors (i.e. not fatal errors)
    
    



Methods
==============

- [LightErrorHandlerService::__construct](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/__construct.md) &ndash; Builds the LightErrorHandlerService instance.
- [LightErrorHandlerService::setContainer](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/setContainer.md) &ndash; Sets the container.
- [LightErrorHandlerService::setOptions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/setOptions.md) &ndash; Sets the options.
- [LightErrorHandlerService::getOptions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/getOptions.md) &ndash; Returns the options of this instance.
- [LightErrorHandlerService::registerFunctions](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/registerFunctions.md) &ndash; Registers the error handling functions based on the service configuration.
- [LightErrorHandlerService::fatalErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/fatalErrorHandler.md) &ndash; The fatal handler method for this service.
- [LightErrorHandlerService::errorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/errorHandler.md) &ndash; The error handler function.
- [LightErrorHandlerService::sendError](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/sendError.md) &ndash; Sends the given phpError to the error_handler channel of the Light_Logger.





Location
=============
Ling\Light_ErrorHandler\Service\LightErrorHandlerService<br>
See the source code of [Ling\Light_ErrorHandler\Service\LightErrorHandlerService](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/Service/LightErrorHandlerService.php)



SeeAlso
==============
Previous class: [LightLoggerErrorHandlerListener](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Light_Logger/LightLoggerErrorHandlerListener.md)<br>
