Light_EndRoutine_Debugger
===========
2019-09-20 -> 2021-03-15



An end routine for debugging your application variables.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_EndRoutine_Debugger
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_EndRoutine_Debugger
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_EndRoutine_Debugger api](https://github.com/lingtalfi/Light_EndRoutine_Debugger/blob/master/doc/api/Ling/Light_EndRoutine_Debugger.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [Related](#related)




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
            events: Ling.Light.end_routine
            listener:
                instance: Ling\Light_EndRoutine_Debugger\Handler\LightEndRoutineDebuggerHandler
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

- 1.2.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.7 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.2.6 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.2.5 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.2.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.1 -- 2019-12-19

    - fix service configuration functional typo
    
- 1.2.0 -- 2019-12-19

    - update LightEndRoutineDebuggerHandler to accommodate Ling.Light.end_routine event instead of the end_routine service
    
- 1.1.0 -- 2019-09-23

    - add LightEndRoutineDebuggerHandler.options.path option
    
- 1.0.0 -- 2019-09-20

    - initial commit