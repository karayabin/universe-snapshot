Light_Router
===========
2019-09-20



A simple router service for the [Light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Router
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Router api](https://github.com/lingtalfi/Light_Router/blob/master/doc/api/Ling/Light_Router.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)




Services
=========


This plugin provides the following services:

- router (returns a LightRouterInterface instance)



Here is an example of the service configuration:

```yaml
router:
    instance: Ling\Light_Router\Service\LightRouterService


```




History Log
=============

- 1.0.0 -- 2019-09-20

    - initial commit