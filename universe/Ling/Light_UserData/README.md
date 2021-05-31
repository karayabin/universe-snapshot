Light_UserData
===========
2019-09-27 -> 2021-05-31








A light service to manage user assets.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_UserData
```

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
    - [Permissions](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/permissions.md)
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
#        setObfuscationParams:
#            algo: default
#            secret: P0zeg7e,4dD
        setRootDir:
            dir: ${app_dir}/user-data



# --------------------------------------
# hooks
# --------------------------------------
$ajax_handler.methods_collection:
    -
        method: registerHandler
        args:
            id: Light_UserData
            handler:
                instance: Ling\Light_UserData\AjaxHandler\LightUserDataAjaxHandler


$breeze_generator.methods_collection:
    -
        method: addConfigurationEntryByFile
        args:
            key: luda
            file: ${app_dir}/config/data/Ling.Light_UserData/Ling.Light_BreezeGenerator/luda.byml


$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Ling.Light_UserData/Ling.Light_EasyRoute/luda_routes.byml


$events.methods_collection:
    -
        method: registerListener
        args:
            events: Ling.Light_Database.on_lud_user_group_create
            listener:
                instance: @service(user_data)
                callable_method: onUserGroupCreate


$realform_handler_alias_helper.methods_collection:
    -
        method: registerRealformHandlerAliasHelper
        args:
            plugin: Light_UserData
            helper:
                instance: Ling\Light_UserData\Realform\RealformHandlerAliasHelper\LightUserDataRealformHandlerAliasHelper










```





History Log
=============

- 1.19.20 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.19.19 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0
  
- 1.19.18 -- 2021-05-11

    - Update deps (by CommitWizard).

- 1.19.17 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.19.16 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.19.15 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.19.14 -- 2021-03-22

    - adapt api to work with Ling.Light_Events:1.10.0
  
- 1.19.13 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.19.12 -- 2021-03-05

    - update README.md, add install alternative

- 1.19.11 -- 2021-02-19

    - upgrade dependencies

- 1.19.10 -- 2021-02-15

  - update plugin installer, now uses latest uninstall technique
  
- 1.19.9 -- 2021-02-11

  - update api, plugin installer now extends LightUserDatabaseBasePluginInstaller
  
- 1.19.8 -- 2021-01-29

    - update LightUserDataPluginInstaller, enhance install/uninstall debug messages
  
- 1.19.7 -- 2021-01-28

    - adapt api to work with new Light_PluginInstaller api
  
- 1.19.6 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.19.5 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.19.4 -- 2020-11-20

    - update service to acknowledge new Light_SimpleHttpServer repository (old name was Light_HttpError)
    
- 1.19.3 -- 2020-11-12

    - add service->listByDirectory method
    
- 1.19.2 -- 2020-11-12

    - clean service, remove obsolete classes
    
- 1.19.1 -- 2020-11-10

    - update service, add getWebAccessServiceUrl method
    
- 1.19.0 -- 2020-11-09

    - update service, use new resource/file concept, removed virtual file server in favor of real file server
    
- 1.18.1 -- 2020-08-31

    - fix LightUserDataService->list returning hidden files
    
- 1.18.0 -- 2020-06-23

    - update service for new Light_PluginInstaller interface

- 1.17.0 -- 2020-06-04

    - add virtual machine concept and implementation
    
- 1.16.0 -- 2020-03-06

    - remove LightUserDataRowRestrictionHandler  
    
- 1.15.0 -- 2020-03-05

    - add LightUserDataRowRestrictionHandler class
    
- 1.14.0 -- 2020-02-25

    - add Light_UserDataService->getFactory method
    
- 1.13.0 -- 2020-02-25

    - add Light_UserData.user permission
    
- 1.12.1 -- 2020-02-24

    - update LightUserDataService->list, remove debug stop
    
- 1.12.0 -- 2020-02-21

    - handling fileEditor protocol
    
- 1.11.0 -- 2019-12-20

    - update LightUserDataService, implemented Light_UserData.Light_UserData_MSC_10 option 
    
- 1.10.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0
    
- 1.9.1 -- 2019-12-17

    - fix functional typo in service configuration
    
- 1.9.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system

- 1.8.0 -- 2019-11-19

    - update plugin to accommodate renamed Light_ReverseRouter service 
    
- 1.7.2 -- 2019-11-07

    - fix LightUserData2SvpDataTransformer->transform validating non 2svp files
    
- 1.7.1 -- 2019-11-05

    - fix LightUserDataService->list not returning an empty array if the dir does not exist 
    
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