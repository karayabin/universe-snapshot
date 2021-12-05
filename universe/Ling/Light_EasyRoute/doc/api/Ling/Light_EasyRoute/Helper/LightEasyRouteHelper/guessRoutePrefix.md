[Back to the Ling/Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md)<br>
[Back to the Ling\Light_EasyRoute\Helper\LightEasyRouteHelper class](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper.md)


LightEasyRouteHelper::guessRoutePrefix
================



LightEasyRouteHelper::guessRoutePrefix — A route prefix is a namespace that your planet uses to distinguish its routes from other planets' routes.




Description
================


public static [LightEasyRouteHelper::guessRoutePrefix](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/guessRoutePrefix.md)(string $appDir, string $planetDotName) : string




A route prefix is a namespace that your planet uses to distinguish its routes from other planets' routes.

This method returns a guess of what your route prefix should be, based on your planet name.

Our heuristic is like this:

- if there is a digger route_prefix information, we use it
- else, we use the "$planetDotName-route-" string as a prefix


Note that in general there is no special rules about the route prefix, it can be any string, so you can override our guess
if you want.




Parameters
================


- appDir

    

- planetDotName

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightEasyRouteHelper::guessRoutePrefix](https://github.com/lingtalfi/Light_EasyRoute/blob/master/Helper/LightEasyRouteHelper.php#L39-L46)


See Also
================

The [LightEasyRouteHelper](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper.md) class.

Next method: [writeRouteToPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/writeRouteToPluginFile.md)<br>

