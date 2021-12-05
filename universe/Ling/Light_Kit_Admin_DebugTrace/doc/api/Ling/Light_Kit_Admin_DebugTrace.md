Ling/Light_Kit_Admin_DebugTrace
================
2019-11-07 --> 2021-07-08




Table of contents
===========

- [LightKitAdminDebugTraceException](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Exception/LightKitAdminDebugTraceException.md) &ndash; The LightKitAdminDebugTraceException class.
- [LightKitAdminDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.md) &ndash; The LightKitAdminDebugTracePlanetInstaller class.
    - [LightKitAdminDebugTracePlanetInstaller::init2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightKitAdminDebugTracePlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService.md) &ndash; The LightKitAdminDebugTraceService class.
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


Dependencies
============
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_Kit_DebugTrace](https://github.com/lingtalfi/Light_Kit_DebugTrace)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)


