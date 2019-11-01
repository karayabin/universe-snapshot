[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\ReverseRouter\LightReverseRouterInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface.md)


LightReverseRouterInterface::getUrl
================



LightReverseRouterInterface::getUrl — Returns the url corresponding to the given route name and url parameters.




Description
================


abstract public [LightReverseRouterInterface::getUrl](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface/getUrl.md)(string $routeName, ?array $urlParameters = [], ?$useAbsolute = false) : string




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

- [LightException](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Exception/LightException.md).&nbsp;







Source Code
===========
See the source code for method [LightReverseRouterInterface::getUrl](https://github.com/lingtalfi/Light/blob/master/ReverseRouter/LightReverseRouterInterface.php#L44-L44)


See Also
================

The [LightReverseRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ReverseRouter/LightReverseRouterInterface.md) class.



