Light_PluginDatabaseInstaller
===========
2019-09-11



A [light](https://github.com/lingtalfi/Light) service to help plugin install their database part.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
        setAppDir:
            dir: ${app_dir}
        setForceInstall:
            bool: false






```








History Log
=============

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