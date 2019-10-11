Light_LightInstance
===========
2019-10-09



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


```



History Log
=============

- 1.0.0 -- 2019-10-09

    - fix doc links
    
- 1.0.0 -- 2019-10-09

    - initial commit