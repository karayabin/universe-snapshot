Light_Kit_Admin_LoginNotifier
===========
2020-11-30 -> 2021-01-29



A port of the [Light_LoginNotifier](https://github.com/lingtalfi/Light_LoginNotifier) plugin for the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) environment.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_LoginNotifier
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_LoginNotifier api](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_login_notifier: 
    instance: Ling\Light_Kit_Admin_LoginNotifier\Service\LightKitAdminLoginNotifierService
    methods: 
        setContainer: 
            container: @container()
        
    

# --------------------------------------
# hooks
# --------------------------------------        
    

$bmenu.methods_collection: 
    - 
        method: addDirectItemsByFileAndParentPath
        args: 
            menu_type: admin_main_menu
            file: ${app_dir}/config/data/Light_Kit_Admin_LoginNotifier/bmenu/generated/kit_admin_login_notifier.admin_mainmenu_1.byml
            path: lka-admin
        
    

        
    

$kit_admin.methods_collection: 
    - 
        method: registerPlugin
        args: 
            pluginName: Light_Kit_Admin_LoginNotifier
            plugin: 
                instance: Ling\Light_Kit_Admin_LoginNotifier\LightKitAdminPlugin\Generated\LightKitAdminLoginNotifierLkaPlugin
                methods: 
                    setOptionsFile: 
                        file: ${app_dir}/config/data/Light_Kit_Admin_LoginNotifier/Light_Kit_Admin/lka-options.generated.byml
                    
                
            
        
    

$micro_permission.methods_collection: 
    - 
        method: registerMicroPermissionsByProfile
        args: 
            file: ${app_dir}/config/data/Light_Kit_Admin_LoginNotifier/Light_MicroPermission/kit_admin_login_notifier.profile.generated.byml
        
    

```



History Log
=============

- 1.0.5 -- 2021-01-29

    - adapt to work with new Light_PluginInstaller api
  
- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2020-12-01

    - update plugin to accommodate latest Light_ControllerHub api
    
- 1.0.1 -- 2020-11-30

    - add docTool generated doc
    
- 1.0.0 -- 2020-11-30

    - initial commit