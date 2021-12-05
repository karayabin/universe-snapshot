[Back to the Ling/Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md)



The LightKitAdminDebugTraceService class
================
2019-11-07 --> 2021-07-08






Introduction
============

The LightKitAdminDebugTraceService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminDebugTraceService</span> extends [LightKitDebugTraceService](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [LightKitDebugTraceService::$container](#property-container) ;
    - protected string|null [LightKitDebugTraceService::$targetFile](#property-targetFile) ;
    - protected string|null [LightKitDebugTraceService::$targetDir](#property-targetDir) ;
    - protected string|null [LightKitDebugTraceService::$targetDirCurrentFileName](#property-targetDirCurrentFileName) ;
    - protected array [LightKitDebugTraceService::$httpRequestFilters](#property-httpRequestFilters) ;

- Methods
    - public [onPageRenderedBefore](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onPageRenderedBefore.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public [onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onCsrfTokenRegenerated.md)(Ling\Light\Events\LightEvent $event, string $eventName) : void

- Inherited methods
    - public LightKitDebugTraceService::__construct() : void
    - public LightKitDebugTraceService::initialize(Ling\Light\Events\LightEvent $event) : void
    - public LightKitDebugTraceService::onRouteFound(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public LightKitDebugTraceService::onKitPageConfReady(Ling\Light\Events\LightEvent $event, string $eventName) : void
    - public LightKitDebugTraceService::onEndRoutine(Ling\Light\Events\LightEvent $event) : void
    - public LightKitDebugTraceService::getTargetDirFilePathByUri(string $uri) : string
    - public LightKitDebugTraceService::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightKitDebugTraceService::setTargetFile(string $targetFile) : void
    - public LightKitDebugTraceService::setTargetDir(string $targetDir) : void
    - public LightKitDebugTraceService::setHttpRequestFilters(array $httpRequestFilters) : void
    - protected LightKitDebugTraceService::appendSection(array $section) : void
    - protected LightKitDebugTraceService::resetFile(Ling\Light\Http\HttpRequestInterface $request) : void
    - protected LightKitDebugTraceService::testRequest(Ling\Light\Http\HttpRequestInterface $httpRequest) : bool
    - protected LightKitDebugTraceService::isAcceptedRequest() : bool

}






Methods
==============

- [LightKitAdminDebugTraceService::onPageRenderedBefore](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onPageRenderedBefore.md) &ndash; Callable for the Ling.Light_Kit_Admin.on_page_rendered_before event provided by [the Light_Kit_Admin plugin](https://github.com/lingtalfi/Light_Kit_Admin).
- [LightKitAdminDebugTraceService::onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onCsrfTokenRegenerated.md) &ndash; Callable for the Ling.Light_CsrfSimple.on_csrf_token_regenerated event provided by [the Light_CsrfSimple plugin](Light_CsrfSimple).
- LightKitDebugTraceService::__construct &ndash; Builds the LightKitDebugTraceService instance.
- LightKitDebugTraceService::initialize &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- LightKitDebugTraceService::onRouteFound &ndash; Callable for the Ling.Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
- LightKitDebugTraceService::onKitPageConfReady &ndash; Callable for the Ling.Light_Kit.on_page_conf_ready event provided by [the Light_Kit plugin](https://github.com/lingtalfi/Light_Kit).
- LightKitDebugTraceService::onEndRoutine &ndash; Callable for [the Ling.Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- LightKitDebugTraceService::getTargetDirFilePathByUri &ndash; Returns the file path, in the target dir, corresponding to the given uri.
- LightKitDebugTraceService::setContainer &ndash; Sets the container.
- LightKitDebugTraceService::setTargetFile &ndash; Sets the targetFile.
- LightKitDebugTraceService::setTargetDir &ndash; Sets the targetDir.
- LightKitDebugTraceService::setHttpRequestFilters &ndash; Sets the httpRequestFilters.
- LightKitDebugTraceService::appendSection &ndash; Appends a section to the target file, if the target file is defined.
- LightKitDebugTraceService::resetFile &ndash; Empty the target file (if set) and/or the target dir (if target dir is set).
- LightKitDebugTraceService::testRequest &ndash; defined for this instance.
- LightKitDebugTraceService::isAcceptedRequest &ndash; Returns whether the current http request has been accepted.





Location
=============
Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService<br>
See the source code of [Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/Service/LightKitAdminDebugTraceService.php)



SeeAlso
==============
Previous class: [LightKitAdminDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.md)<br>
