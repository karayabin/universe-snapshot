Light_ControllerHub
===========
2019-10-28 -> 2021-03-05



A [Light](https://github.com/lingtalfi/Light) service to execute multiple controllers from one route.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ControllerHub
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ControllerHub
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/pages/conception-notes.md)

- [Services](#services)



Services
=========


This plugin provides the following services:

- controller_hub (returns a LightControllerHubService instance)


Here is an example of the service configuration:

```yaml
controller_hub:
    instance: Ling\Light_ControllerHub\Service\LightControllerHubService
    methods:
        setContainer:
            container: @container()

```




History Log
=============

- 1.2.12 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.11 -- 2021-02-25

    - fix assets/map dir removed

- 1.2.10 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.2.9 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.2.8 -- 2021-02-23

    - Update dependencies

- 1.2.7 -- 2021-02-23

  - cleaning assets/map dir 
  
- 1.2.6 -- 2021-02-23

  - fix plugin's route declaration file not named correctly 
  
- 1.2.5 -- 2021-02-23

  - switch to Light_EasyRoute open registration system

- 1.2.4 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.2.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.2 -- 2020-12-01

    - update service, now accepts dynamic registration
    
- 1.2.1 -- 2020-07-02

    - add precisions in the LightBaseControllerHubHandler-> doHandle comments
    
- 1.2.0 -- 2019-12-16

    - update plugin to accommodate new Light service container

- 1.1.0 -- 2019-11-05

    - add LightControllerHubService->getRouteName method
    
- 1.0.1 -- 2019-10-28

    - fix LightBaseControllerHubHandler->doHandle not handling directory traversal correctly with $controllerDir argument
    
- 1.0.0 -- 2019-10-28

    - initial commit