[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiDepsFileHelper class
================
2020-12-08 --> 2021-05-03






Introduction
============

The LpiDepsFileHelper class.



Class synopsis
==============


class <span class="pl-k">LpiDepsFileHelper</span>  {

- Methods
    - public static [getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md)(string $planetDir) : string
    - public static [getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLatestLpiDependenciesByPlanetDir.md)(string $planetDir) : array
    - public static [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)(string $planetDir) : void
    - public static [getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsByLocation.md)(string $location, string $version) : array
    - private static [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array
    - private static [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void

}






Methods
==============

- [LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md) &ndash; Returns the lpi-deps.byml file location from the given planetDir.
- [LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLatestLpiDependenciesByPlanetDir.md) &ndash; Returns an array containing [lpi-deps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-lpibyml-file) info for the last version of the given planet.
- [LpiDepsFileHelper::updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md) &ndash; Updates the lpi-deps file for the planet which dir is given.
- [LpiDepsFileHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsByLocation.md) &ndash; Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.
- [LpiDepsFileHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md) &ndash; Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
- [LpiDepsFileHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md) &ndash; Creates the lpi-deps file for the given planetDir.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php)



SeeAlso
==============
Previous class: [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)<br>Next class: [LpiFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper.md)<br>
