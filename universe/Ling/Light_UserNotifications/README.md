Light_UserNotifications
===========
2020-08-17 -> 2021-03-15



A user notification service for the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_UserNotifications
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserNotifications
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserNotifications api](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/api/Ling/Light_UserNotifications.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UserNotifications/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
user_notifications: 
    instance: Ling\Light_UserNotifications\Service\LightUserNotificationsService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options:
                messageArchiveTime: 30          # default is 30
        
    
    

```



History Log
=============

- 1.0.9 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.7 -- 2021-02-19

    - upgrade dependencies

- 1.0.6 -- 2021-02-11

  - update api, plugin installer now extends LightUserDatabaseBasePluginInstaller
  
- 1.0.5 -- 2021-01-28

    - adapt api to work with new Light_PluginInstaller
  
- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2020-08-17

    - update service config (forgot hooks section comment)
    
- 1.0.1 -- 2020-08-17

    - update documentation (forgot to use docTools)
    
- 1.0.0 -- 2020-08-17

    - initial commit