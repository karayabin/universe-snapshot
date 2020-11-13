Light_UserNotifications
===========
2020-08-17



A user notification service for the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
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
        
    

# --------------------------------------
# hooks
# --------------------------------------
$plugin_installer.methods_collection: 
    - 
        method: registerPlugin
        args: 
            plugin: Light_UserNotifications
            installer: @service(user_notifications)
        
    

```



History Log
=============

- 1.0.2 -- 2020-08-17

    - update service config (forgot hooks section comment)
    
- 1.0.1 -- 2020-08-17

    - update documentation (forgot to use docTools)
    
- 1.0.0 -- 2020-08-17

    - initial commit