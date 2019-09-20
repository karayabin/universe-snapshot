[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Router\LightRouterInterface class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md)


LightRouterInterface::getMatchingRoute
================



LightRouterInterface::getMatchingRoute — returns the matching route if there was a match, or false otherwise.




Description
================


abstract public [LightRouterInterface::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/getMatchingRoute.md)() : array | false




Assuming the match method has been called first,
returns the matching route if there was a match, or false otherwise.

In other words, this method returns the cached result of the last match method call.




Parameters
================

This method has no parameters.


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightRouterInterface::getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/Router/LightRouterInterface.php#L47-L47)


See Also
================

The [LightRouterInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface.md) class.

Previous method: [match](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Router/LightRouterInterface/match.md)<br>

