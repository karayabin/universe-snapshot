Task details
=============
2020-07-09 -> 2020-12-01






- Database
    - [Synchronize db](#synchronize-db)
    - [Add standard permissions](#add-standard-permissions)
- Generators
    - [Generate breeze api](#generate-breeze-api)
    - [Generate breeze config](#generate-breeze-config)
    - [Execute the lka generator config file](#execute-the-lka-generator-config-file)
- Light_Kit_Admin
    - [Create lka generator config](#create-lka-generator-config)
    - [Create lka planet](#create-lka-planet)
    - [Generate Light_Kit_Admin plugin](#generate-light_kit_admin-plugin)
    - [Create the lka user main page with helloWorld](#create-the-lka-user-main-page)
    - [Create the lka user main page with basicList](#create-the-lka-user-main-page-with-basiclist)
- Planet
    - [Remove planet](#remove-planet)
    - [Create conception notes](#create-conception-notes)
- ServiceClass
    - [Add getFactory method](#add-getfactory-method)
    - [Add logDebug method](#add-logdebug-method)
    - [Create service process](#create-service-process)
    - [Create lss01 service process](#create-lss01-service-process)
- ServiceConfig
    - [Add plugin_installer hook](#add-plugin_installer-hook)
    - [Sort hooks alphabetically](#sort-hooks-alphabetically)

- Service
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



Create lka generator config
----------
2020-11-12


Creates a [Light_Kit_Admin_Generator](https://github.com/lingtalfi/Light_Kit_Admin_Generator) config file for the current planet, which name must start with the **Light_Kit_Admin_** prefix.

See an [example of lka generator config file](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md).




Create lka planet
----------
2020-08-04

Creates the corresponding [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) planet.

Pre-requisites:

- your planet name must start with the **Light_** prefix
- your planet should contain a [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md);
    this is used to generate the **lka generator config file** (the Light_Kit_Admin plugin doesn't have a **create file** of its own, but uses the one from
    the planet it originates from instead)



For instance, if your planet name is Light_XXX, the Light_Kit_Admin_XXX planet will be created.

We generate the service class file, the service config file, and the lka generator config file.


Note that this task generates only a basic shell, but usually you want to launch the [execute lka generator](#execute-the-lka-generator-config-file) task after, in order
to make the plugin useful.



The generated files are:

```txt
- $appDir/
----- config/
--------- data/
------------- Light_Kit_Admin_MyPlanet/
----------------- Light_Kit_Admin_Generator/
--------------------- kit_admin_my_planet.generated.byml
--------- services/
------------- Light_Kit_Admin_MyPlanet.byml
----- universe/
--------- Ling/
------------- Light_Kit_Admin_MyPlanet/
----------------- Service/
--------------------- LightKitAdminMyPlanetService.php
```



The service configuration file will contain a hook to the [plugin_installer service](https://github.com/lingtalfi/Light_PluginInstaller), like this:


```yaml
$plugin_installer.methods_collection:
    -
        method: registerPlugin
        args:
            plugin: Light_Kit_Admin_XXX
            installer: @service(kit_admin_xxx)
```




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




Execute the lka generator config file
----------
2020-08-03 -> 2020-09-04


Pre-requisites:

- the planet name must start with the **Light_Kit_Admin_** prefix



Executes the lka generator config file for the planet, using the [Light_Kit_Admin_Generator plugin](https://github.com/lingtalfi/Light_Kit_Admin_Generator).



If the [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md) was found, the following actions will also be performed:


- create the extra files (i.e. not created already by the lka generator) required to make the plugin work
- bind (if possible) the origin planet permissions to the Light_Kit_Admin.admin/user permission groups, as recommended in the [lka permissions documentation](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/permissions.md#plugin-authors-the-light_kit_admin-permission-philosophy)
- add the necessary hooks in the service config file, depending on the lka generator config




The executed config file's is the first one found in the following locations:


- $appDir/config/data/$planetName/Light_Kit_Admin_Generator/$serviceName.byml 
- $appDir/config/data/$planetName/Light_Kit_Admin_Generator/$serviceName.generated.byml


Note: to create the generated config file version, you can use the [Generate Light_Kit_Admin generator config file](#generate-light_kit_admin-generator-config-file) task.

 


Details about the generation process.
Executing the lka generator alone can generate at most those files:


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
----------------- Light_RealForm/
--------------------- form/
------------------------- generated/
----------------------------- mpl_bottles.byml
----------------- Light_Realist/
--------------------- list/
------------------------- generated/
----------------------------- mpl_bottles.byml
----- universe/
--------- Ling/
------------- Light_Kit_Admin_MyPlanet/
----------------- Controller/                                
--------------------- Generated/
------------------------- Base/
----------------------------- RealGenController.php
------------------------- MplBottlesController.php
``` 

Which files are generated precisely depends on your **lka generator config**, especially the following options:

- use_list  
- use_form  
- use_menu  
- use_controller


At this point, half the work is done, but we still need to generate some files.
So our task will create at most all the following, depending on the **lka generator config**:


```txt
- $appDir/
----- config/
--------- data/
------------- Light_Kit_Admin_MyPlanet/
----------------- Light_Kit_Admin/
--------------------- lka-options.generated.byml
----------------- Light_MicroPermission/
--------------------- kit_admin_my_planet.profile.generated.byml
----- universe/
--------- Ling/
------------- Light_Kit_Admin_MyPlanet/
----------------- ControllerHub/
--------------------- Generated/
------------------------- LightKitAdminMyPlanetControllerHub.php
----------------- LightKitAdminPlugin/
--------------------- Generated/
------------------------- LightKitAdminMyPlanetLkaPlugin.php
```
  

In details:

- the **lka-options.generated.byml** file is generated if **use_form** is true:
- the **Light_MicroPermission** is always generated
- the **ControllerHub** is generated if **use_controller** is true
- the **LightKitAdminPlugin** is always generated



Assumptions (@developer):

This task assumes that a few properties exist in the lka generator config file, in order to work properly:

- variables.tables should be defined
- variables.galaxyName must be defined
- create_file must be defined, otherwise only the lka generator will be executed, but none of the aforementioned extra work will be done




For the service hooks details, the following hooks are potentially added:

```yaml
$bmenu.methods_collection:
    -
        method: addDefaultItemByFile
        args:
            menu_type: admin_main_menu
            file: ${app_dir}/config/data/Light_Kit_Admin_XXX/bmenu/generated/kit_admin_xxx.admin_mainmenu_1.byml

$chloroform_extension.methods_collection:
    -
        method: registerTableListConfigurationHandler
        args:
            plugin: Light_Kit_Admin_XXX
            handler:
                instance: Ling\Light_Kit_Admin\ChloroformExtension\LightKitAdminTableListConfigurationHandler
                methods:
                    setConfigurationFile:
                        files:
                            - ${app_dir}/config/data/Light_Kit_Admin_XXX/Light_ChloroformExtension/generated/kit_admin_xxx.table_list.byml



$controller_hub.methods_collection:
    -
        method: registerHandler
        args:
            plugin: Light_Kit_Admin_XXX
            handler:
                instance: Ling\Light_Kit_Admin_XXX\ControllerHub\Generated\LightKitAdminXXXControllerHubHandler
                methods:
                    setContainer:
                        container: @container()

$crud.methods_collection:
    -
        method: registerHandler
        args:
            pluginId: Light_Kit_Admin_XXX
            handler:
                instance: Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler

$kit_admin.methods_collection:
    -
        method: registerPlugin
        args:
            pluginName: Light_Kit_Admin_XXX
            plugin:
                instance: Ling\Light_Kit_Admin_XXX\LightKitAdminPlugin\Generated\LightKitAdminXXXLkaPlugin
                methods:
                    setOptionsFile:
                        file: ${app_dir}/config/data/Light_Kit_Admin_XXX/Light_Kit_Admin/lka-options.generated.byml

$micro_permission.methods_collection:
    -
        method: registerMicroPermissionsByProfile
        args:
            file: ${app_dir}/config/data/Light_Kit_Admin_XXX/Light_MicroPermission/kit_admin_xxx.profile.generated.byml



$realform.methods_collection:
    -
        method: registerFormHandler
        args:
            plugin: Light_Kit_Admin_XXX
            handler:
                instance: Ling\Light_Kit_Admin\Realform\Handler\LightKitAdminRealformHandler
                methods:
                    setConfDir:
                        dir: ${app_dir}/config/data/Light_Kit_Admin_XXX/Light_Realform

                
                
```


Those hooks are added depending on the **lka generator config** properties:

- bmenu hook is added if **use_menu** is true 
- chloroform_extension hook is added if **use_form** is true 
- controller_hub hook is added if **use_controller** is true 
- crud hook is added if **use_form** is true
- kit_admin hook is added if **use_form** is true
- micro_permission hook is always added  
- realform hook is added if **use_form** is true








Generate breeze api
----------
2020-07-09


We create the breeze api for the given planet.
The generator used is the [LingBreezeGenerator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md).

All the classes will be generated in the **Api** directory at the root of your planet directory.



Generate breeze config
-----------
2020-11-12


Generates the [breeze config file](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md#configuration) for the current planet.



Generate Light_Kit_Admin plugin
----------
2020-07-09 -> 2020-08-04


This task has been divided into two sub-tasks, to make the workflow more flexible.
You can execute them in order to get the desired effect.



- [Create lka planet](#create-lka-planet)
- [Executes the lka generator config file](#execute-the-lka-generator-config-file)






Synchronize db 
--------
2020-07-09


We synchronize the current db with your [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md), using the
[Light_DbSynchronizer](https://github.com/lingtalfi/Light_DbSynchronizer/) plugin under the hood.




Remove planet
-------------
2020-08-04 -> 2020-08-14


Removes a light planet and all related files.

Be careful, for this task can be very destructive.

Well, to avoid accidents, this task always backs up what is deleted in a cache directory in **/tmp/Light_DeveloperWizard/RemovePlanetProcess-backup**, just in case.




This task removes every file listed below (except for the $appDir):



```txt
- $appDir/
----- config/data/$pluginName/
----- config/services/$pluginName.byml
----- config/services/$pluginName.byml.dis
----- templates/$pluginName/
----- templates/Light_Mailer/$pluginName/
----- universe/$galaxy/$pluginName/
----- www/libs/universe/$galaxy/$pluginName/
----- www/plugins/$pluginName/
```


If the removed service class was registered to the [plugin_installer](https://github.com/lingtalfi/Light_PluginInstaller) service,
then the uninstall method will be called before the class file is removed. 



Create conception notes
-------------
2020-12-01


Creates the conception notes, using my own conventions, which is basically putting the file here:

- $app/universe/$planetIdentifier/personal/mydoc/pages/conception-notes.md


With:

- $planetIdentifier: the [planet identifier](https://github.com/karayabin/universe-snapshot#the-planet-identifier)






Remove service
-------------
2020-07-30 -> 2020-08-04

Alias for [remove planet](#remove-planet)



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




Sort hooks alphabetically
------------
2020-08-06



Prerequisites:

- the service config file must exist


This tasks sorts the hooks found of the config file, in an alphabetical ascending order. 





Create the lka user main page
-----------
2020-08-10 -> 2020-08-18


Prerequisites:
- the plugin name must start with the **Light_Kit_Admin_** prefix



This task will create a controller in (only if the file doesn't exist yet):

- {app}/universe/{galaxy}/{pluginName}/Controller/Custom/{tightName}UserMainPageController.php


Will create a kit widget config nugget in (using a HelloWorldWidget):

- {app}/config/data/{pluginName}/kit/zeroadmin/generated/{serviceName}_mainpage.byml


Will create a bmenu config nugget in:

- {app}/config/data/{pluginName}/bmenu/generated/{serviceName}.admin_mainmenu-usermainpage.byml


Will update the service config file to update the bmenu, in:

- {app}/config/services/{pluginName}.byml






With:

- app: the path to the application directory 
- galaxy: the name of the galaxy containing the plugin 
- pluginName: the name of the plugin 
- tightName: the [tightName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name) of the plugin
- serviceName: the name of the service
 
 
 
Note: it's assumed that the zeroadmin theme of lka will be used, with a parent layout variable
of: **Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base**.
 
 
 

Create the lka user main page with basicList
-----------
2020-08-18



Prerequisites:
- the plugin name must start with the **Light_Kit_Admin_** prefix
- the origin planet (i.e. remove _Kit_Admin from the lka planet name) must contain a [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)



Basically the same as the [Create the lka user main page](#create-the-lka-user-main-page) task, but with a couple of differences:

- in the created controller, the render method content is different
    Note: if a render method already exists, this task will add the new render method below it, and commented (i.e.
    you will have to manually uncomment it to make it effective).
    

In addition to that, the following steps are also executed:

- create [Light_Realist](https://github.com/lingtalfi/Light_Realist/) config nugget in:
    - {app}/config/data/{pluginName}/Light_Realist/custom/{serviceName}_mainpage.byml
    This nugget will contain the realist nugget for the first table defined in the create file. 


