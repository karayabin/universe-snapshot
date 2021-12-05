Light_Kit_Admin_UserPreferences
===========
2020-08-13 -> 2021-06-18



A [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) wrapper for the [Light_UserPreferences](https://github.com/lingtalfi/Light_UserPreferences) service.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_UserPreferences
```

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
        
    
        
    
    
```



History Log
=============

- 1.2.18 -- 2021-06-18

    - Update api to work with Ling.Light_Kit_Admin:0.13.3

- 1.2.17 -- 2021-06-18

    - update api to work with Ling.Light_Kit_Admin:0.13.0
  
- 1.2.16 -- 2021-06-17

    - checkpoint commit

- 1.2.15 -- 2021-06-17

    - switch to micro-permission open registration system
  
- 1.2.14 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.13 -- 2021-05-31

  - update api to work with Light_PlanetInstaller 2.0.0
  
- 1.2.12 -- 2021-03-23

  - adapt api to Ling.Light_Realist:2.0.15
  
- 1.2.11 -- 2021-03-18

  - fix service config using undesirable bmenu snippet

- 1.2.10 -- 2021-03-18

    - update planet to adapt Ling.Light_BMenu:2.0.0
  
- 1.2.9 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.2.8 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 1.2.7 -- 2021-03-09

    - rename template dir to include galaxy name
  
- 1.2.6 -- 2021-03-05

    - update README.md, add install alternative

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