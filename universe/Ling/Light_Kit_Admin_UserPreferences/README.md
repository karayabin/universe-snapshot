Light_Kit_Admin_UserPreferences
===========
2020-08-13 -> 2021-01-29



A [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) wrapper for the [Light_UserPreferences](https://github.com/lingtalfi/Light_UserPreferences) service.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserPreferences
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserPreferences api](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Our gui](#our-gui)
- [Services](#services)





Our gui
===========
2020-08-13


We provide the following pages (using the [zeroadmin theme](https://www.templatemonster.com/admin-templates/zero-admin-template-82792.html)):

- for the user, a user preferences page, where the user can update his/her preferences
- for the admin, a user admin list/form, to edit the raw values



### The user preferences page

![The user preferences page](https://lingtalfi.com/img/universe/Light_Kit_Admin_UserPreferences/lka-user_preferences-user-mainpage.png)


### The admin list

![the admin list](https://lingtalfi.com/img/universe/Light_Kit_Admin_UserPreferences/lka-user_preferences-admin-list.png)










Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_user_preferences: 
    instance: Ling\Light_Kit_Admin_UserPreferences\Service\LightKitAdminUserPreferencesService
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
            file: ${app_dir}/config/data/Light_Kit_Admin_UserPreferences/bmenu/generated/kit_admin_user_preferences.admin_mainmenu_1.byml
            path: lka-admin
        
    
    - 
        method: addDirectItemsByFileAndParentPath
        args: 
            menu-type: admin_main_menu
            file: ${app_dir}/config/data/Light_Kit_Admin_UserPreferences/bmenu/generated/kit_admin_user_preferences.admin_mainmenu-usermainpage.byml
            path: lka-user
        
    

$kit_admin.methods_collection: 
    - 
        method: registerPlugin
        args: 
            pluginName: Light_Kit_Admin_UserPreferences
            plugin: 
                instance: Ling\Light_Kit_Admin_UserPreferences\LightKitAdminPlugin\Generated\LightKitAdminUserPreferencesLkaPlugin
                methods: 
                    setOptionsFile: 
                        file: ${app_dir}/config/data/Light_Kit_Admin_UserPreferences/Light_Kit_Admin/lka-options.generated.byml

    

$micro_permission.methods_collection: 
    - 
        method: registerMicroPermissionsByProfile
        args: 
            file: ${app_dir}/config/data/Light_Kit_Admin_UserPreferences/Light_MicroPermission/kit_admin_user_preferences.profile.generated.byml
        
    
```



History Log
=============

- 1.2.5 -- 2021-01-29

    - adapt to work with new Light_PluginInstaller api

- 1.2.4 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.2.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.2 -- 2020-12-01

    - update to accommodate latest Light_ControllerHub api
    
- 1.2.1 -- 2020-11-27

    - update to accommodate latest Light_Kit api
    
- 1.2.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 1.1.0 -- 2020-08-21

    - update service to work with micro-permission3
    
    
- 1.0.0 -- 2020-08-13

    - initial commit