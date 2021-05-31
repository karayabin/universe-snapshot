Light_LingStandardService
===========
2020-07-28 -> 2021-03-05



Some standard service classes to extend.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_LingStandardService
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_LingStandardService
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_LingStandardService api](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/pages/conception-notes.md)





History Log
=============

- 1.6.13 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.6.12 -- 2021-05-03

    - Update dependencies to Ling.Light_PluginInstaller (pushed by SubscribersUtil)

- 1.6.11 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.6.10 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.6.9 -- 2021-03-05

    - update README.md, add install alternative

- 1.6.8 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.6.7 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.6.6 -- 2021-02-23

    - Update dependencies

- 1.6.5 -- 2021-01-29

    - remove LightLingStandardServiceHelper class
  
- 1.6.4 -- 2021-01-26

    - add LightLingStandardService02 class
  
- 1.6.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.6.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.6.1 -- 2020-08-07

    - moved "Ling Standard Service Kit Admin Plugin" to lka
    
- 1.6.0 -- 2020-08-07

    - update LightLingStandardServiceKitAdminPlugin, now implements LightRealistCustomServiceInterface
    
- 1.5.0 -- 2020-07-31

    - fix LightLingStandardServiceKitAdminPlugin install/uninstall procedure adding/removing wrong permission bindings
    
- 1.4.0 -- 2020-07-30

    - add LightLingStandardServiceHelper class
    
- 1.3.1 -- 2020-07-30

    - fix LightLingStandardServiceKitAdminPlugin not giving the user permission to the lka admin permission group
    
- 1.3.0 -- 2020-07-30

    - add LightLingStandardServiceKitAdminPlugin class
    
- 1.2.2 -- 2020-07-30

    - update conception notes, fix typo
    
- 1.2.1 -- 2020-07-30

    - update conception notes
    
- 1.2.0 -- 2020-07-28

    - update LightLingStandardService01, now only install/uninstall if user_database service is available
    
- 1.1.1 -- 2020-07-28

    - update documentation
    
- 1.1.0 -- 2020-07-28

    - update LightLingStandardService01, now really implements PluginInstallerInterface (first commit was a sketch), and fix doc
    
- 1.0.0 -- 2020-07-28

    - initial commit