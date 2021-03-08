[Back to the Ling/Light_SimpleHttpServer api](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer.md)



The LightSimpleHttpServerService class
================
2020-10-30 --> 2021-03-05






Introduction
============

The LightSimpleHttpServerService class.


Note: this class is void for now, I just keep the service class and service config file so that
Light_SimpleHttpServer is listed as a service when some other plugins want to make the list of all available services
in your light app.



Class synopsis
==============


class <span class="pl-k">LightSimpleHttpServerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setOptions.md)(array $options) : void
    - public [getNotLoggedHttpStatusCodes](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/getNotLoggedHttpStatusCodes.md)() : array
    - private [error](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - do_not_log_codes: array of http status codes which should not be sent to the log.
    
    
    
    See the [Light_SimpleHttpServer conception notes](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightSimpleHttpServerService::__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/__construct.md) &ndash; Builds the LightServerService instance.
- [LightSimpleHttpServerService::setContainer](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setContainer.md) &ndash; Sets the container.
- [LightSimpleHttpServerService::setOptions](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setOptions.md) &ndash; Sets the options.
- [LightSimpleHttpServerService::getNotLoggedHttpStatusCodes](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/getNotLoggedHttpStatusCodes.md) &ndash; Returns the list of https status codes for which we don't want to log.
- [LightSimpleHttpServerService::error](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_SimpleHttpServer\Service\LightSimpleHttpServerService<br>
See the source code of [Ling\Light_SimpleHttpServer\Service\LightSimpleHttpServerService](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/Service/LightSimpleHttpServerService.php)



SeeAlso
==============
Previous class: [LightSimpleHttpServerException](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException.md)<br>
