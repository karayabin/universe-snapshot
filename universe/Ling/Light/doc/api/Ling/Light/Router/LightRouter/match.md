[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouter class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md)


LightRouter::match
================



LightRouter::match — Tests the given httpRequest against the routes until one matches.




Description
================


public [LightRouter::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array




Tests the given httpRequest against the routes until one matches.
If one route matches, it returns the matching route.
If no route matches, it returns false.

A route is just an array which structure is detailed on [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md).




Parameters
================


- request

    

- routes

    


Return values
================

Returns false | array.








See Also
================

The [LightRouter](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouter.md) class.



