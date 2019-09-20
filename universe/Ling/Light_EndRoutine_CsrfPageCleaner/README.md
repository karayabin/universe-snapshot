Light_EndRoutine_CsrfPageCleaner
===========
2019-09-19



An end routine for cleaning the csrf page tokens.

 

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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

This is an [end routine](https://github.com/lingtalfi/Light_EndRoutine) to help implementing
the [page security system of the csrf tools planet](https://github.com/lingtalfi/CSRFTools/blob/master/doc/pages/page-security-conception-notes.md).


Basically, we just clean the unused pages.





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
            identifier: Light_EndRoutine_CsrfPageCleaner
            handler:
                instance: Ling\Light_EndRoutine_CsrfPageCleaner\Handler\LightEndRoutineCsrfPageCleanerHandler


```



Related
==========

- [Light_EndRoutine](https://github.com/lingtalfi/Light_EndRoutine)


History Log
=============

- 1.1.1 -- 2019-09-20

    - update documentation
    
- 1.1.0 -- 2019-09-20

    - update LightEndRoutineCsrfPageCleanerHandler now depends on csrf service
    
- 1.0.0 -- 2019-09-19

    - initial commit