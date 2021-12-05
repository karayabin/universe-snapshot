Light_TaskScheduler
===========
2020-07-27 -> 2021-06-25



A task scheduler service for [the light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_TaskScheduler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_TaskScheduler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
task_scheduler: 
    instance: Ling\Light_TaskScheduler\Service\LightTaskSchedulerService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options: 
                executionMode: lastOnly     # The default is lastOnly
                useDebug: true              # The default is false
            
    


```



History Log
=============

- 1.1.11 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system
  
- 1.1.10 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.9 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0
  
- 1.1.8 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.1.7 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.6 -- 2021-02-19

    - upgrade dependencies

- 1.1.5 -- 2021-02-11
  
    - update api, plugin installer now extends LightUserDatabaseBasePluginInstaller
  
- 1.1.4 -- 2021-01-28

    - checkpoint commit
  
- 1.1.3 -- 2021-01-26

    - update for new Light_PluginInstaller api

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2020-08-14

    - update api, now accepts recursive dates
    
- 1.0.0 -- 2020-07-27

    - initial commit