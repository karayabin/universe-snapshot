[Back to the Ling/Light_HttpError api](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError.md)



The LightHttpErrorService class
================
2020-10-30 --> 2020-10-30






Introduction
============

The LightHttpErrorService class.


Note: this class is void for now, I just keep the service class and service config file so that
Light_HttpError is listed as a service when some other plugins want to make the list of all available services
in your light app.



Class synopsis
==============


class <span class="pl-k">LightHttpErrorService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/setOptions.md)(array $options) : void
    - public [getNotLoggedHttpStatusCodes](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/getNotLoggedHttpStatusCodes.md)() : array
    - private [error](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - do_not_log_codes: array of http status codes which should not be sent to the log.
    
    
    
    See the [Light_HttpError conception notes](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightHttpErrorService::__construct](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/__construct.md) &ndash; Builds the LightServerService instance.
- [LightHttpErrorService::setContainer](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/setContainer.md) &ndash; Sets the container.
- [LightHttpErrorService::setOptions](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/setOptions.md) &ndash; Sets the options.
- [LightHttpErrorService::getNotLoggedHttpStatusCodes](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/getNotLoggedHttpStatusCodes.md) &ndash; Returns the list of https status codes for which we don't want to log.
- [LightHttpErrorService::error](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Service/LightHttpErrorService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_HttpError\Service\LightHttpErrorService<br>
See the source code of [Ling\Light_HttpError\Service\LightHttpErrorService](https://github.com/lingtalfi/Light_HttpError/blob/master/Service/LightHttpErrorService.php)



SeeAlso
==============
Previous class: [LightHttpErrorException](https://github.com/lingtalfi/Light_HttpError/blob/master/doc/api/Ling/Light_HttpError/Exception/LightHttpErrorException.md)<br>
