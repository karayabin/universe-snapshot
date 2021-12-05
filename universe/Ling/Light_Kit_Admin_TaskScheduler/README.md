Light_Kit_Admin_TaskScheduler
===========
2020-07-31 -> 2021-06-18



A [Light Kit Admin](https://github.com/lingtalfi/Light_Kit_Admin) wrapper for the [Light_TaskScheduler](https://github.com/lingtalfi/Light_TaskScheduler) plugin.




This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_TaskScheduler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_TaskScheduler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/pages/conception-notes.md)
- [Our gui](#our-gui)
- [Services](#services)





Our gui
========
2020-08-14



We provide an admin list/form.


![lka-task-scheduler-admin](https://lingtalfi.com/img/universe/Light_Kit_Admin_TaskScheduler/lka-task-schedule-admin.png)









Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_task_scheduler: 
    instance: Ling\Light_Kit_Admin_TaskScheduler\Service\LightKitAdminTaskSchedulerService
    methods: 
        setContainer: 
            container: @container()
        
      
    
```



History Log
=============

- 1.5.20 -- 2021-06-18

    - Update api to work with Ling.Light_Kit_Admin:0.13.3

- 1.5.19 -- 2021-06-18
  
    - update api to work with Ling.Light_Kit_Admin:0.13.0
  
- 1.5.18 -- 2021-06-17
  
    - checkpoint commit
  
- 1.5.17 -- 2021-06-17
  
    - switch to micro-permission open registration system

- 1.5.16 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.5.15 -- 2021-05-31

  - update api to work with Light_PlanetInstaller 2.0.0

- 1.5.14 -- 2021-03-23

  - adapt api to Ling.Light_Realist:2.0.15
  
- 1.5.13 -- 2021-03-18

  - fix service config using undesirable bmenu snippet
  
- 1.5.12 -- 2021-03-18

  - fix bmenu items not requiring admin rights
  
- 1.5.11 -- 2021-03-18

  - update planet to adapt Ling.Light_BMenu:2.0.0

- 1.5.10 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.5.9 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 1.5.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.5.7 -- 2021-03-01

    - update service conf, unnecessary call to the bmenu->addDefaultItemByFile method
  
- 1.5.6 -- 2021-01-29

    - adapt to work with new Light_PluginInstaller api
  
- 1.5.5 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.5.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.3 -- 2020-12-01

    - update to accommodate latest Light_ControllerHub api  
    
- 1.5.2 -- 2020-11-27

    - update api with new generated breeze  
    
- 1.5.1 -- 2020-11-27

    - update to accommodate latest Light_Kit api  
    
- 1.5.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 1.4.0 -- 2020-08-21

    - update api to work with micro-permission3
    
- 1.3.0 -- 2020-08-14

    - update api to adapt new Light_TaskScheduler api
    
- 1.2.0 -- 2020-08-07

    - update service config, now use late registration with realform
    
- 1.1.0 -- 2020-08-07

    - update service config, now use late registration with realist
    
- 1.0.1 -- 2020-07-31

    - forgot to generate the docTools doc
    
- 1.0.0 -- 2020-07-31

    - initial commit