Ling/Light_Kit_Admin_DebugTrace
================
2019-11-07 --> 2021-05-02




Table of contents
===========

- [LightKitAdminDebugTraceException](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Exception/LightKitAdminDebugTraceException.md) &ndash; The LightKitAdminDebugTraceException class.
- [LightKitAdminDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller.md) &ndash; The LightKitAdminDebugTracePlanetInstaller class.
    - [LightKitAdminDebugTracePlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Light_PlanetInstaller/LightKitAdminDebugTracePlanetInstaller/onMapCopyAfter.md) &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightKitAdminDebugTraceService](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService.md) &ndash; The LightKitAdminDebugTraceService class.
    - [LightKitAdminDebugTraceService::__construct](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/__construct.md) &ndash; Builds the LightKitAdminDebugTraceService instance.
    - [LightKitAdminDebugTraceService::initialize](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightKitAdminDebugTraceService::onRouteFound](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onRouteFound.md) &ndash; Callable for the Ling.Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
    - [LightKitAdminDebugTraceService::onPageRenderedBefore](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onPageRenderedBefore.md) &ndash; Callable for the Ling.Light_Kit_Admin.on_page_rendered_before event provided by [the Light_Kit_Admin plugin](https://github.com/lingtalfi/Light_Kit_Admin).
    - [LightKitAdminDebugTraceService::onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onCsrfTokenRegenerated.md) &ndash; Callable for the Ling.Light_CsrfSimple.on_csrf_token_regenerated event provided by [the Light_CsrfSimple plugin](Light_CsrfSimple).
    - [LightKitAdminDebugTraceService::onKitPageConfReady](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onKitPageConfReady.md) &ndash; Callable for the Ling.Light_Kit.on_page_conf_ready event provided by [the Light_Kit plugin](https://github.com/lingtalfi/Light_Kit).
    - [LightKitAdminDebugTraceService::onEndRoutine](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/onEndRoutine.md) &ndash; Callable for [the Ling.Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightKitAdminDebugTraceService::getTargetDirFilePathByUri](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/getTargetDirFilePathByUri.md) &ndash; Returns the file path, in the target dir, corresponding to the given uri.
    - [LightKitAdminDebugTraceService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setContainer.md) &ndash; Sets the container.
    - [LightKitAdminDebugTraceService::setTargetFile](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetFile.md) &ndash; Sets the targetFile.
    - [LightKitAdminDebugTraceService::setTargetDir](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setTargetDir.md) &ndash; Sets the targetDir.
    - [LightKitAdminDebugTraceService::setHttpRequestFilters](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace/Service/LightKitAdminDebugTraceService/setHttpRequestFilters.md) &ndash; Sets the httpRequestFilters.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [Light](https://github.com/lingtalfi/Light)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller)


