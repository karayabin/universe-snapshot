Light_Kit_Admin user guide
============
2021-02-26 -> 2021-03-01




Welcome to **light kit admin** (lka) user guide.

This guide will explain the main concepts of **light kit admin** at the gui user level.



Installation
---------
2021-02-26


This is the most technical part, and maybe you are not concerned with this, but I reckoned I would
put it here as a reminder.


For this install, we will use the [light cli installer](https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md). 

Make sure you've [installed](https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md#automatic-installation) it first.

We will use the **lt** alias (because it's faster to type than **light**).

In this example our app will be at **/tmp/testapp/**.

First create the app and go inside of it:


```bash
cd /tmp 
lt mkapp testapp
cd testapp
```

Now install **light kit admin**:


```bash
lt install Light_Kit_Admin
```

If prompted, type your database credentials (this is part of the Light_Database planet install, which lka depends on).


That should be it.




First contact with the light kit admin gui
-------
2021-02-26 -> 2021-03-01


By default, **light kit admin** use an url namespace of: **/admin**.

Assuming you have a web server serving the pages in **/tmp/testapp/www**, and that you webserver's hostname is **testapp**,
then open the following url in your browser:

- http(s)://testapp/admin




Note:
By default, the light framework assumes that you have setup an https server.
If you want to use http only, open the file **scripts/Ling/Light/init.container.inc.php**, and replace those lines:

```php
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);
```

With these:

```php
ini_set('session.cookie_httponly', 0);
ini_set('session.use_only_cookies', 0);
ini_set('session.cookie_secure', 0);
```


You now should be redirected to the login form of light kit admin.


![light kit admin login page](https://lingtalfi.com/img/universe/Light_Kit_Admin/lka-login.png)



### Tip
To change the **/admin** url prefix to something else, open the **config/services/_zzz.byml** file and use this variable:

```yaml
$kit_admin_vars.route_prefix: /admin        # replace with whatever value here...
```


By default, **light kit admin** creates two accounts:


- the root account
    - username: lka_admin
    - password: boss

- a user account
    - username: lka_dude
    - password: dude
    

For now, we recommend that you connect with the root account, because it has all the permissions granted, so you won't experience any limitations.


Once you're logged in, you should see the welcome page of the **light kit admin** plugin.

**Light kit admin** is just the backoffice for a front end website, so by default there is not much to it.

We have the following pages:

- blabla
- account: fsdsdkjf lk jsdlkfj
- blabla


But the interesting part is when you installing **light kit admin** plugins/extensions.



Light kit admin extensions
----------
2021-02-25


**Light kit admin** extensions (aka lka plugins) add functionality to the **light kit admin** base.

In this section we present the available extensions so far for **light kit admin**:


- blabla
- Light_Kit_Admin_UserDatabase
- blabla
- blabla
- blabla























