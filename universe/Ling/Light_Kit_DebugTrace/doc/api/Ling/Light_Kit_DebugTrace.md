Ling/Light_Kit_DebugTrace
================
2021-07-08 --> 2021-08-03




Table of contents
===========

- [LightKitDebugTraceException](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Exception/LightKitDebugTraceException.md) &ndash; The LightKitDebugTraceException class.
- [LightKitDebugTraceService](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace/Service/LightKitDebugTraceService.md) &ndash; The LightKitDebugTraceService class.
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


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple)
- [Light_Events](https://github.com/lingtalfi/Light_Events)


