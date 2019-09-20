Light_EasyRoute
===========
2019-08-21



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
$initializer.methods_collection:
    -
        method: registerInitializer
        args:
            initializer: @service(easy_route)

```

See the conception notes for more details.







History Log
=============

- 1.1.0 -- 2019-09-10

    - update service instantiation to accommodate the new initializer interface
    
- 1.0.0 -- 2019-08-21

    - initial commit