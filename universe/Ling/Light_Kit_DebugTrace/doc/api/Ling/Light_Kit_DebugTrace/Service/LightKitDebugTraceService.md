[Back to the Ling/Light_Kit_DebugTrace api](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace.md)



The LightKitDebugTraceService class
================
2021-07-08 --> 2021-08-03






Introduction
============

The LightKitDebugTraceService class.



Class synopsis
==============


class <span class="pl-k">LightKitDebugTraceService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - protected string|null [$targetFile](#property-targetFile) ;
    - protected string|null [$targetDir](#property-targetDir) ;
    - protected string|null [$targetDirCurrentFileName](#property-targetDirCurrentFileName) ;
    - protected array [$httpRequestFilters](#property-httpRequestFilters) ;
    - private bool [$_isAcceptedRequest](#property-_isAcceptedRequest) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [onRouteFound](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onRouteFound.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onKitPageConfReady](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onKitPageConfReady.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onEndRoutine](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onEndRoutine.md)(Ling\Light\Events\LightEvent $event) : void
    - public [getTargetDirFilePathByUri](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/getTargetDirFilePathByUri.md)(string $uri) : string
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTargetFile](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setTargetFile.md)(string $targetFile) : void
    - public [setTargetDir](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setTargetDir.md)(string $targetDir) : void
    - public [setHttpRequestFilters](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setHttpRequestFilters.md)(array $httpRequestFilters) : void
    - protected [appendSection](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/appendSection.md)(array $section) : void
    - protected [resetFile](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/resetFile.md)(Ling\Light\Http\HttpRequestInterface $request) : void
    - protected [testRequest](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/testRequest.md)(Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected [isAcceptedRequest](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/isAcceptedRequest.md)() : bool

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

- [LightKitDebugTraceService::__construct](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/__construct.md) &ndash; Builds the LightKitDebugTraceService instance.
- [LightKitDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightKitDebugTraceService::onRouteFound](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onRouteFound.md) &ndash; Callable for the Ling.Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
- [LightKitDebugTraceService::onKitPageConfReady](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onKitPageConfReady.md) &ndash; Callable for the Ling.Light_Kit.on_page_conf_ready event provided by [the Light_Kit plugin](https://github.com/lingtalfi/Light_Kit).
- [LightKitDebugTraceService::onEndRoutine](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/onEndRoutine.md) &ndash; Callable for [the Ling.Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightKitDebugTraceService::getTargetDirFilePathByUri](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/getTargetDirFilePathByUri.md) &ndash; Returns the file path, in the target dir, corresponding to the given uri.
- [LightKitDebugTraceService::setContainer](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setContainer.md) &ndash; Sets the container.
- [LightKitDebugTraceService::setTargetFile](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setTargetFile.md) &ndash; Sets the targetFile.
- [LightKitDebugTraceService::setTargetDir](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setTargetDir.md) &ndash; Sets the targetDir.
- [LightKitDebugTraceService::setHttpRequestFilters](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/setHttpRequestFilters.md) &ndash; Sets the httpRequestFilters.
- [LightKitDebugTraceService::appendSection](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/appendSection.md) &ndash; Appends a section to the target file, if the target file is defined.
- [LightKitDebugTraceService::resetFile](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/resetFile.md) &ndash; Empty the target file (if set) and/or the target dir (if target dir is set).
- [LightKitDebugTraceService::testRequest](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/testRequest.md) &ndash; defined for this instance.
- [LightKitDebugTraceService::isAcceptedRequest](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService/isAcceptedRequest.md) &ndash; Returns whether the current http request has been accepted.





Location
=============
Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService<br>
See the source code of [Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/Service/LightKitDebugTraceService.php)



SeeAlso
==============
Previous class: [LightKitDebugTraceException](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Exception/LightKitDebugTraceException.md)<br>
