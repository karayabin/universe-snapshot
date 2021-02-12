Light_EasyRoute
===========
2019-08-21 -> 2020-12-01



A service to register the routes of your Light plugin.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_EasyRoute
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conceptions notes](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- easy_route


Here is an example of the service configuration file:

```yaml
easy_route:
    instance: Ling\Light_EasyRoute\Service\LightEasyRouteService


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.initialize_1
            listener:
                instance: @service(easy_route)
                callable_method: initialize



```

See the conception notes for more details.







History Log
=============

- 1.2.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.3 -- 2020-12-01

    - update LightEasyRouteService->initialize, now accesses app dir via container instead of light instance
    
- 1.2.2 -- 2019-12-17

    - fix functional typo in service configuration
    
- 1.2.1 -- 2019-12-17

    - forgot to update README.md
    
- 1.2.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 initialization system
    
- 1.1.0 -- 2019-09-10

    - update service instantiation to accommodate the new initializer interface
    
- 1.0.0 -- 2019-08-21

    - initial commit