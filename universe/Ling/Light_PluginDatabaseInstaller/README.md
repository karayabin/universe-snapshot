Light_PluginDatabaseInstaller
===========
2019-09-11 -> 2021-03-05



Deprecation notice
======
Warning: this plugin is now deprecated in favour of the better [Light_PluginInstaller](https://github.com/lingtalfi/Light_PluginInstaller) plugin




Overview
======
A [light](https://github.com/lingtalfi/Light) service to help plugin install their database part.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_PluginDatabaseInstaller
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_PluginDatabaseInstaller
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_PluginDatabaseInstaller api](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/pages/conception-notes.md)
    - [Events](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/pages/events.md)

- [Services](#services)





Services
=========


This plugin provides the following services:

- plugin_database_installer



Here is the content of the service configuration file:

```yaml
plugin_database_installer:
    instance: Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService
    methods:
        setContainer:
            container: @container()
        setAppDir:
            dir: ${app_dir}
        setForceInstall:
            bool: false


```








History Log
=============

- 1.6.8 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.6.7 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.6.6 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.6.5 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.6.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.6.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.6.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.6.1 -- 2020-02-07

    - add deprecation notice
    
- 1.6.0 -- 2020-02-06

    - add LightPluginDatabaseInstallerService->getRegisteredPluginNames method
    
- 1.5.0 -- 2020-02-06

    - add Light_PluginDatabaseInstaller.on_uninstall_before event
    
- 1.4.0 -- 2020-01-31

    - update to fix LightPluginDatabaseInstallerService->uninstallAll method not taking into account the order of dependencies
    
- 1.3.0 -- 2019-10-03

    - add careless LightPluginDatabaseInstallerService->uninstallAll implementation, the dependency part
    
- 1.2.0 -- 2019-09-18

    - add LightPluginDatabaseInstallerService->forceInstall property
    
- 1.1.2 -- 2019-09-11

    - fix bad service initialization
    
- 1.1.1 -- 2019-09-11

    - update conception notes
    
- 1.1.0 -- 2019-09-11

    - update LightPluginDatabaseInstallerService->registerInstaller method, now accepts callables
    
- 1.0.0 -- 2019-09-11

    - initial commit