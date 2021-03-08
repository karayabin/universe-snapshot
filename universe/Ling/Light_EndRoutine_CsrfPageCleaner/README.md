Light_EndRoutine_CsrfPageCleaner
===========
2019-09-19 -> 2021-03-05



An end routine for cleaning the csrf page tokens.

 

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_EndRoutine_CsrfPageCleaner
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_EndRoutine_CsrfPageCleaner
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_EndRoutine_CsrfPageCleaner api](https://github.com/lingtalfi/Light_EndRoutine_CsrfPageCleaner/blob/master/doc/api/Ling/Light_EndRoutine_CsrfPageCleaner.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [What is it?](#what-is-it)
- [Services](#services)
- [Related](#related)





What is it?
--------------

This tool helps implementing the [page security system of the csrf tools planet](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md).

Basically, we just clean the unused pages.





Services
=========


This plugin doesn't provide any service, but subscribes to the **end_routine** service,
as we can see in the following example configuration:


```yaml
# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.end_routine
            listener:
                instance: Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler
                methods:
                    setOptions:
                        options:
                            showSession: true
                            sessionVars:
                                - light_csrf_simple
                            path: ${app_dir}/tmp/session-content.txt
                callable_method: handle

```



Related
==========

- [Light_EndRoutine](https://github.com/lingtalfi/Light_EndRoutine)


History Log
=============

- 1.4.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.4.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.4.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.4.0 -- 2019-19-19

    - update LightEndRoutineCsrfPageCleanerHandler to accommodate Light.end_routine event instead of the end_routine service
    
- 1.3.1 -- 2019-10-01

    - update LightEndRoutineCsrfPageCleanerHandler, fix deprecated LightTool::isAjax call
    
- 1.3.0 -- 2019-09-30

    - update LightEndRoutineCsrfPageCleanerHandler, now uses the new LightTool::isAjax call
    
- 1.2.0 -- 2019-09-24

    - update end routine, now is triggered only on ajax pages
    
- 1.1.1 -- 2019-09-20

    - update documentation
    
- 1.1.0 -- 2019-09-20

    - update LightEndRoutineCsrfPageCleanerHandler now depends on csrf service
    
- 1.0.0 -- 2019-09-19

    - initial commit