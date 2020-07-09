Light_Kit_Admin_DebugTrace
===========
2019-11-07 -> 2020-06-25



A debug helper for [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin).

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_DebugTrace
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_DebugTrace api](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/api/Ling/Light_Kit_Admin_DebugTrace.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace/blob/master/doc/pages/conception-notes.md)

- [Services](#services)




Services
=========


This plugin provides the following services:

- kit_admin_debugtrace (returns a LightKitAdminDebugTraceService instance)


Here is an example of the service configuration:

```yaml
kit_admin_debugtrace:
    instance: Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService
    methods:
        setContainer:
            container: @container()
        setTargetFile:
            file: /tmp/lka_debugtrace.txt
        setTargetDir:
            file: /tmp/lka_debugtrace
        setHttpRequestFilters:
            filters:
                urlIgnoreIfStartWith: []
                    - /user-data
                    - /ajax-handler
                    - /css/tmp/


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            event: Light.on_route_found
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: onRouteFound
    -
        method: registerListener
        args:
            event: Light_Kit_Admin.on_page_rendered_before
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: onPageRenderedBefore
    -
        method: registerListener
        args:
            event: Light_Kit.on_page_conf_ready
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: onKitPageConfReady
    -
        method: registerListener
        args:
            event: Light_CsrfSimple.on_csrf_token_regenerated
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: onCsrfTokenRegenerated
    -
        method: registerListener
        args:
            event: Light.initialize_1
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: initialize
    -
        method: registerListener
        args:
            event: Light.end_routine
            listener:
                instance: @service(kit_admin_debugtrace)
                callable_method: onEndRoutine



```



History Log
=============

- 1.6.4 -- 2020-06-25

    - update conception notes
    
- 1.6.3 -- 2019-12-20

    - fix LightKitAdminDebugTraceService->onEndRoutine erroneously handling refuted requests
    
- 1.6.2 -- 2019-12-20

    - fix LightKitAdminDebugTraceService->onEndRoutine not displaying objects in session properly
    
- 1.6.1 -- 2019-12-19

    - add security section in the conception notes
    
- 1.6.0 -- 2019-12-19

    - add events and session information to the debug file
    
- 1.5.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system
    
- 1.4.0 -- 2019-11-27

    - use of csrf_session service replaces csrf_simple
    
- 1.3.0 -- 2019-11-18

    - add datetime property
    
- 1.2.0 -- 2019-11-08

    - add csrf_token_regenerated optional property
    
- 1.1.1 -- 2019-11-08

    - fix too long filenames not handled properly
    
- 1.1.0 -- 2019-11-08

    - add targetDir system
    - add csrf_token info to the debugtrace
    
- 1.0.0 -- 2019-11-07

    - initial commit