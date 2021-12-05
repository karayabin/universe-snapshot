[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Core\Light class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)


Light::setMatchingRoute
================



Light::setMatchingRoute — Sets the matchingRoute.




Description
================


public [Light::setMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/setMatchingRoute.md)(array $matchingRoute) : void




Sets the matchingRoute.
You shouldn't use this method unless you know what you are doing.
This is experimental.

It basically allows for internal hacks.
So for those hacks are:

- ControllerHelper::executeControllerByRouteName
     We basically created this method so that executeControllerByRouteName could specify urlParams if he wanted.
     That's all. Otherwise this method shouldn't be used.




Parameters
================


- matchingRoute

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [Light::setMatchingRoute](https://github.com/lingtalfi/Light/blob/master/Core/Light.php#L289-L292)


See Also
================

The [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) class.

Previous method: [getMatchingRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/getMatchingRoute.md)<br>Next method: [registerRoute](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/registerRoute.md)<br>

