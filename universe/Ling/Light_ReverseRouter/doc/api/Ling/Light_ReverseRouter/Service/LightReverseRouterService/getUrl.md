[Back to the Ling/Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md)<br>
[Back to the Ling\Light_ReverseRouter\Service\LightReverseRouterService class](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService.md)


LightReverseRouterService::getUrl
================



LightReverseRouterService::getUrl — Returns the url corresponding to the given route name and url parameters.




Description
================


public [LightReverseRouterService::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/getUrl.md)(string $routeName, ?array $urlParameters = [], ?$useAbsolute = false) : string




Returns the url corresponding to the given route name and url parameters.
If the useAbsolute flag is set to true, an absolute url will be returned.

The urlParameters is an array of key/value pairs.
The keys that belong to the route parameters will be injected as tags in the route pattern
(see [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) for more information), and those not used by the route will
be injected in the query string (after a question mark).




Parameters
================


- routeName

    

- urlParameters

    

- useAbsolute

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightReverseRouterService::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/Service/LightReverseRouterService.php#L75-L123)


See Also
================

The [LightReverseRouterService](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService.md) class.

Previous method: [initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/Service/LightReverseRouterService/initialize.md)<br>

