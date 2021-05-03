[Back to the Ling/Light_Router api](https://github.com/lingtalfi/Light_Router/blob/master/doc/api/Ling/Light_Router.md)



The LightRouterService class
================
2019-09-20 --> 2021-03-15






Introduction
============

The LightRouterService class.



Class synopsis
==============


class <span class="pl-k">LightRouterService</span> extends [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md) implements [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) {

- Inherited properties
    - protected array|false [LightRouter::$matchingRoute](#property-matchingRoute) ;

- Inherited methods
    - public LightRouter::__construct() : void
    - public LightRouter::match(Ling\Light\Http\HttpRequestInterface $request, array $routes) : false | array
    - public LightRouter::getMatchingRoute() : array | false

}






Methods
==============

- LightRouter::__construct &ndash; Builds the LightRouter instance.
- LightRouter::match &ndash; Tests the given httpRequest against the routes until one matches.
- LightRouter::getMatchingRoute &ndash; returns the matching route if there was a match, or false otherwise.





Location
=============
Ling\Light_Router\Service\LightRouterService<br>
See the source code of [Ling\Light_Router\Service\LightRouterService](https://github.com/lingtalfi/Light_Router/blob/master/Service/LightRouterService.php)



