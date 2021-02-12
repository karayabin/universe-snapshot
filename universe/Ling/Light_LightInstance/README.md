Light_LightInstance
===========
2019-10-09



2019-12-16: This service is now deprecated since Light 0.49 (the service container has access to the light instance directly,
which has access to the http request).



A [Light](https://github.com/lingtalfi/Light) service to access the light and http request instances.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_LightInstance
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_LightInstance api](https://github.com/lingtalfi/Light_LightInstance/blob/master/doc/api/Ling/Light_LightInstance.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)


Services
=========


This plugin provides the following services:

- light_instance (returns a LightLightInstanceService instance)




Here is an example of the service configuration:

```yaml
light_instance:
    instance: Ling\Light_LightInstance\Service\LightLightInstanceService
    methods:
        setContainer:
            container: @container()



# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.initialize_1
            listener:
                instance: @service(light_instance)
                callable_method: initialize
```



History Log
=============

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.1 -- 2019-12-17

    - fix functional typo in service configuration

- 1.2.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system

- 1.1.0 -- 2019-12-16

    - deprecation notice
    
- 1.0.2 -- 2019-10-28

    - fix no initializer
    
- 1.0.1 -- 2019-10-09

    - fix doc links
    
- 1.0.0 -- 2019-10-09

    - initial commit