Ling/Light_SimpleHttpServer
================
2020-10-30 --> 2021-03-05




Table of contents
===========

- [LightSimpleHttpServerController](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController.md) &ndash; The LightSimpleHttpServerController class.
    - [LightSimpleHttpServerController::render](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Controller/LightSimpleHttpServerController/render.md) &ndash; Renders the page requested by the given request, and returns the appropriate response.
    - LightController::__construct &ndash; Builds the LightController instance.
    - LightController::setLight &ndash; Sets the light instance.
- [LightSimpleHttpServerException](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException.md) &ndash; The LightSimpleHttpServerException class.
    - [LightSimpleHttpServerException::__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/__construct.md) &ndash; Builds the LightException instance.
    - [LightSimpleHttpServerException::getHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/getHttpStatusCode.md) &ndash; Returns the httpStatusCode of this instance.
    - [LightSimpleHttpServerException::setHttpStatusCode](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Exception/LightSimpleHttpServerException/setHttpStatusCode.md) &ndash; Sets the httpStatusCode.
- [LightSimpleHttpServerService](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService.md) &ndash; The LightSimpleHttpServerService class.
    - [LightSimpleHttpServerService::__construct](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/__construct.md) &ndash; Builds the LightServerService instance.
    - [LightSimpleHttpServerService::setContainer](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setContainer.md) &ndash; Sets the container.
    - [LightSimpleHttpServerService::setOptions](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/setOptions.md) &ndash; Sets the options.
    - [LightSimpleHttpServerService::getNotLoggedHttpStatusCodes](https://github.com/lingtalfi/Light_SimpleHttpServer/blob/master/doc/api/Ling/Light_SimpleHttpServer/Service/LightSimpleHttpServerService/getNotLoggedHttpStatusCodes.md) &ndash; Returns the list of https status codes for which we don't want to log.


Dependencies
============
- [ExceptionCodes](https://github.com/lingtalfi/ExceptionCodes)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)


