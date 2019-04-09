[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRouter class
================
2019-04-09 --> 2019-04-09






Introduction
============

The LightRouter class.



Class synopsis
==============


class <span class="pl-k">LightRouter</span> implements [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) {

- Properties
    - protected bool [$debug](#property-debug) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/__construct.md)() : void
    - public [match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array
    - protected [onUriMatchAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onUriMatchAfter.md)() : void
    - protected [onRouteMatchSuccessAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onRouteMatchSuccessAfter.md)() : void
    - protected [onRouteMatchFailureAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onRouteMatchFailureAfter.md)() : void
    - protected [matchRequirements](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchRequirements.md)(array $requirements, [Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, &$failed = null) : array | bool
    - protected [matchUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchUriPath.md)(string $uriPath, string $pattern, array &$tagVars = null, array &$details = null) : bool
    - private [normalizeRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/normalizeRoute.md)(array &$route, string $routeName) : void

}




Properties
=============

- <span id="property-debug"><b>debug</b></span>

    This property holds the debug for this instance.
    When debug is true, all failing routes explain why they failed.
    
    



Methods
==============

- [LightRouter::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/__construct.md) &ndash; Builds the LightRouter instance.
- [LightRouter::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md) &ndash; Tests the given httpRequest against the routes until one matches.
- [LightRouter::onUriMatchAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onUriMatchAfter.md) &ndash; 
- [LightRouter::onRouteMatchSuccessAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onRouteMatchSuccessAfter.md) &ndash; 
- [LightRouter::onRouteMatchFailureAfter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/onRouteMatchFailureAfter.md) &ndash; 
- [LightRouter::matchRequirements](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchRequirements.md) &ndash; Tests the given $requirements against the request.
- [LightRouter::matchUriPath](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/matchUriPath.md) &ndash; Returns whether the $pattern matches against the given $uriPath.
- [LightRouter::normalizeRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/normalizeRoute.md) &ndash; Normalizes the given $route.





Location
=============
Ling\Light\Router\LightRouter


SeeAlso
==============
Previous class: [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)<br>Next class: [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)<br>
