Light_Kit_Admin_UserData
===========
2020-02-28 -> 2021-06-25



This plugin hooks the [Light_UserData](https://github.com/lingtalfi/Light_UserData) plugin into the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) environment.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_UserData
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserData
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/pages/conception-notes.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- kit_admin_user_data (returns a LightKitAdminUserDataService instance)


Here is an example of the service configuration:

```yaml
kit_admin_user_data: 
    instance: Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService
    methods: 
        setContainer: 
            container: @container()
                    
        
      
    

```



History Log
=============


- 1.7.24 -- 2021-06-25

    - updated routes, add galaxy prefix

- 1.7.23 -- 2021-06-18

    - Update api to work with Ling.Light_Kit_Admin:0.13.3

- 1.7.22 -- 2021-06-18

    - update api to work with Ling.Light_Kit_Admin:0.13.0

- 1.7.21 -- 2021-06-17

    - checkpoint commit
  
- 1.7.20 -- 2021-06-17

    - switch to micro-permission open registration system
  
- 1.7.19 -- 2021-06-03

    - adapt api to work with Light_PlanetInstaller:2.0.4
    - removed dependency to Light_PluginInstaller

- 1.7.18 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.7.17 -- 2021-05-31

    - update api to work with Light_PlanetInstaller 2.0.0

- 1.7.16 -- 2021-05-11

    - Update dependencies to Ling.Light_EasyRoute (pushed by SubscribersUtil)

- 1.7.15 -- 2021-03-23

  - adapt api to Ling.Light_Realist:2.0.15
  
- 1.7.14 -- 2021-03-18

  - fix service config using undesirable bmenu snippet
  
- 1.7.13 -- 2021-03-18

  - fix bmenu items not requiring admin rights

- 1.7.12 -- 2021-03-18

  - update planet to adapt Ling.Light_BMenu:2.0.0
  
- 1.7.11 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.7.10 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 1.7.9 -- 2021-03-09

    - rename template dir to include galaxy name
  
- 1.7.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.7.7 -- 2021-02-23

    - switch to Light_EasyRoute open registration system
  
- 1.7.6 -- 2021-01-29

    - adapt to work with new Light_PluginInstaller api

- 1.7.5 -- 2020-12-08

    - Fix lpi-deps not using natsort

- 1.7.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.7.3 -- 2020-12-01

    - update to accommodate latest Light_ControllerHub api  
    
- 1.7.2 -- 2020-11-27

    - update to accommodate latest Light_Kit api  
    
- 1.7.1 -- 2020-11-23

    - acknowledge use of Light_Nugget api  
    
- 1.7.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 1.6.0 -- 2020-08-21

    - update api to work with micro-permission3
    
- 1.5.1 -- 2020-08-07

    - update service to adapt realform late registration (forgot implementation last commit)

- 1.5.0 -- 2020-08-07

    - update service to adapt realform late registration
    
- 1.4.0 -- 2020-08-07

    - update service to adapt realist late registration
    
- 1.3.0 -- 2020-06-23

    - update service to adapt new plugin installer service

- 1.2.0 -- 2020-03-06

    - update kit admin generator config: use a shortName variable to make it more compact
    
- 1.1.0 -- 2020-03-05

    - change kit admin generator config to take into account user row restriction
    
- 1.0.0 -- 2020-02-28

    - initial commit