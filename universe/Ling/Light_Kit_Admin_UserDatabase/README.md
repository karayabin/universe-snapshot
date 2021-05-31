Light_Kit_Admin_UserDatabase
===========
2020-06-25 -> 2021-05-31


This is a work in progress until version 1.


An integration of [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase) in  [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin). 


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_UserDatabase
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserDatabase
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserDatabase api](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_user_database: 
    instance: Ling\Light_Kit_Admin_UserDatabase\Service\LightKitAdminUserDatabaseService
    methods: 
        setContainer: 
            container: @container()
        
    

# --------------------------------------
# hooks
# --------------------------------------
$micro_permission.methods_collection: 
    - 
        method: registerMicroPermissionsByProfile
        args: 
            file: ${app_dir}/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_MicroPermission/kit_admin_user_database.profile.generated.byml
        
    

$kit_admin.methods_collection: 
    - 
        method: registerPlugin
        args: 
            pluginName: Light_Kit_Admin_UserDatabase
            plugin: 
                instance: Ling\Light_Kit_Admin_UserDatabase\LightKitAdminPlugin\Generated\LightKitAdminUserDatabaseLkaPlugin
                methods: 
                    setOptionsFile: 
                        file: ${app_dir}/config/data/Ling.Light_Kit_Admin_UserDatabase/Ling.Light_Kit_Admin/lka-options.generated.byml
                    
                
            
        
    
    
```



History Log
=============


- 0.5.19 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 0.5.18 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0
  
- 0.5.17 -- 2021-05-11

    - Update deps (by CommitWizard).

- 0.5.16 -- 2021-05-11

    - Update dependencies to Ling.Light_EasyRoute (pushed by SubscribersUtil)

- 0.5.15 -- 2021-03-23

    - adapt api to Ling.Light_Realist:2.0.15

- 0.5.14 -- 2021-03-18

    - fix bmenus items not prefixed with galaxy
  
- 0.5.13 -- 2021-03-18

    - update planet to adapt Ling.Light_BMenu:2.0.0
  
- 0.5.12 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 0.5.11 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 0.5.10 -- 2021-03-05

    - update README.md, add install alternative

- 0.5.9 -- 2021-02-23

  - switch to Light_EasyRoute open registration system

- 0.5.8 -- 2021-02-19

    - upgrade dependencies

- 0.5.7 -- 2021-01-29

    - update LightKitAdminUserDatabasePluginInstaller to use the default methods
  
- 0.5.6 -- 2021-01-29

    - adapt to work with new Light_PluginInstaller api
  
- 0.5.5 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 0.5.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 0.5.3 -- 2020-12-01

    - update to accommodate latest Light_ControllerHub api
    
- 0.5.2 -- 2020-11-27

    - update to accommodate latest Light_Kit api
    
- 0.5.1 -- 2020-11-26

    - update api to acknowledge use of Light_Nugget, and new Light_UserData api
    
- 0.5.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 0.4.0 -- 2020-08-21

    - update service to work with micro-permission3
    
- 0.3.0 -- 2020-08-07

    - update LightKitAdminUserDatabaseService, now use realform late registration
    
- 0.2.0 -- 2020-08-07

    - update LightKitAdminUserDatabaseService, now use realist late registration

- 0.1.0 -- 2020-06-25

    - initial commit