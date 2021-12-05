[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\LightServiceHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md)


LightServiceHelper::enableServiceByPlanetDotName
================



LightServiceHelper::enableServiceByPlanetDotName — Enables the service file for the given planet, and returns an int.




Description
================


public static [LightServiceHelper::enableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/enableServiceByPlanetDotName.md)(string $appDir, string $planetDotName) : int




Enables the service file for the given planet, and returns an int.
The int is:

- 0: if the disabled service file doesn't exist (in which case it cannot be enabled)
- 1: if the disabled service file existed and has been successfully enabled




Parameters
================


- appDir

    

- planetDotName

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightServiceHelper::enableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/Helper/LightServiceHelper.php#L89-L97)


See Also
================

The [LightServiceHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md) class.

Previous method: [disableServiceByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/disableServiceByPlanetDotName.md)<br>

