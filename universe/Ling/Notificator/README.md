Notificator
===========
2018-04-27 -> 2021-03-05



A general notification system for your app.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Notificator
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Notificator
```

Or just download it and place it where you want otherwise.



Overview
==========================

I now believe every application (front end or back end) needs a notification system for the gui user.

This belief comes from the fact that at some point in any application, I needed to communicate information
from the app to the gui user (a front end user, or a back end user, I had both cases).

Now in an MVC environment, it turns out that it's pretty easy to create a widget (or template, what have you...)
dedicated to rendering notifications.

So, the idea here is just to create a simple object that the application will use to CREATE the notification.

The `Notificator` object acts as a singleton, exposing static methods so that you can add notifications when you want
and from anywhere.

It relies on the fact that the rendering phase of notifications will be done later (which is always true in an MVC environment).

It comes with the following notification types:

- success
- info
- warning
- error


The rendering is left to your app, but you might find helpers to get started in this planet.



How to
============

```php
<?php


use Core\Services\A;
use Ling\Notificator\Notificator;
use Ling\Notificator\Renderer\DefaultNotificatorRenderer;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


A::testInit();



// somewhere in the MODEL 
Notificator::addError("oops, not good");

// somewhere in the VIEW 
DefaultNotificatorRenderer::create()->display(Notificator::getNotifications());


```



How to add a persistent notification
==================

The code below uses the SessionNotificator, which basically survives one http redirection (this might be useful sometime).


```php
// somewhere in the MODEL 
SessionNotificator::addError("oops, not good");

// somewhere in the VIEW 
DefaultNotificatorRenderer::create()->display(SessionNotificator::getNotifications());
```







History Log
------------------

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2018-04-27

    - add SessionNotificator class
    
- 1.0.0 -- 2018-04-27

    - initial commit




