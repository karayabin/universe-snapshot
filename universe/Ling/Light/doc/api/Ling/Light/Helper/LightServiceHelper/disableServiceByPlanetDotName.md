[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\LightServiceHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md)


LightServiceHelper::disableServiceByPlanetDotName
================



LightServiceHelper::disableServiceByPlanetDotName — Disables the service file for the given planet, and returns an int.




Description
================


public static [LightServiceHelper::disableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/disableServiceByPlanetDotName.md)(string $appDir, string $planetDotName) : int




Disables the service file for the given planet, and returns an int.
The int is:

- 0: if the service file doesn't exist (in which case it cannot be disabled)
- 1: if the service file existed and has been successfully disabled




Parameters
================


- appDir

    

- planetDotName

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightServiceHelper::disableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/Helper/LightServiceHelper.php#L66-L75)


See Also
================

The [LightServiceHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md) class.

Previous method: [getServiceFileByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/getServiceFileByPlanetDotName.md)<br>Next method: [enableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/enableServiceByPlanetDotName.md)<br>

