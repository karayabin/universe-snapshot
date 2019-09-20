Light_EndRoutine
===========
2019-09-19



A plugin to provide "php exit handler"-ish functionality for the light framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_EndRoutine
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_EndRoutine api](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/api/Ling/Light_EndRoutine.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_EndRoutine/blob/master/doc/pages/conception-notes.md)
- [Services](#services)


Services
=========


This plugin provides the following services:

- end_routine (returns a Light_EndRoutineService instance)


Here is an example of the service configuration:

```yaml
end_routine:
    instance: Ling\Light_EndRoutine\Service\Light_EndRoutineService
```


History Log
=============

- 1.2.0 -- 2019-09-20

    - update ContainerAwareLightEndRoutineHandler
    
- 1.1.0 -- 2019-09-20

    - update Light_EndRoutineService now accepts and transmits service container
    
- 1.0.0 -- 2019-09-19

    - initial commit