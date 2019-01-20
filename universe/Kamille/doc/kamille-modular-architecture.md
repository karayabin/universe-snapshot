Kamille modular architecture
===============================
2017-04-02




[![kamille-modular-architecture.jpg](https://s19.postimg.org/gpsz1gns3/kamille-modular-architecture.jpg)](https://postimg.org/image/4b6714w9r/)



Modules
==========
Kamille uses the concept of modules.

A module is a ensemble of code that brings functionality to your application.

You can install/uninstall a module.

The module's functionality becomes available to the application only when the module is installed (i.e. it's unavailable
if the module is not installed).

Modules provide their functionality to the outer world via the X service container, the Hooks, and the XConfig class.

One should only access module's functionality via one of those objects.
 
Those objects are described later in this document.




Modular application
====================

The list of installed modules is contained in a modules.txt file at the root of the kamille application.

You can use the ModuleInstallationRegister class to check whether a module is installed or not.

```php
ModuleInstallationRegister::isInstalled("MyModule");
```


A kamille application is composed of two main parts:

- the application environment
- the application instance

The idea is that you first create the application environment, and then only you can use the application instance.

The boot.php script is responsible for booting the application environment, while the init.php script is responsible
for configuring the application instance's preferences.

The application environment contains the X service container, the XConfig helper, the application parameters,
and the Hooks class.

The very first thing the boot script does is instantiate your application parameters, so that every other objects 
can use them.

For a WebApplication, the kamille framework define a few parameters, which you can extend if you want:

- app_dir: the path of the directory containing the application files.
- debug: bool, whether or not the application is in debug mode or not.
         The default should be assumed false.
         Debug mode is different than developing in dev mode.
         Dev mode basically just means local environment (database local pass for instance).
         But debug mode goes one step further: it can enable extra debug messages, useful
         for occasional debugging, or fake mail sending, or...
- request: HttpRequestInterface, the request to handle. This parameter will only become available once the application is called though.

Those parameters are defined in the following file:

```txt
/app/config/application-parameters-$env.php
```

Where $env is either dev or prod.








X, XConfig, Hooks
====================

X is a service container for modules.
You shouldn't edit this class manually, as your methods would potentially be removed by installer robots.

The Hooks class provides a hook system for modules.
You also shouldn't edit this class manually, as your methods would potentially be removed by installer robots.

XConfig provides access to KamilleModule(s) configuration.

A KamilleModule is a module which follows all the standard conventions (related to modules) defined in the 
kamille framework.


X, XConfig and Hooks have this in common that they allow us to access module's information, which would otherwise
be inaccessible.

In other words, those 3 objects provide the application developer's api to the modules.




Conclusion
==============

Now that the modular architecture is there, you can use the modules.
Before you create your first module, be sure to check out the KamilleModule class, which can save you tremendous time.





