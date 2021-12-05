Light_Kit_Admin_UserNotifications
===========
2021-06-18



A [lka](https://github.com/lingtalfi/Light_Kit_Admin) gui for the [Light_UserNotifications](https://github.com/lingtalfi/Light_UserNotifications) planet.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_UserNotifications
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_UserNotifications
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Admin_UserNotifications api](https://github.com/lingtalfi/Light_Kit_Admin_UserNotifications/blob/master/doc/api/Ling/Light_Kit_Admin_UserNotifications.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========


Here is an example of the service configuration:

```yaml
kit_admin_user_notifications: 
    instance: Ling\Light_Kit_Admin_UserNotifications\Service\LightKitAdminUserNotificationsService
    methods: 
        setContainer: 
            container: @container()




```



History Log
=============

- 0.0.2 -- 2021-06-18

    - Update api to work with Ling.Light_Kit_Admin:0.13.3

- 0.0.1 -- 2021-06-18

    - initial commit