Task details
=============
2020-07-09 -> 2020-07-31






- Database
    - [Synchronize db](#synchronize-db)
    - [Add standard permissions](#add-standard-permissions)
- Generators
    - [Generate breeze api](#generate-breeze-api)
    - [Generate Light_Kit_Admin plugin](#generate-light_kit_admin-plugin)
- ServiceClass
    - [Add getFactory method](#add-getfactory-method)
    - [Add logDebug method](#add-logdebug-method)
    - [Create service process](#create-service-process)
    - [Create lss01 service process](#create-lss01-service-process)
- ServiceConfig
    - [Add plugin_installer hook](#add-plugin_installer-hook)

- Service
    - [Remove service](#remove-service)
    - [Disable service](#disable-service)
    - [Enable service](#enable-service)





Add logDebug method
-----------
2020-07-20 -> 2020-07-23


This task implements the [logDebug method convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method).


- in the **service class**, add a **logDebug** method if it doesn't have it already.

    The service class must be a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service)
    otherwise this task won't work properly. In particular, make sure the service has the options property and setOptions method before
    you run this task.
    
- in the **service config file**, add the **useDebug** option if it's not already defined. It uses the service's setOptions method call to achieve that    
- in the **service config file**, add the hook, if it doesn't exist already, to the [logger service](https://github.com/lingtalfi/Light_Logger), with a channel of **$serviceName.debug**, 
    and which writes to the file **$appDir/log/$serviceName_debug.txt**    



Add getFactory method
-----------
2020-07-21


This task implements the [getFactory method convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#getfactory-method).



Add plugin_installer hook
-----------
2020-07-30


This task adds a hook to the [plugin_installer service](https://github.com/lingtalfi/Light_PluginInstaller) in the config file.

Prerequisites: the service config file must exist.

Note: you can use tasks such as [Create service process](#create-service-process) to create the config file if you don't have one already. 







Add standard permissions
-----------
2020-07-09

Adds [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) for the given planet.




Create service process
----------
2020-07-09



We create a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) structure.
The files are only created if they don't exist.




Create lss01 service process
----------
2020-07-28 -> 2020-07-30



We create a [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service) structure.

We extend the [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/pages/conception-notes.md#ling-standard-service-01) class if possible (i.e. if your
class doesn't already extend another class).

Note that the lss01 class already implements the [logDebug method convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method) by itself.

We implement the [getFactory method convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#getfactory-method).

In the config file, we register to the [plugin_installer service](https://github.com/lingtalfi/Light_PluginInstaller).


The files are only created if they don't exist.




Generate breeze api
----------
2020-07-09


We create the breeze api for the given planet.
The generator used is the [LingBreezeGenerator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md).

All the classes will be generated in the **Api** directory at the root of your planet directory.



Generate Light_Kit_Admin plugin
----------
2020-07-09 -> 2020-07-30


We create a light kit admin plugin for your planet, using the [Light_Kit_Admin_Generator](https://github.com/lingtalfi/Light_Kit_Admin_Generator) and our own tools.

This only works if you have a [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md).


If your [planet identifier](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#planet-identifier) is **Ling/Light_MyPlanet**, and you have only one table named **mpl_bottles**, then the following will be created:


```txt
- $appDir/
----- config/
--------- data/
------------- Light_Kit_Admin_MyPlanet/
----------------- bmenu/
--------------------- generated/
------------------------- kit_admin_my_planet.admin_mainmenu_1.byml
----------------- kit/
--------------------- zeroadmin/
------------------------- generated/
----------------------------- mpl_bottles_form.byml
----------------------------- mpl_bottles_list.byml
----------------- Light_ChloroformExtension/
--------------------- generated/
------------------------- kit_admin_my_planet.table_list.byml
----------------- Light_Kit_Admin/
--------------------- lka-options.generated.byml
----------------- Light_Kit_Admin_Generator/
--------------------- kit_admin_my_planet.generated.byml
----------------- Light_MicroPermission/
--------------------- kit_admin_my_planet.profile.generated.byml
----------------- Light_RealForm/
--------------------- generated/
------------------------- mpl_bottles.byml
----------------- Light_Realist/
--------------------- generated/
------------------------- mpl_bottles.byml
--------- services/
------------- Light_Kit_Admin_MyPlanet.byml
----- universe/
--------- Ling/
------------- Light_Kit_Admin_MyPlanet/
----------------- Controller/
--------------------- Generated/
------------------------- Base/
----------------------------- RealGenController.php
------------------------- MplBottlesController.php
----------------- ControllerHub/
--------------------- Generated/
------------------------- LightKitAdminMyPlanetControllerHub.php
----------------- LightKitAdminPlugin/
--------------------- Generated/
------------------------- LightKitAdminMyPlanetLkaPlugin.php
```


We also create the service class file, if it's not already created, and make it extend the [Ling Standard Service Kit Admin Plugin](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/pages/conception-notes.md#ling-standard-service-kit-admin-plugin) class
if possible (i.e. if it doesn't extend another class already).


In addition to that, we automatically register the plugin to the [PluginInstaller service](https://github.com/lingtalfi/Light_PluginInstaller).


We also bind the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) of the plugin, if any, to the corresponding **lka permission groups**. 






Synchronize db 
--------
2020-07-09


We synchronize the current db with your [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md), using the
[Light_DbSynchronizer](https://github.com/lingtalfi/Light_DbSynchronizer/) plugin under the hood.




Remove service
-------------
2020-07-30 -> 2020-07-31


Be careful, for this task can be very destructive.

Well, to avoid accidents, this task always backs up whats deleted in a cache directory in **/tmp/Light_DeveloperWizard/RemoveServiceProcess-backup**, just in case.




This task removes every file listed below (except for the $appDir):


- $appDir/
----- config/data/$pluginName/
----- config/services/$pluginName.byml
----- config/services/$pluginName.byml.dis
----- templates/$pluginName/
----- universe/$galaxy/$pluginName/
----- www/plugins/$pluginName/





Disable service
-------------
2020-07-31


This task renames the service config file by adding the ".dis" extension to it, effectively disabling the service.

So for instance:

- $appDir/config/services/$pluginName.byml


becomes

- $appDir/config/services/$pluginName.byml.dis



Enable service
-------------
2020-07-31


This task renames the service config file by removing the ".dis" extension if any, effectively re-enabling the service.

So for instance:

- $appDir/config/services/$pluginName.byml.dis


becomes

- $appDir/config/services/$pluginName.byml



