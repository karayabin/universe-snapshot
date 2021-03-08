[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)



The LightRouter class
================
2019-04-09 --> 2021-03-05






Introduction
============

The LightRouter class.



Class synopsis
==============


class <span class="pl-k">LightRouter</span> implements [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) {

- Properties
    - protected array|false [$matchingRoute](#property-matchingRoute) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/__construct.md)() : void
    - public [match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array
    - public [getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/getMatchingRoute.md)() : array | false

}




Properties
=============

- <span id="property-matchingRoute"><b>matchingRoute</b></span>

    This property holds the matchingRoute for this instance.
    
    



Methods
==============

- [LightRouter::__construct](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/__construct.md) &ndash; Builds the LightRouter instance.
- [LightRouter::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md) &ndash; Tests the given httpRequest against the routes until one matches.
- [LightRouter::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/getMatchingRoute.md) &ndash; returns the matching route if there was a match, or false otherwise.





Location
=============
Ling\Light\Router\LightRouter<br>
See the source code of [Ling\Light\Router\LightRouter](https://github.com/lingtalfi/Light/blob/master/Router/LightRouter.php)



SeeAlso
==============
Previous class: [VoidHttpRequest](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/VoidHttpRequest.md)<br>Next class: [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)<br>
