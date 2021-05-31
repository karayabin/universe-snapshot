Light_BMenu
===========
2019-08-08 -> 2021-03-18




A (gui) menu service for your [Light](https://github.com/lingtalfi/Light) applications.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_BMenu
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_BMenu
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_BMenu api](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Conception notes](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- bmenu


Here is an example of the service configuration (using [babyYaml](https://github.com/lingtalfi/BabyYaml) files):


```yaml
bmenu:
    instance: Ling\Light_BMenu\Service\LightBMenuService

```



History Log
=============

- 2.0.1 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 2.0.0 -- 2021-03-18

    - switch to open registration system
  
- 1.9.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.9.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.9.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.9.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.9.0 -- 2020-08-10

    - add LightBMenuService->addDirectItemsByFileAndParentPath method  
    
- 1.8.0 -- 2020-08-10

    - add LightBMenuService->addDirectItemsByFile method  
    
- 1.7.0 -- 2020-07-02

    - add LightBMenuService->addDefaultItemByFile method  
    
- 1.6.0 -- 2020-07-02

    - update LightBMenu, now uses strictMode by default  
    
- 1.5.2 -- 2020-02-28

    - update documentation 
    
- 1.5.1 -- 2020-02-26

    - update LightBMenuTool::getActiveOpenInfo, improve url detection feature 
    
- 1.5.0 -- 2020-02-25

    - add LightBMenuTool class
    
- 1.4.0 -- 2019-08-09

    - update LightBMenuHostInterface->onMenuCompiled method now uses an array as its argument 
    
- 1.3.0 -- 2019-08-09

    - add LightBMenuHostInterface->setMenuType method 
    
- 1.2.0 -- 2019-08-09

    - update the planet so that the service now accepts multiple menus (implementing the concept of menu type).
    
- 1.1.0 -- 2019-08-09

    - update menu item structure, link becomes url, added badge_text and badge_class
    
- 1.0.0 -- 2019-08-08

    - initial commit