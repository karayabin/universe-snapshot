Light_Kit_DebugTrace
===========
2021-07-08 -> 2021-08-03



A debug helper for the [Light_Kit](https://github.com/lingtalfi/Light_Kit) planet.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_DebugTrace
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_DebugTrace
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_DebugTrace api](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/api/Ling/Light_Kit_DebugTrace.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_DebugTrace/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
kit_debugtrace:
    instance: Ling\Light_Kit_DebugTrace\Service\LightKitDebugTraceService
    methods:
        setContainer:
            container: @container()
        setTargetFile:
            file: /tmp/kit_debugtrace.txt
        setTargetDir:
            file: /tmp/kit_debugtrace
        setHttpRequestFilters:
            filters:
                urlIgnoreIfStartWith: []
                    - /user-data
                    - /ajax-handler
                    - /plugins/
                    - /css/tmp/
                    - /browser-sync/


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            event: Ling.Light.on_route_found
            listener:
                instance: @service(kit_debugtrace)
                callable_method: onRouteFound
    -
        method: registerListener
        args:
            event: Ling.Light_Kit.on_page_conf_ready
            listener:
                instance: @service(kit_debugtrace)
                callable_method: onKitPageConfReady
    -
        method: registerListener
        args:
            event: Ling.Light.initialize_1
            listener:
                instance: @service(kit_debugtrace)
                callable_method: initialize
    -
        method: registerListener
        args:
            event: Ling.Light.end_routine
            listener:
                instance: @service(kit_debugtrace)
                callable_method: onEndRoutine




```



History Log
=============

- 1.0.2 -- 2021-08-03

    - update service->onKitPageConfReady, adding babyYamlPage property when available
  
- 1.0.1 -- 2021-07-08

    - fix service returning typo in kit_conf key 
  
- 1.0.0 -- 2021-07-08

    - initial commit