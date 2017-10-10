Kamille translation
======================
2017-04-09



In kamille, the default translation mechanism is located in:

- app/functions/main-functions.php


The two relevant functions are double underscore (__) and triple underscore (___),
and they alone handle the default translation mechanism in kamille.


What's the default translation mechanism in kamille
======================================

You create translation files in the lang directory, using any sub-organization you want,
and the file must end with the ".trans.php" extension.


By convention, we try to organize the translation files by the type of the item that provide them
(modules, widgets, controllers, ...), then followed by the item name.



For instance:

```php
- app
----- lang
--------- en
------------- widgets
----------------- MyWidget
--------------------- MyWidget.trans.php
--------- fr
------------- common
----------------- form.trans.php
------------- widgets
----------------- MyWidget
--------------------- MyWidget.trans.php
------------- controllers
----------------- Authenticate
--------------------- AuthenticateController.trans.php
------------- modules
----------------- ModuleOne
--------------------- ModuleOne.trans.php


```

There is also the special common directory, as you can see above.
By convention, this directory is reserved for messages that might be re-used by more than one module.
A kamille application will provide default messages that you might want to check.
You can also add your own if you want.

It's recommended that you encapsulate your message identifiers and translations with double quotes
exclusively (not single quotes), so that it's easier to build tool to manipulate those files later.

You've been warned, use single quotes at your own risks!






Inside the translation file, you just create a $defs variable containing your definitions,
like so (example from the loginForm widget):

```php 
<?php


$defs = [
    'loginForm' => "Login Form",
    'username' => "Username",
    'password' => "Password",
    'submit' => "Log in",
    'passwordLost' => "Lost your password?",
    'createAccount' => "Create Account",
];
```


That's it.
If something wrong happens, you will be able to look at the errors in the log,
and the string won't be translated, but it will never stop your application.





Extra thoughts
=================
2017-07-01

The more I'm doing web development, the more I feel that templates should be responsible for the
language.

This statement has a lot of implications in the implementation of an app, and I don't want to force
people to pay the consequences of this thought, which might be wrong.

What I can do however, is provide some tools for templates to use to help with the implementation of this
statement.

We need the following tools:

- a translation mechanism (the __ and ___ functions might do)
- a date formatter mechanism, where the template can override the lang at will.
        For instance something like this:
                    localDate($mysqlDatetimeOrAnyRoboticFormat)  // will automatically select the right format
                    localDate($mysqlDatetimeOrAnyRoboticFormat, "fr") // the template overrides the default format and use french format
            






