[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouterInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)


LightRouterInterface::match
================



LightRouterInterface::match — Tests the given httpRequest against the routes until one matches.




Description
================


abstract public [LightRouterInterface::match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md)([Ling\Light\Http\HttpRequestInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRequestInterface.md) $request, array $routes) : false | array




Tests the given httpRequest against the routes until one matches.
If one route matches, it returns the matching route.
If no route matches, it returns false.

The routes array is an array of route names => route item.

A route item is an array which should contain at least the following
entries:

- pattern: string. The route pattern to match against the http request uri
- ?requirements: an array of requirements for the http request to meet. It contains at least the following:
- ?method: string = get. The name of the http method (in lower case) to match against the http request method.
- name: string. This entry will be added automatically to the route item, and will contain the route name.




Parameters
================


- request

    

- routes

    


Return values
================

Returns false | array.








See Also
================

The [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) class.



