Light_LingHooks, conception notes
============
2020-08-17



A personal service to help me use some [light](https://github.com/lingtalfi/Light) plugins more efficiently.

As you probably don't have the same needs as I have, you might not find this service useful.

However, if you share my exact vision of things, then feel free to use it.



So this service is divided in multiple, unrelated sub services, which are explained below.




Important notifications
-------------
2020-08-17


This sub-service uses two services together:

- [Light_UserNotifications](https://github.com/lingtalfi/Light_UserNotifications)
- [Light_QuickMailAlert](https://github.com/lingtalfi/Light_QuickMailAlert/)


Basically, we can choose to send an email alert, depending on which type of user notifications is sent
to the user.


The configuration hooks looks like this:


```yaml
$ling_hooks.methods_collection:
    -
        method: addImportantNotifications
        args:
            notifications:
                -
                    feeder: Light_ABC
                    type: type9
                    group: admin_notif


$quick_mail_alert.methods_collection:
    -
        method: setGroups
        args:
            groups:
                admin_notif:
                    template: Light_QuickMailAlert/admin_notif
                    recipients:
                        - my_admin_email@gmail.com


```


Where **feeder** and **type** come from the **Light_UserNotification** service, and the **group** is the
**quick mail alert group**.


In the example above, we basically are saying that any **user notifications** originating from the "Light_ABC" feeder,
and with message type=msg9 will send an email to the **admin_notif** group, defined with the **Light_QuickMailAlert** service.

In the example above, I also provide the **quick_mail_alert** config nugget, just because it might help better visualizing
what service connections are involved, but where you define this nugget is up to you (i.e. your mileage may vary).

Our sub-service also  **accepts** the special asterisk notation (*) for the **type** (which means any message type will do).




