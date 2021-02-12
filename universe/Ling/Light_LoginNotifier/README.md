Light_LoginNotifier
===========
2020-11-30 -> 2021-02-11



A service to be notified when a user logs in your app.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_LoginNotifier
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
login_notifier: 
    instance: Ling\Light_LoginNotifier\Service\LightLoginNotifierService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options:
                send_notification_to_user: false
                record_to_db: false
                send_notification_to_admin:
                    - myadmin_email@gmail.com

            
    


```



History Log
=============

- 1.0.6 -- 2021-02-11

    - update api, plugin installer now extends LightUserDatabaseBasePluginInstaller
  
- 1.0.5 -- 2021-01-28

    - adapt to work with new Light_PluginInstaller api
  
- 1.0.4 -- 2021-01-26

    - fix LightLoginNotifierPluginInstaller, functional typo in namespace
  
- 1.0.3 -- 2021-01-26

    - adapt api to work with new Light_PluginInstaller

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2020-11-30

    - initial commit