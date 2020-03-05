Light_ControllerHub
===========
2019-10-28



A [Light](https://github.com/lingtalfi/Light) service to execute multiple controllers from one route.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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


# --------------------------------------
# hooks
# --------------------------------------
$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_ControllerHub/Light_EasyRoute/lch_routes.byml

```




History Log
=============

- 1.2.0 -- 2019-12-16

    - update plugin to accommodate new Light service container

- 1.1.0 -- 2019-11-05

    - add LightControllerHubService->getRouteName method
    
- 1.0.1 -- 2019-10-28

    - fix LightBaseControllerHubHandler->doHandle not handling directory traversal correctly with $controllerDir argument
    
- 1.0.0 -- 2019-10-28

    - initial commit