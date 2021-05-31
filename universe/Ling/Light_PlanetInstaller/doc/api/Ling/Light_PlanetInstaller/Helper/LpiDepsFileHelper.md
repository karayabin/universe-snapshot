[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiDepsFileHelper class
================
2020-12-08 --> 2021-05-31






Introduction
============

The LpiDepsFileHelper class.



Class synopsis
==============


class <span class="pl-k">LpiDepsFileHelper</span>  {

- Methods
    - public static [getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md)(string $planetDir) : string
    - public static [getLpiDepsContentByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsContentByLocation.md)(string $location) : array
    - public static [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)(string $planetDir) : void
    - private static [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array
    - private static [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void

}






Methods
==============

- [LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md) &ndash; Returns the lpi-deps.byml file location from the given planetDir.
- [LpiDepsFileHelper::getLpiDepsContentByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsContentByLocation.md) &ndash; Returns the content of the lpi deps file as an array.
- [LpiDepsFileHelper::updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md) &ndash; Updates the lpi-deps file for the planet which dir is given.
- [LpiDepsFileHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md) &ndash; Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
- [LpiDepsFileHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md) &ndash; Creates the lpi-deps file for the given planetDir.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php)



SeeAlso
==============
Previous class: [LpiConfHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper.md)<br>Next class: [LpiFormatHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFormatHelper.md)<br>
