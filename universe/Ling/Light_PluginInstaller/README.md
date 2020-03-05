Light_PluginInstaller
===========
2020-02-07 -> 2020-03-03



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
- [Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
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
        setRootDir:
            dir: ${app_dir}/config/data/Light_PluginInstaller


# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.initialize_1
            listener:
                instance: @service(plugin_installer)
                callable_method: onInitialize




```





History Log
=============

- 1.3.0 -- 2020-03-03

    - update LightPluginInstallerService, add $uninstallStrictMode property

- 1.2.0 -- 2020-02-25

    - update LightPluginInstallerService->fetchRowColumn, add throwEx argument
    
- 1.1.0 -- 2020-02-25

    - add LightPluginInstallerService->fetchRowColumn method
    
- 1.0.0 -- 2020-02-07

    - initial commit