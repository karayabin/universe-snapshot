Light_Router
===========
2019-09-20 -> 2021-03-15



A simple router service for the [Light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Router
```

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

- 1.0.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.5 -- 2021-05-10

    - Fix assets missing.

- 1.0.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-09-20

    - initial commit