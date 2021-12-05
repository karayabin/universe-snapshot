Light_Vars
===========
2021-02-25 -> 2021-07-01



A variable container for the light framework.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Vars
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Vars
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Vars api](https://github.com/lingtalfi/Light_Vars/blob/master/doc/api/Ling/Light_Vars.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Vars/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
vars:
    instance: Ling\Light_Vars\Service\LightVarsService







```



History Log
=============

- 1.0.8 -- 2021-07-01

    - update service->resolveContainerNotation method, add precision comment
  
- 1.0.7 -- 2021-06-25

    - add service->getVars method
  
- 1.0.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.5 -- 2021-05-10

    - Fix assets missing.

- 1.0.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2021-02-25

    - add light variable concept
  
- 1.0.1 -- 2021-02-25

    - add service->resolveContainerNotation method
  
- 1.0.0 -- 2021-02-25

    - initial commit