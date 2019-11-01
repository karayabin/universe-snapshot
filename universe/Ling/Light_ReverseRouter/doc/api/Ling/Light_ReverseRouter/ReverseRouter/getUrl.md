[Back to the Ling/Light_ReverseRouter api](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter.md)<br>
[Back to the Ling\Light_ReverseRouter\ReverseRouter class](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter.md)


ReverseRouter::getUrl
================



ReverseRouter::getUrl — Returns the url corresponding to the given route name and url parameters.




Description
================


public [ReverseRouter::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/getUrl.md)(string $routeName, ?array $urlParameters = [], ?$useAbsolute = false) : string




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
See the source code for method [ReverseRouter::getUrl](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/ReverseRouter.php#L50-L98)


See Also
================

The [ReverseRouter](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter.md) class.

Previous method: [initialize](https://github.com/lingtalfi/Light_ReverseRouter/blob/master/doc/api/Ling/Light_ReverseRouter/ReverseRouter/initialize.md)<br>

