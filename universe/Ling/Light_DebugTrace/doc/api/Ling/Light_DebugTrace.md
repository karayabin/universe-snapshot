Ling/Light_DebugTrace
================
2020-06-25 --> 2021-06-03




Table of contents
===========

- [LightDebugTracePlanetInstaller](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller.md) &ndash; The LightDebugTracePlanetInstaller class.
    - [LightDebugTracePlanetInstaller::init2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
    - [LightDebugTracePlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Light_PlanetInstaller/LightDebugTracePlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
    - LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
    - LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.
- [LightDebugTraceService](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService.md) &ndash; The LightDebugTraceService class.
    - [LightDebugTraceService::__construct](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/__construct.md) &ndash; Builds the LightKitAdminDebugTraceService instance.
    - [LightDebugTraceService::initialize](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/initialize.md) &ndash; Listener for the [Ling.Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightDebugTraceService::onRouteFound](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onRouteFound.md) &ndash; Callable for the Ling.Light.on_route_found event provided by [the Light framework](https://github.com/lingtalfi/Light).
    - [LightDebugTraceService::onCsrfTokenRegenerated](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onCsrfTokenRegenerated.md) &ndash; Callable for the Ling.Light_CsrfSimple.on_csrf_token_regenerated event provided by [the Light_CsrfSimple plugin](Light_CsrfSimple).
    - [LightDebugTraceService::onEndRoutine](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/onEndRoutine.md) &ndash; Callable for [the Ling.Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightDebugTraceService::setContainer](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setContainer.md) &ndash; Sets the container.
    - [LightDebugTraceService::setTargetFile](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetFile.md) &ndash; Sets the targetFile.
    - [LightDebugTraceService::setTargetDir](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setTargetDir.md) &ndash; Sets the targetDir.
    - [LightDebugTraceService::setHttpRequestFilters](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace/Service/LightDebugTraceService/setHttpRequestFilters.md) &ndash; Sets the httpRequestFilters.


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


