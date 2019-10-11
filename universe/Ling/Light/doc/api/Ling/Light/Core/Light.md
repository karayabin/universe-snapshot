[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The Light class
================
2019-04-09 --> 2019-10-09






Introduction
============

The Light class.


The Light class has a **run** method, which handles the web application.
Basically, you just call the **run** method, and web pages will automatically be printed on the screen for you.
But of course, you need to configure the Light instance before you can see anything.

There are two main concepts to grasp when working with the Light instance:

- routes
- error handlers


Routes
-----------
A route binds the http request to a controller.
So in other words, when the web user types something in the url bar of her browser (for instance http://your_site.com/home),
then the route does the job of deciding which controller should handle this request.

A controller is just a function that returns a response (generally an html web page).



Error handlers
----------------
Often, especially during the development phase, things go wrong: a route doesn't match, or a controller fails because
some parameters are missing, etc...

Whenever a failure happens, an exception is thrown.
The Light instance intercepts that and ask whether an error handler can handle this error (which usually has an error type associated with it).

Note: the error handlers are registered by you (or some plugins you've installed).

If an error handler can handle the error, it will. Usually, it will either display a pretty error message,
or redirect to a default page.

If no error handlers was able to handle the error, then the Light instance has a fallback mechanism for that:
it will display a 500 internal server error.
And if you set the debug mode=true, it will print a debug page showing the exception trace instead.


Those concepts are the fundamental ideas behind the Light instance.



The service container
----------------
The service container is a very important object in a Light application.

The philosophy of Light is to start your application from scratch, and build it progressively by adding the blocks
of functionality you need.

The service container helps implementing this idea: it's a container where each plugin can provide its own services.

And so when you install a plugin, it automatically adds its services to the services container, thus bringing to
the application the functionality you need.


The service container is the central piece in a Light application.



Class synopsis
==============


class <span class="pl-k">Light</span>  {

- Properties
    - protected string [$applicationDir](#property-applicationDir) ;
    - protected array [$routes](#property-routes) ;
    - protected array [$errorHandlers](#property-errorHandlers) ;
    - protected bool [$debug](#property-debug) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)|null [$container](#property-container) ;
    - protected array [$settings](#property-settings) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/__construct.md)() : void
    - public [setDebug](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setDebug.md)(bool $debug) : void
    - public [isDebug](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/isDebug.md)() : bool
    - public [setContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getContainer.md)() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - public [getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getApplicationDir.md)() : string
    - public [setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setApplicationDir.md)(string $applicationDir) : void
    - public [registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md)(string $pattern, ?$controller, string $name = null, array $route = []) : void
    - public [getRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getRoutes.md)() : array
    - public [registerErrorHandler](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerErrorHandler.md)(callable $errorHandler) : void
    - public [initialize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/initialize.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $httpRequest = null) : void
    - public [run](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/run.md)() : void
    - protected [renderDebugPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderDebugPage.md)([\Exception](http://php.net/manual/en/class.exception.php) $e) : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [renderInternalServerErrorPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderInternalServerErrorPage.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - private [getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getControllerArgs.md)(?$controller, array $route, [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $httpRequest) : array

}




Properties
=============

- <span id="property-applicationDir"><b>applicationDir</b></span>

    This property holds the applicationDir for this instance.
    This is the root directory containing the application.
    
    

- <span id="property-routes"><b>routes</b></span>

    This property holds the routes for this instance.
    
    

- <span id="property-errorHandlers"><b>errorHandlers</b></span>

    This property holds the errorHandlers for this instance.
    
    

- <span id="property-debug"><b>debug</b></span>

    This property holds the debug for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the service container for this instance.
    
    

- <span id="property-settings"><b>settings</b></span>

    This property holds the settings for this instance.
    
    



Methods
==============

- [Light::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/__construct.md) &ndash; Builds the Light instance.
- [Light::setDebug](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setDebug.md) &ndash; Sets the debug.
- [Light::isDebug](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/isDebug.md) &ndash; Returns the debug of this instance.
- [Light::setContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setContainer.md) &ndash; Sets the container.
- [Light::getContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getContainer.md) &ndash; Returns the services container of this instance.
- [Light::getApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getApplicationDir.md) &ndash; Returns the applicationDir of this instance.
- [Light::setApplicationDir](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setApplicationDir.md) &ndash; Sets the applicationDir.
- [Light::registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md) &ndash; Registers a route item, as defined in [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).
- [Light::getRoutes](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getRoutes.md) &ndash; Returns the routes of this instance.
- [Light::registerErrorHandler](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerErrorHandler.md) &ndash; Registers a error handler callback.
- [Light::initialize](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/initialize.md) &ndash; Triggers the initialize phase if set in the service container.
- [Light::run](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/run.md) &ndash; Runs the Light web application.
- [Light::renderDebugPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderDebugPage.md) &ndash; Renders (returns the html code of) the debug page.
- [Light::renderInternalServerErrorPage](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/renderInternalServerErrorPage.md) &ndash; it should display an internal server error page with code 500.
- [Light::getControllerArgs](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getControllerArgs.md) &ndash; Returns the controller arguments to use when invoking the controller.


Examples
==========

Example #1: Light hello world
==============
2019-04-09


Here is the simplest example of a light application.

```php
<?php


use Ling\Light\Core\Light;


require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


$light = new Light();
$light->setDebug(true); // set this to false in production


$light->registerRoute("/", function () {
    return "I'm the home page";
});


$light->run();
```
Example #2: Using a service container
==============
2019-04-09


A Light instance using a service container.

```php
<?php


use Ling\Light\Core\Light;
use Ling\Light\Helper\ServiceContainerHelper;


require_once __DIR__ . "/../universe/bigbang.php"; // activate universe



$appDir = __DIR__ . "/..";
$container = ServiceContainerHelper::getInstance($appDir, [
    'type' => 'blue',
    'blueMode' => 'create',
]);


$light = new Light();
$light->setDebug(true); // set this to false in production
$light->setContainer($container);


$light->registerRoute("/", function () {
    return "I'm the home page";
});




$light->run();
```



Location
=============
Ling\Light\Core\Light<br>
See the source code of [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/Core/Light.php)



SeeAlso
==============
Previous class: [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md)<br>Next class: [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md)<br>
