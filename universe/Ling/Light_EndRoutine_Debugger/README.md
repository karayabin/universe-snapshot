Light_EndRoutine_Debugger
===========
2019-09-20



An end routine for debugging your application variables.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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

$end_routine.methods_collection:
    -
        method: registerHandler
        args:
            identifier: Light_EndRoutine_Debugger
            handler:
                instance: Ling\Light_EndRoutine_Debugger\Handler\LightEndRoutineDebuggerHandler
                methods:
                    setOptions:
                        options:
                            showSession: true


```




Related
==========

- [Light_EndRoutine](https://github.com/lingtalfi/Light_EndRoutine)




History Log
=============

- 1.0.0 -- 2019-09-20

    - initial commit