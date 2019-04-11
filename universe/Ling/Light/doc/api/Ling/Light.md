Ling/Light
================
2019-04-09 --> 2019-04-10




Table of contents
===========

- [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) &ndash; The Light class.
    - [Light::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/__construct.md) &ndash; Builds the Light instance.
    - [Light::setDebug](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setDebug.md) &ndash; Sets the debug.
    - [Light::setContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setContainer.md) &ndash; Sets the container.
    - [Light::getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getContainer.md) &ndash; Returns the services container of this instance.
    - [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md) &ndash; The registerRoute method
    - [Light::getRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getRoutes.md) &ndash; Returns the routes of this instance.
    - [Light::registerErrorHandler](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerErrorHandler.md) &ndash; Registers a error handler callback.
    - [Light::run](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/run.md) &ndash; Runs the Light web application.
- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md) &ndash; The LightException class.
    - [LightException::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/__construct.md) &ndash; Builds the LightException instance.
    - [LightException::getLightErrorCode](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException/getLightErrorCode.md) &ndash; Returns the light error code, or null if not set.
- [ConfigurationHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper.md) &ndash; The ConfigurationHelper class.
    - [ConfigurationHelper::getCombinedConf](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ConfigurationHelper/getCombinedConf.md) &ndash; Returns the merged configuration of all BabyYaml configuration files found in the given directory.
- [ControllerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper.md) &ndash; The ControllerHelper class.
    - [ControllerHelper::getControllerArgsInfo](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ControllerHelper/getControllerArgsInfo.md) &ndash; Returns an array of controller args corresponding to the given controller.
- [EnvironmentHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/EnvironmentHelper.md) &ndash; The EnvironmentHelper class.
    - [EnvironmentHelper::isDev](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/EnvironmentHelper/isDev.md) &ndash; Returns whether the current environment is dev.
    - [EnvironmentHelper::getEnvironment](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/EnvironmentHelper/getEnvironment.md) &ndash; Returns the name of the current environment.
- [ServiceContainerHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper.md) &ndash; The ServiceContainerHelper class.
    - [ServiceContainerHelper::getInstance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/ServiceContainerHelper/getInstance.md) &ndash; Returns an instance of a service container according to the given options.
- [HttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest.md) &ndash; The HttpRequest class represents the http request.
    - [HttpRequest::createFromEnv](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/createFromEnv.md) &ndash; The createFromEnv method
    - [HttpRequest::getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getMethod.md) &ndash; Returns the http method used for the request, in lower case.
    - [HttpRequest::getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUri.md) &ndash; Returns the uri of the http request.
    - [HttpRequest::getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getUriPath.md) &ndash; Returns the uriPath of the http request.
    - [HttpRequest::getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryString.md) &ndash; Returns the queryString of the http request.
    - [HttpRequest::getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getQueryArgs.md) &ndash; Returns the array version of the query string of the http request.
    - [HttpRequest::getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getTime.md) &ndash; The time when the http request was created.
    - [HttpRequest::getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHost.md) &ndash; Returns the host of the http request.
    - [HttpRequest::isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/isHttpsRequest.md) &ndash; Returns whether the request is a secure http request (using https).
    - [HttpRequest::getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPort.md) &ndash; Returns the port number of the http request.
    - [HttpRequest::getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getIp.md) &ndash; Returns the ip address of the user.
    - [HttpRequest::getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getReferer.md) &ndash; Returns the http referer of the http request when available, or null otherwise.
    - [HttpRequest::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeaders.md) &ndash; Returns an array of the http headers attached to the http request.
    - [HttpRequest::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getHeader.md) &ndash; Returns the value of a specific header.
    - [HttpRequest::getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getGet.md) &ndash; Returns the original $_GET array attached with the http request.
    - [HttpRequest::getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getPost.md) &ndash; Returns the original $_POST array attached with the http request.
    - [HttpRequest::getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getFiles.md) &ndash; https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
    - [HttpRequest::getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequest/getCookie.md) &ndash; Returns the original $_COOKIE array attached with the http request.
- [HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) &ndash; The HttpRequestInterface interface.
    - [HttpRequestInterface::getMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getMethod.md) &ndash; Returns the http method used for the request, in lower case.
    - [HttpRequestInterface::getUri](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUri.md) &ndash; Returns the uri of the http request.
    - [HttpRequestInterface::getUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getUriPath.md) &ndash; Returns the uriPath of the http request.
    - [HttpRequestInterface::getQueryString](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryString.md) &ndash; Returns the queryString of the http request.
    - [HttpRequestInterface::getQueryArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getQueryArgs.md) &ndash; Returns the array version of the query string of the http request.
    - [HttpRequestInterface::getTime](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getTime.md) &ndash; The time when the http request was created.
    - [HttpRequestInterface::getHost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHost.md) &ndash; Returns the host of the http request.
    - [HttpRequestInterface::isHttpsRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/isHttpsRequest.md) &ndash; Returns whether the request is a secure http request (using https).
    - [HttpRequestInterface::getPort](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPort.md) &ndash; Returns the port number of the http request.
    - [HttpRequestInterface::getIp](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getIp.md) &ndash; Returns the ip address of the user.
    - [HttpRequestInterface::getReferer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getReferer.md) &ndash; Returns the http referer of the http request when available, or null otherwise.
    - [HttpRequestInterface::getHeaders](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeaders.md) &ndash; Returns an array of the http headers attached to the http request.
    - [HttpRequestInterface::getHeader](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getHeader.md) &ndash; Returns the value of a specific header.
    - [HttpRequestInterface::getGet](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getGet.md) &ndash; Returns the original $_GET array attached with the http request.
    - [HttpRequestInterface::getPost](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getPost.md) &ndash; Returns the original $_POST array attached with the http request.
    - [HttpRequestInterface::getFiles](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getFiles.md) &ndash; https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
    - [HttpRequestInterface::getCookie](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface/getCookie.md) &ndash; Returns the original $_COOKIE array attached with the http request.
- [HttpResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse.md) &ndash; The HttpResponse class.
    - [HttpResponse::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/__construct.md) &ndash; Builds the HttpResponse instance.
    - [HttpResponse::setHttpVersion](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/setHttpVersion.md) &ndash; Sets the http version of this http response.
    - [HttpResponse::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponse/send.md) &ndash; Sends the headers and prints the response body to the output.
- [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) &ndash; The HttpResponseInterface interface.
    - [HttpResponseInterface::send](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface/send.md) &ndash; Sends the headers and prints the response body to the output.
- [LightReverseRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface.md) &ndash; The LightReverseRouterInterface interface.
    - [LightReverseRouterInterface::getUrl](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface/getUrl.md) &ndash; Returns the url corresponding to the given route name and url parameters.
- [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md) &ndash; The LightRouter class.
    - [LightRouter::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md) &ndash; Tests the given httpRequest against the routes until one matches.
- [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) &ndash; The LightRouterInterface interface.
    - [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md) &ndash; Tests the given httpRequest against the routes until one matches.
- [LightBlueServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer.md) &ndash; The LightBlueServiceContainer class.
    - BlueOctopusServiceContainer::__construct &ndash; Builds the service container.
    - BlueOctopusServiceContainer::get &ndash; Returns the service which name is given.
    - BlueOctopusServiceContainer::has &ndash; The has method
    - BlueOctopusServiceContainer::getMethodName &ndash; Converts the given service name into a method name (the name of the method in charge of returning the service).
- [LightDummyServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer.md) &ndash; The LightDummyServiceContainer class.
    - [LightDummyServiceContainer::get](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/get.md) &ndash; The get method
    - [LightDummyServiceContainer::has](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightDummyServiceContainer/has.md) &ndash; The has method
- [LightRedServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightRedServiceContainer.md) &ndash; The LightRedServiceContainer class.
    - RedOctopusServiceContainer::__construct &ndash; Builds the red octopus instance.
    - RedOctopusServiceContainer::build &ndash; found in the given (sic) config.
    - RedOctopusServiceContainer::get &ndash; Returns the service (class instance) which name is given.
    - RedOctopusServiceContainer::has &ndash; The has method
    - HotServiceResolver::getService &ndash; Returns the service (an instance of a class) defined in the given sic block.
- [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) &ndash; The LightServiceContainerInterface interface.
    - OctopusServiceContainerInterface::get &ndash; Returns the service which name is given.
    - OctopusServiceContainerInterface::has &ndash; The has method


Dependencies
============
- [SicTools](https://github.com/lingtalfi/SicTools)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [Octopus](https://github.com/lingtalfi/Octopus)
- [PhpUploadFileFix](https://github.com/lingtalfi/PhpUploadFileFix)


