[Back to the Ling/Light_EasyRoute api](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute.md)



The LightEasyRouteHelper class
================
2019-08-21 --> 2021-07-27






Introduction
============

The LightEasyRouteHelper class.



Class synopsis
==============


class <span class="pl-k">LightEasyRouteHelper</span>  {

- Methods
    - public static [guessRoutePrefix](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/guessRoutePrefix.md)(string $appDir, string $planetDotName) : string
    - public static [writeRouteToPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/writeRouteToPluginFile.md)(string $appDir, string $planetDotName, string $routeName, array $route) : void
    - public static [getPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getPluginFile.md)(string $appDir, string $planetDotName) : string
    - public static [copyRoutesFromPluginToMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/copyRoutesFromPluginToMaster.md)(string $appDir, string $subscriberPlanetDotName) : void
    - public static [removeRoutesFromMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/removeRoutesFromMaster.md)(string $appDir, string $subscriberPlanetDotName) : void
    - public static [getMasterPath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterPath.md)(string $appDir) : string
    - public static [getMasterRelativePath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterRelativePath.md)() : string

}






Methods
==============

- [LightEasyRouteHelper::guessRoutePrefix](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/guessRoutePrefix.md) &ndash; A route prefix is a namespace that your planet uses to distinguish its routes from other planets' routes.
- [LightEasyRouteHelper::writeRouteToPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/writeRouteToPluginFile.md) &ndash; Writes a route to the plugin file.
- [LightEasyRouteHelper::getPluginFile](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getPluginFile.md) &ndash; Returns the expected plugin file for registering routes with our open registration system.
- [LightEasyRouteHelper::copyRoutesFromPluginToMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/copyRoutesFromPluginToMaster.md) &ndash; Merges the planet's route declaration file (if it exists) into the master.
- [LightEasyRouteHelper::removeRoutesFromMaster](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/removeRoutesFromMaster.md) &ndash; Removes the planet's route declaration file (if it exists) into the master.
- [LightEasyRouteHelper::getMasterPath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterPath.md) &ndash; Returns the path to the routes master declaration file.
- [LightEasyRouteHelper::getMasterRelativePath](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Helper/LightEasyRouteHelper/getMasterRelativePath.md) &ndash; Returns the relative path (from the app root dir) to the master.





Location
=============
Ling\Light_EasyRoute\Helper\LightEasyRouteHelper<br>
See the source code of [Ling\Light_EasyRoute\Helper\LightEasyRouteHelper](https://github.com/lingtalfi/Light_EasyRoute/blob/master/Helper/LightEasyRouteHelper.php)



SeeAlso
==============
Previous class: [LightEasyRouteException](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Exception/LightEasyRouteException.md)<br>Next class: [LightEasyRouteService](https://github.com/lingtalfi/Light_EasyRoute/blob/master/doc/api/Ling/Light_EasyRoute/Service/LightEasyRouteService.md)<br>
