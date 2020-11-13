Light_QuickMailAlert
===========
2020-08-14 -> 2020-08-17



A [light](https://github.com/lingtalfi/Light) service to send quick email alerts to the admin.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_QuickMailAlert
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_QuickMailAlert api](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/api/Ling/Light_QuickMailAlert.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_QuickMailAlert/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
quick_mail_alert:
    instance: Ling\Light_QuickMailAlert\Service\LightQuickMailAlertService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                appName: my app 01
        setGroups:
            groups:
                admin:
                    template: Light_QuickMailAlert/mail/admin_alert
                    recipients:
                        - the_admin@gmail.com







```



History Log
=============

- 1.1.0 -- 2020-08-17

    - add admin_notif template
    
- 1.0.0 -- 2020-08-14

    - initial commit