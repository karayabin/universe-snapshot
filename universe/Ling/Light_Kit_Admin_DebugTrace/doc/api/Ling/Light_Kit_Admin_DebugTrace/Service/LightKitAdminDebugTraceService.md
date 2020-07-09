[Back to the Ling/Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md)



The LightKitAdminDebugTraceService class
================
2019-11-07 --> 2020-06-25






Introduction
============

The LightKitAdminDebugTraceService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminDebugTraceService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$targetFile](#property-targetFile) ;
    - protected string [$targetDir](#property-targetDir) ;
    - protected string [$targetDirCurrentFileName](#property-targetDirCurrentFileName) ;
    - protected array [$httpRequestFilters](#property-httpRequestFilters) ;
    - private bool [$_isAcceptedRequest](#property-_isAcceptedRequest) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/__construct.md)() : void
    - public [initialize](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/initialize.md)(Ling\Light\Events\LightEvent $event) : void
    - public [onRouteFound](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onRouteFound.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onPageRenderedBefore](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onPageRenderedBefore.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onCsrfTokenRegenerated.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onKitPageConfReady](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onKitPageConfReady.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onEndRoutine](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onEndRoutine.md)(Ling\Light\Events\LightEvent $event) : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setTargetFile](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetFile.md)(string $targetFile) : void
    - public [setTargetDir](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetDir.md)(string $targetDir) : void
    - public [setHttpRequestFilters](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setHttpRequestFilters.md)(array $httpRequestFilters) : void
    - protected [appendSection](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/appendSection.md)(array $section) : void
    - protected [resetFile](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/resetFile.md)(Ling\Light\Http\HttpRequestInterface $request) : void
    - protected [testRequest](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/testRequest.md)(Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected [isAcceptedRequest](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/isAcceptedRequest.md)() : bool

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

- [LightKitAdminDebugTraceService::__construct](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/__construct.md) &ndash; Builds the LightKitAdminDebugTraceService instance.
- [LightKitAdminDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/initialize.md) &ndash; Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightKitAdminDebugTraceService::onRouteFound](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onRouteFound.md) &ndash; Callable for the Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
- [LightKitAdminDebugTraceService::onPageRenderedBefore](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onPageRenderedBefore.md) &ndash; Callable for the Light_Kit_Admin.on_page_rendered_before event provided by [the Light_Kit_Admin plugin](https://github.com/lingtalfi/Light_Kit_Admin).
- [LightKitAdminDebugTraceService::onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onCsrfTokenRegenerated.md) &ndash; Callable for the Light_CsrfSimple.on_csrf_token_regenerated event provided by [the Light_CsrfSimple plugin](Light_CsrfSimple).
- [LightKitAdminDebugTraceService::onKitPageConfReady](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onKitPageConfReady.md) &ndash; Callable for the Light_Kit.on_page_conf_ready event provided by [the Light_Kit plugin](https://github.com/lingtalfi/Light_Kit).
- [LightKitAdminDebugTraceService::onEndRoutine](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onEndRoutine.md) &ndash; Callable for [the Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightKitAdminDebugTraceService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setContainer.md) &ndash; Sets the container.
- [LightKitAdminDebugTraceService::setTargetFile](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetFile.md) &ndash; Sets the targetFile.
- [LightKitAdminDebugTraceService::setTargetDir](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetDir.md) &ndash; Sets the targetDir.
- [LightKitAdminDebugTraceService::setHttpRequestFilters](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setHttpRequestFilters.md) &ndash; Sets the httpRequestFilters.
- [LightKitAdminDebugTraceService::appendSection](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/appendSection.md) &ndash; Appends a section to the target file, if the target file is defined.
- [LightKitAdminDebugTraceService::resetFile](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/resetFile.md) &ndash; Empty the target file (if set) and/or the target dir (if target dir is set).
- [LightKitAdminDebugTraceService::testRequest](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/testRequest.md) &ndash; defined for this instance.
- [LightKitAdminDebugTraceService::isAcceptedRequest](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/isAcceptedRequest.md) &ndash; Returns whether the current http request has been accepted.





Location
=============
Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService<br>
See the source code of [Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/Service/LightKitAdminDebugTraceService.php)



