[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiHelper class
================
2020-12-08 --> 2021-02-11






Introduction
============

The LpiHelper class.



Class synopsis
==============


class <span class="pl-k">LpiHelper</span>  {

- Methods
    - public static [createGlobalDirByUniverseDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createGlobalDirByUniverseDir.md)(string $universeDir, ?bool $debug = false) : void
    - public static [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getDependencyListByPlanetDir.md)(string $planetDir, ?array $options = []) : array
    - public static [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateLpiDepsByPlanetDir.md)(string $planetDir) : void
    - public static [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void
    - public static [getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLpiDepsByLocation.md)(string $location, string $version) : array
    - public static [uniDependenciesToPlanetDotList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/uniDependenciesToPlanetDotList.md)(array $uniDependencies) : array

}






Methods
==============

- [LpiHelper::createGlobalDirByUniverseDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createGlobalDirByUniverseDir.md) &ndash; Create a global dir planet for every planets listed in the given universe dir.
- [LpiHelper::getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getDependencyListByPlanetDir.md) &ndash; Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
- [LpiHelper::updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateLpiDepsByPlanetDir.md) &ndash; Updates the lpi-deps file for the planet which dir is given.
- [LpiHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createLpiDepsFileByPlanetDir.md) &ndash; Creates the lpi-deps file for the given planetDir.
- [LpiHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLpiDepsByLocation.md) &ndash; Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.
- [LpiHelper::uniDependenciesToPlanetDotList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/uniDependenciesToPlanetDotList.md) &ndash; Creates a list of planetDot names out of the given uni dependencies.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php)



SeeAlso
==============
Previous class: [LpiGlobalDirHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper.md)<br>Next class: [LpiImporterHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper.md)<br>
