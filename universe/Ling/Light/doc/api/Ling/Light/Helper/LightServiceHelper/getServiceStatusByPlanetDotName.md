[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\LightServiceHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md)


LightServiceHelper::getServiceStatusByPlanetDotName
================



LightServiceHelper::getServiceStatusByPlanetDotName — Returns the status of a service for a given app and planetDotName.




Description
================


public static [LightServiceHelper::getServiceStatusByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/getServiceStatusByPlanetDotName.md)(string $appDir, string $planetDotName) : int




Returns the status of a service for a given app and planetDotName.
The return is an int, it can be one of:
- 0: not existing (or unrecognized)
- 1: enabled
- 2: disabled




Parameters
================


- appDir

    

- planetDotName

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [LightServiceHelper::getServiceStatusByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/Helper/LightServiceHelper.php#L27-L38)


See Also
================

The [LightServiceHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper.md) class.

Next method: [getServiceFileByPlanetDotName](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightServiceHelper/getServiceFileByPlanetDotName.md)<br>

