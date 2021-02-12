Light_PluginInstaller
===========
2020-02-07 -> 2021-02-11

A plugin installer service for [Light](https://github.com/lingtalfi/Light) applications.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/Light_PluginInstaller
```

Or just download it and place it where you want otherwise.






Summary
===========

- [Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md) (
  generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md)
- [Services](#services)

Services
=========


This plugin provides the following services:

- plugin_installer (returns a LightPluginInstallerService instance)

Here is an example of the service configuration:

```yaml
plugin_installer:
    instance: Ling\Light_PluginInstaller\Service\LightPluginInstallerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: false      # default is false
                useCache: true     # default is true


# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -   method: addListener
        args:
            channels: plugin_installer.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/plugin_installer_debug.txt

```

History Log
=============

- 2.0.12 -- 2021-02-11

    - fix lpi-deps.byml still having dependency to Light_DbSynchronizer   
  
- 2.0.11 -- 2021-02-11

    - remove dependency with Light_DbSynchronizer planet  
  
- 2.0.10 -- 2021-02-11

    - remove dependency with Light_Database planet  
  
- 2.0.9 -- 2021-02-11

    - remove LightBasePluginInstaller class (moved to Ling.Light_UserDatabase planet)  
  
- 2.0.8 -- 2021-02-02

    - add LightPluginInstallerService->addOutputLevel method  
  
- 2.0.7 -- 2021-01-29

    - redesign output display of install/uninstall methods 
    - update LightBasePluginInstaller, add default Ling.Light_UserDatabase dependency  
  
- 2.0.6 -- 2021-01-29

    - fix service's install and uninstall method counter increment not incrementing 
  
- 2.0.5 -- 2021-01-28

    - update LightBasePluginInstaller, add getTableScope default implementation
  
- 2.0.4 -- 2021-01-28

    - fix some service messages not having carriage return

- 2.0.3 -- 2021-01-28

    - fix various bugs
  
- 2.0.2 -- 2021-01-26

    - add service->setOutput method
  
- 2.0.1 -- 2021-01-26

    - add service->isInstallable method

- 2.0.0 -- 2021-01-25

    - refactored whole api

- 1.8.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.8.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.8.0 -- 2020-07-31

    - add LightPluginInstallerService->isRegistered method

- 1.7.0 -- 2020-07-31

    - update LightPluginInstallerService.uninstallStrictMode property now defaults to true

- 1.6.0 -- 2020-07-30

    - add LightPluginInstallerService->removeCacheEntry method

- 1.5.0 -- 2020-07-30

    - add LightPluginInstallerService->pluginHasCacheEntry method

- 1.4.1 -- 2020-07-21

    - update conception notes

- 1.4.0 -- 2020-06-23

    - update install concept, now has two phases
    - add PluginInstallerInterface->isInstalled
    - update the service, add useDebug and useCache options, add synchronizeByCreateFile method

- 1.3.0 -- 2020-03-03

    - update LightPluginInstallerService, add $uninstallStrictMode property

- 1.2.0 -- 2020-02-25

    - update LightPluginInstallerService->fetchRowColumn, add throwEx argument

- 1.1.0 -- 2020-02-25

    - add LightPluginInstallerService->fetchRowColumn method

- 1.0.0 -- 2020-02-07

    - initial commit