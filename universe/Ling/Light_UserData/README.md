Light_UserData
===========
2019-09-27



A light service to manage user assets.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserData
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- user_data (returns a LightUserDataService instance)


Here is an example of the service configuration:

```yaml
user_data:
    instance: Ling\Light_UserData\Service\LightUserDataService
    methods:
        setContainer:
            container: @container()
        setObfuscationParams:
            algo: default
            secret: P0zeg7e,4dD
        setRootDir:
            dir: ${app_dir}/user-data
        setMicroPermissionPlugin:
            plugin: ${user_data_vars.micro_permission_plugin}


user_data_vars:
    install_parent_plugin: Light_UserDatabase
    micro_permission_plugin: Light_UserDatabase

# --------------------------------------
# hooks
# --------------------------------------
$breeze_generator.methods_collection:
    -
        method: addConfigurationEntryByFile
        args:
            key: luda
            file: ${app_dir}/config/data/Light_UserData/Light_BreezeGenerator/luda.byml


$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_UserData/Light_EasyRoute/luda_routes.byml

$initializer.methods_collection:
    -
        method: registerInitializer
        args:
            initializer: @service(user_data)
            slot: install
            parent: ${user_data_vars.install_parent_plugin}


$plugin_database_installer.methods_collection:
    -
        method: registerInstaller
        args:
            plugin: Light_UserData
            installer:
                -
                    - @service(user_data)
                    - installDatabase
                -
                    - @service(user_data)
                    - uninstallDatabase


```





History Log
=============

- 1.7.0 -- 2019-10-31

    - updated configuration and api with new breeze generator's micro permission implementation, and allow for delegation of the micro permission handler. 
    
- 1.6.0 -- 2019-10-30

    - updated configuration and api with new breeze generator's micro permission implementation
    
- 1.5.0 -- 2019-10-23

    - implemented second part of 2svp system  
    
- 1.4.1 -- 2019-10-21

    - update LightUserDataService->getResourceUrl, now also returns a random parameter to force the browser to download the image  
    
- 1.4.0 -- 2019-10-21

    - add ValidUserDataUrlValidator class 
    
- 1.3.1 -- 2019-10-21

    - fix route not registered as ajax 
    
- 1.3.0 -- 2019-10-17

    - updated LightUserDataService->save now returns the url to the saved resource 
    

- 1.2.0 -- 2019-10-17

    - rename LightUserDataService->getResourceLink to getResourceUrl 
    
- 1.1.0 -- 2019-10-17

    - add controller and route
    
- 1.0.0 -- 2019-09-27

    - initial commit