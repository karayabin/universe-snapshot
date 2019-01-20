Module guidelines
==============================
2017-04-09





This document contains guidelines for the modules developers.

It takes a pragmatic approach and leaves the theory behind for another day.




Create the module directory
============================

First, create the module directory.

In this tutorial, my module will be named Kaminos.

So, I (or you) create the **Kaminos** directory in the **class-modules** directory.

Now the tree structure looks like that:

```txt
- app
----- class-modules
--------- Kaminos
```


Create the Module class
===========================

To be able to install the module (which we will do at the end of this document), we need to create a Module class.

My module name is Kaminos, so I create the KaminosModule class, the namespace for any module is Module.

So here is how the tree structure looks like now:

```txt
- app
----- class-modules
--------- Kaminos
------------- KaminosModule.php
```

And here is the code of KaminosModule:

```php
<?php


namespace Module\Kaminos;




use Kamille\Module\KamilleModule;

class KaminosModule extends KamilleModule
{

}


```

Note that my class extends KamilleModule, which helps a lot with installing/uninstalling the module.
We are going to use the KamilleModule capabilities in the following sections.


Note: You don't have to use KamilleModule if you don't want to, you only need to implements a ModuleInterface.


KamilleModule features explored
=====================

Creating the conf
---------------------


Creating files
---------------------


Creating Services
---------------------


Creating Hooks
---------------------

Creating Controllers
---------------------


Using Widgets
---------------------
todo
```php
<?php


namespace Module\Kaminos;




use Kamille\Module\KamilleModule;

class KaminosModule extends KamilleModule
{

//    protected function getWidgets(){
//        return [
//            'KamilleWidgets.Exception',
//            'KamilleWidgets.HttpError',
//        ];
//    }

}



```



Conventions
=================


Uri
-------
If your module brings pages to the application, it will provides some uri(s) to a router.
By default, I put the uri in the module conf, with a key called uri, which contains an array of identifier to uri,
like so:

```php
<?php



$conf = [
    'uri' => [
        'login' => "/login",
    ],
];
```

This gives the user of your module the ability to change the uri if she wants to.

Now in your code, or in somebody else's code, to access your module your uri, if it's static (i.e. fixed), 
you can simply use the XConfig, like so:

```php
a(XConfig::get("Kaminos.uri.login"));
```

And if you need to use parameters, you can use my flexible Z utility, like so:

```php
a(Z::uri(XConfig::get("Kaminos.uri.login"), ["more" => "ko"], false));
```
 
 
Naming config keys
----------------------
Todo: to name a key, start with the WHAT first, and use it as a namespace.
It makes things a little more organized, like so:



```php
"conf" => [
    "formModel" => null, // to be set by the controller
    "uriOnSuccess" => "/home",
    "nameUserName" => "username",
    "namePassword" => "password",
    "textUserName" => "Username",
    "textPassword" => "Password",
    "textSubmit" => "Send",
    "showForgotPasswordLink" => true,
    "uriForgotPassword" => "/password-forgotten",
],
```





Install the module
===================
todo:
kamille install Kaminos 
kamille install Kaminos -f