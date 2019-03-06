FAQ
=============
2017-04-20




- [FAQ](#faq)
- [Developers](#developers)
  * [How to access application dir?](#how-to-access-application-dir-)
  * [How to create links?](#how-to-create-links-)
  * [How to create uri?](#how-to-create-uri-)
  * [Whether or not to show the debug trace?](#whether-or-not-to-show-the-debug-trace-)
  * [Pack the module/widget you are currently working on](#pack-the-module-widget-you-are-currently-working-on)
  * [Routsy route identifier to uri?](#routsy-route-identifier-to-uri-)
  * [Application logs](#application-logs)
  
  
<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'>Table of contents generated with markdown-toc</a></i></small>
  
  
  
  
Developers
==============






How to access application dir?
------------------------

```php
$appDir = ApplicationParameters::get("app_dir");
```




How to create links?
------------------------

Using the routsy system, you can use the ApplicationLinkGenerator service, like this:

```php 
ApplicationLinkGenerator::getUri("Core_myRouteId5", [
      'dynamic' => 46,
]);
```


Or use the shortcut:

```php
Z::link("Core_myRouteId5", [
      'dynamic' => 46,
]);
```


How to create uri?
------------------------

You can use the Z helper for that.
The following examples demonstrate how to use it.

```php 
// the url is: http://kaminos/no.php?pou=6


a(Z::uri()); // same uri, no query string                                       /no.php
a(Z::uri(null, [], false)); // same uri, with query string                      /no.php?pou=6
a(Z::uri(null, ["doo" => 7], false)); // same uri, merging params               /no.php?pou=6&doo=7
a(Z::uri(null, ["doo" => 7], true)); // same uri, replacing params              /no.php?doo=7
a(Z::uri(null, ["doo" => 7], true, true)); // prefix with host                  http://kaminos/no.php?doo=7
a(Z::uri("/myown", ['foo'], true, true));  // own uri                           http://kaminos/myown?0=foo
```


Whether or not to show the debug trace?
---------------------------

```php
if (true === XConfig::get("Core.showExceptionTrace")) {
    XLog::trace("$e");
}

```


Pack the module/widget you are currently working on
------------------------

Use the **kpack** alias to pack a module, a **kwpack** for a widget.

Those techniques allow you to develop your modules in a reactive way, basically updating the module files
directly in the context of the application (and pack them later with the one liner alias).

The aliases looks like this on my computer:

```bash
alias kpack='php -f /mytasks/kamille/pack-modules.php'
alias kwpack='php -f /mytasks/kamille/pack-widgets.php'
```

See those tasks for more info: https://github.com/lingtalfi/task-manager/tree/master/tasks/ling-personal-tasks/kamille


Routsy route identifier to uri?
---------------------------------

```php
$uri = RoutsyUtil::routeIdentifierToUri($routeIdentifier);
```


Application logs
---------------------------------

Use my klog alias.

```bash
alias klog='tail -f -n 100 /myphp/kaminos/app/logs/kamille.log.txt'
```



Check if a connected user has a given role
---------------------------------

Use the A::has shortcut method, provided by the Authenticate module.

```php
A::has("moderator");
```


Install a module
---------------------------------

Use [kamille installer tool](https://github.com/lingtalfi/kamille-installer-tool), once installed, do this:

```bash
cd /my/app
kamille install Authenticate
```



How to call an asset (js or css) from anywhere
---------------------------------

```php
HtmlPageHelper::js("/your/js/your.js");
HtmlPageHelper::js("$prefixUri/build/js/custom.min.js", null, null, false);
```



How to add some code at the end of the body, from your widget
----------------------------------
```php
A::addBodyEndJsCode('jquery', file_get_contents($v['__DIR__'] . "/init.js"));
```


How to access the __FILE__ and __DIR__ variables from a widget?
-------------------------------------

```php
$v['__FILE__'];
$v['__DIR__'];
```


The A shortcuts cheatsheet
-------------------------------------


- A::exceptionToString ( e ) , to convert an exception to a string
- A::has ( badge ), check whether or not the connected SessionUser has the given badge
- A::addBodyEndJsCode ( groupId, code ), add some js code just before the body end tag
- A::quickPdoInit ( ), init quickPdo in a new project, even when the application is not started (but the application environment is booted)



Add a css class to the body tag
------------------------------

```php
HtmlPageHelper::addBodyClass("nav-md");
```


Check if it's debug mode
----------------------
```php
if (true === ApplicationParameters::get("debug")) {
    // debug here...            
}
```


How are assets organized in a kamille application?
----------------------------------------------------
We rely heavily on [laws](https://github.com/lingtalfi/laws) convention for naming assets.
Since kamille is mvc, all (or at least most of) of the pages are displayed via layouts/widgets.
So, in that context, the "laws" rules (pun intended).




How are web services handled?
----------------------------

There is a **service/{serviceIdentifier+}** route (Core_service) that catches all uri starting with the **/service** prefix,
and redirect them to the **Controller\Core\ServiceController** controller.

By convention, all services are handled by this controller.


How can I access the chosen route?
-----------------------------------------
If the routsy router has been used, you can use the following code:

```php
ApplicationRegistry::get("core.routsyRouteId");
```



How to temporarily force the log to listen to a specific identifier?
-----------------------------------------

Open the Hooks file (class-core/Services/Hooks.php) and search for the Core_addLoggerListener hook.

Then search for logger using the "Core.logFile" file, and ensure that:

- it has the setIdentifiers method set to what you want


Here is an example of how it could look like:

```php 
            $logger->addListener(\Logger\Listener\FileLoggerListener::create()
                ->setFormatter(\Logger\Formatter\TagFormatter::create())
                ->setIdentifiers(['tmpp'])
//                ->setIdentifiers(null)
//                ->removeIdentifier("sql.log")
//                ->removeIdentifier("tabatha")
//                ->removeIdentifier("hooks")
                ->setPath($f));
```



How to quickly return an HttpResponse from a controller?
-----------------------------------------

If you use the claws system: 
    Throw a ClawsHttpResponseException exception from anywhere in your controller that extends KamilleClawsController.
