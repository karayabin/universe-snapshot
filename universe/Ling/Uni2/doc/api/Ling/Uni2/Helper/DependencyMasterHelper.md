[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The DependencyMasterHelper class
================
2019-03-12 --> 2019-07-18






Introduction
============

The DependencyMasterHelper class.
Contains helpers related to the [dependency master file](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-dependency-master-file).



Class synopsis
==============


class <span class="pl-k">DependencyMasterHelper</span>  {

- Methods
    - public static [findGalaxyByPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/findGalaxyByPlanet.md)(string $planetName, array $dependencyMaster) : false | string
    - public static [getGalaxies](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getGalaxies.md)(array $dependencyMaster) : array
    - public static [getPlanetItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getPlanetItem.md)(array $dependencyMaster, string $longPlanetName) : array | false
    - public static [getDependencyMapByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getDependencyMapByPlanetName.md)(string $planetName, array $dependencyMaster) : array
    - private static [collectDependenciesByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/collectDependenciesByPlanetName.md)(string $longPlanetName, array $dependencyMaster, array $galaxies, array &$dependencies = [], array &$postInstalls = [], bool $isRoot = false) : void

}






Methods
==============

- [DependencyMasterHelper::findGalaxyByPlanet](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/findGalaxyByPlanet.md) &ndash; Returns the name of the galaxy to which belongs the given $planetName.
- [DependencyMasterHelper::getGalaxies](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getGalaxies.md) &ndash; Returns the names of the galaxies present in the dependency master array.
- [DependencyMasterHelper::getPlanetItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getPlanetItem.md) &ndash; or false otherwise (if the planet is not referenced in the dependency master array, or the planet name is invalid).
- [DependencyMasterHelper::getDependencyMapByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getDependencyMapByPlanetName.md) &ndash; and returns a dependency map array.
- [DependencyMasterHelper::collectDependenciesByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/collectDependenciesByPlanetName.md) &ndash; Collects the dependencies and post_installs entries for the getDependencyMapByPlanetName method of the same class.





Location
=============
Ling\Uni2\Helper\DependencyMasterHelper<br>
See the source code of [Ling\Uni2\Helper\DependencyMasterHelper](https://github.com/lingtalfi/Uni2/blob/master/Helper/DependencyMasterHelper.php)



SeeAlso
==============
Previous class: [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md)<br>Next class: [MapHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/MapHelper.md)<br>
