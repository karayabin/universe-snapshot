[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiFileHelper class
================
2020-12-08 --> 2021-03-05






Introduction
============

The LpiFileHelper class.



Class synopsis
==============


class <span class="pl-k">LpiFileHelper</span>  {

- Methods
    - public static [upgradeLpiPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/upgradeLpiPlanets.md)(string $appDir, ?string $planetDotName = null) : array
    - public static [getPlanetsMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/getPlanetsMap.md)(string $appDir) : array
    - public static [getLpiPathByAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/getLpiPathByAppDir.md)(string $appDir) : string

}






Methods
==============

- [LpiFileHelper::upgradeLpiPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/upgradeLpiPlanets.md) &ndash; Upgrades planets in the lpi.byml file of the application, for either the specified planetDotName only, or for all the planets found in the application (by default), then return the file's planets.
- [LpiFileHelper::getPlanetsMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/getPlanetsMap.md) &ndash; Returns the planet maps defined in the lpi.byml file of the application, if any.
- [LpiFileHelper::getLpiPathByAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/getLpiPathByAppDir.md) &ndash; Returns the path to the lpi.byml file of the given application.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiFileHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiFileHelper.php)



SeeAlso
==============
Previous class: [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)<br>Next class: [LpiFormatHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFormatHelper.md)<br>
