Light_DebugTrace
===========
2020-06-25 -> 2021-03-05



A service to help debug your [light](https://github.com/lingtalfi/Light) application.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_DebugTrace
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DebugTrace
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DebugTrace api](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/api/Ling/Light_DebugTrace.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_DebugTrace/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
debugtrace:
    instance: Ling\Light_DebugTrace\Service\LightDebugTraceService
    methods:
        setContainer:
            container: @container()
        setTargetFile:
            file: ${app_dir}/log/Light_DebugTrace/light_debugtrace.txt
        setTargetDir:
            dir: ${app_dir}/log/Light_DebugTrace/all
        setHttpRequestFilters:
            filters:
                urlIgnoreIfStartWith: []
                    - /user-data
                    - /ajax-handler
                    - /css/tmp/
                    - /browser-sync/


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            event: Light.on_route_found
            listener:
                instance: @service(debugtrace)
                callable_method: onRouteFound
    -
        method: registerListener
        args:
            event: Light.initialize_1
            listener:
                instance: @service(debugtrace)
                callable_method: initialize
    -
        method: registerListener
        args:
            event: Light.end_routine
            listener:
                instance: @service(debugtrace)
                callable_method: onEndRoutine
    -
        method: registerListener
        args:
            event: Light_CsrfSimple.on_csrf_token_regenerated
            listener:
                instance: @service(debugtrace)
                callable_method: onCsrfTokenRegenerated


```



History Log
=============

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2020-06-25

    - initial commit