[Back to the Ling/Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md)



The LightDebugTraceService class
================
2020-06-25 --> 2021-03-05






Introduction
============

The LightDebugTraceService class.



Class synopsis
==============


class <span class="pl-k">LightDebugTraceService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$targetFile](#property-targetFile) ;
    - protected string [$targetDir](#property-targetDir) ;
    - protected string [$targetDirCurrentFileName](#property-targetDirCurrentFileName) ;
    - protected array [$httpRequestFilters](#property-httpRequestFilters) ;
    - private bool [$_isAcceptedRequest](#property-_isAcceptedRequest) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [onRouteFound](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onRouteFound.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onCsrfTokenRegenerated.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onEndRoutine](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onEndRoutine.md)(Ling\Light\Events\LightEvent $event) : void
    - public [setContainer](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTargetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetFile.md)(string $targetFile) : void
    - public [setTargetDir](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetDir.md)(string $targetDir) : void
    - public [setHttpRequestFilters](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setHttpRequestFilters.md)(array $httpRequestFilters) : void
    - protected [appendSection](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/appendSection.md)(array $section) : void
    - protected [resetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/resetFile.md)(Ling\Light\Http\HttpRequestInterface $request) : void
    - protected [testRequest](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/testRequest.md)(Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected [isAcceptedRequest](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/isAcceptedRequest.md)() : bool

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-targetFile"><b>targetFile</b></span>

    This property holds the targetFile for this instance.
    
    

- <span id="property-targetDir"><b>targetDir</b></span>

    This property holds the targetDir for this instance.
    
    

- <span id="property-targetDirCurrentFileName"><b>targetDirCurrentFileName</b></span>

    This property holds the targetDirCurrentFileName for this instance.
    
    

- <span id="property-httpRequestFilters"><b>httpRequestFilters</b></span>

    This property holds the httpRequestFilters for this instance.
    
    

- <span id="property-_isAcceptedRequest"><b>_isAcceptedRequest</b></span>

    This property holds the _isAcceptedRequest for this instance.
    Assuming that if we accept the request, it's for the whole process.
    Null means the flag has not been set yet.
    
    



Methods
==============

- [LightDebugTraceService::__construct](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/__construct.md) &ndash; Builds the LightKitAdminDebugTraceService instance.
- [LightDebugTraceService::initialize](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/initialize.md) &ndash; Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightDebugTraceService::onRouteFound](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onRouteFound.md) &ndash; Callable for the Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
- [LightDebugTraceService::onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onCsrfTokenRegenerated.md) &ndash; Callable for the Light_CsrfSimple.on_csrf_token_regenerated event provided by [the Light_CsrfSimple plugin](Light_CsrfSimple).
- [LightDebugTraceService::onEndRoutine](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onEndRoutine.md) &ndash; Callable for [the Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightDebugTraceService::setContainer](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setContainer.md) &ndash; Sets the container.
- [LightDebugTraceService::setTargetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetFile.md) &ndash; Sets the targetFile.
- [LightDebugTraceService::setTargetDir](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetDir.md) &ndash; Sets the targetDir.
- [LightDebugTraceService::setHttpRequestFilters](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setHttpRequestFilters.md) &ndash; Sets the httpRequestFilters.
- [LightDebugTraceService::appendSection](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/appendSection.md) &ndash; Appends a section to the target file, if the target file is defined.
- [LightDebugTraceService::resetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/resetFile.md) &ndash; Empty the target file (if set) and/or the target dir (if target dir is set).
- [LightDebugTraceService::testRequest](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/testRequest.md) &ndash; defined for this instance.
- [LightDebugTraceService::isAcceptedRequest](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/isAcceptedRequest.md) &ndash; Returns whether the current http request has been accepted.





Location
=============
Ling\Light_DebugTrace\Service\LightDebugTraceService<br>
See the source code of [Ling\Light_DebugTrace\Service\LightDebugTraceService](https://github.com/lingtalfi/Light_DebugTrace/blob/master/Service/LightDebugTraceService.php)



