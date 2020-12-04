Light_LoginNotifier
===========
2020-11-30



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

    

$plugin_installer.methods_collection: 
    - 
        method: registerPlugin
        args: 
            plugin: Light_LoginNotifier
            installer: @service(login_notifier)
        
    


```



History Log
=============

- 1.0.0 -- 2020-11-30

    - initial commit