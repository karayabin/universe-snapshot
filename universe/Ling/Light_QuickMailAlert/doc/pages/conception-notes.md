Light_QuickMailAlert, conception notes
=========
2020-08-14


This is a service to send mail rapidly.

It's based on [Light_Mailer](https://github.com/lingtalfi/Light_Mailer).


The difference is that our service is specialized for sending quick email alerts to the admin, in case something wrong
occurs in the app.


How does it work?
---------
2020-08-14


You first define your groups using the service configuration, each group encapsulates information
about the template to use, and the recipients to send it to.

Once your groups are defined, to send a mail you just call the **sendGroup** method of our service, like this:


```php
$container->get("quick_mail_alert")->sendGroup('myGroup');
```



Optionally, you can pass a **msg** variable, like this:


```php
$container->get("quick_mail_alert")->sendGroup('myGroup', "A problem occurred with the cron task ABC (id=6)!!");
```



Some templates use the **appName** variable too (it's important for the admin, especially if you're doing maintenance for multiple applications
at the same time).

The **appName** variable can be set via our service config options.




