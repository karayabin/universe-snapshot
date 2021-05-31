Light_EndRoutine
===========
2019-09-19 -> 2021-03-05



UPDATE 2019-12--19: This plugin is now deprecated since Light uses the [Ling.Light.end_routine event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md)
instead. 


A plugin to provide "php exit handler"-ish functionality for the light framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_EndRoutine
```

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

- 1.3.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.3.5 -- 2021-05-11

    - Update deps (by CommitWizard).

- 1.3.4 -- 2021-05-10

    - Fix assets missing.

- 1.3.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2019-12-19

    - add deprecation notice

- 1.2.0 -- 2019-09-20

    - update ContainerAwareLightEndRoutineHandler
    
- 1.1.0 -- 2019-09-20

    - update Light_EndRoutineService now accepts and transmits service container
    
- 1.0.0 -- 2019-09-19

    - initial commit