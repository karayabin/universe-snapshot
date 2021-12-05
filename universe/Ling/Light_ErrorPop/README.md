Light_ErrorPop
===========
2020-06-01 -> 2021-06-25



A development tool to show the last error of the light application.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ErrorPop
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ErrorPop
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ErrorPop api](https://github.com/lingtalfi/Light_ErrorPop/blob/master/doc/api/Ling/Light_ErrorPop.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ErrorPop/blob/master/doc/pages/conception-notes.md)
- [Related](#related)






Services
=========


Here is an example of the service configuration:

```yaml
error_pop:
    instance: Ling\Light_ErrorPop\Service\LightErrorPopService


```



Related
=============

- [Light_ErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/)
- [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler/)
    
    
    
History Log
=============

- 1.0.9 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system
  
- 1.0.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.7 -- 2021-05-10

    - Fix assets missing.

- 1.0.6 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2020-11-30

    - update service to also work with the error channel of the logger
    
- 1.0.1 -- 2020-06-01

    - update README.md
    
- 1.0.0 -- 2020-06-01

    - initial commit