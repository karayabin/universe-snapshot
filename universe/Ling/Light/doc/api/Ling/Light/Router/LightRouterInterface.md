[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRouterInterface class
================
2019-04-09 --> 2019-09-20






Introduction
============

The LightRouterInterface interface.


The router in the Light framework is the object which chooses the controller to execute, based on the http request.
The controller being just a function which usually renders an html page.



Class synopsis
==============


abstract class <span class="pl-k">LightRouterInterface</span>  {

- Methods
    - abstract public [match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array
    - abstract public [getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/getMatchingRoute.md)() : array | false

}






Methods
==============

- [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md) &ndash; Tests the given httpRequest against the routes until one matches.
- [LightRouterInterface::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/getMatchingRoute.md) &ndash; returns the matching route if there was a match, or false otherwise.





Location
=============
Ling\Light\Router\LightRouterInterface<br>
See the source code of [Ling\Light\Router\LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/Router/LightRouterInterface.php)



SeeAlso
==============
Previous class: [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)<br>Next class: [LightBlueServiceContainer](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightBlueServiceContainer.md)<br>
