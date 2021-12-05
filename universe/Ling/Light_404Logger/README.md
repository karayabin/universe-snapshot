Light_404Logger
===========
2019-12-12 -> 2021-06-28



A [Light](https://github.com/lingtalfi/Light) plugin to log 404 route not matching messages.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_404Logger
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_404Logger
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_404Logger api](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/api/Ling/Light_404Logger.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_404Logger/blob/master/doc/pages/conception-notes.md)
- [Services](#services)    






Services
=========


This plugin provides the following services:

- _404_logger (returns a Light404LoggerService instance)


Note: the underscore in front of the service name is not a typo. That's because the service names
are converted to object methods, and it's not permitted in php to have method names starting with a number. 



Here is an example of the service configuration:

```yaml
_404_logger:
    instance: Ling\Light_404Logger\Service\Light404LoggerService



```




History Log
=============

- 1.0.17 -- 2021-06-28

    - fix api wrong reference to Ling.Light_Logger
  
- 1.0.16 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system
  
- 1.0.15 -- 2021-06-03

    - adapt api to work with Light_PlanetInstaller:2.0.4
  
- 1.0.14 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.13 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0

- 1.0.12 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.0.11 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.0.10 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.0.9 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.0.8 -- 2021-03-22

    - adapt api to work with Ling.Light_Events:1.10.0
  
- 1.0.7 -- 2021-03-19

    - fix open events now in the events directory
  
- 1.0.6 -- 2021-03-18

    - switch to Ling.Light_Events' open registration system

- 1.0.5 -- 2021-03-15

    - fix README.md indentation typo in the service snippet 
  
- 1.0.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-12-12

    - initial commit