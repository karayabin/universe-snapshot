[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiDependenciesHelper class
================
2020-12-08 --> 2021-03-05






Introduction
============

The LpiDependenciesHelper class.



Class synopsis
==============


class <span class="pl-k">LpiDependenciesHelper</span>  {

- Properties
    - protected [Ling\Light_PlanetInstaller\Repository\LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)|null [$webRepository](#property-webRepository) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/__construct.md)() : void
    - public [getLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDependenciesByPlanetDir.md)(string $planetDir, ?array $options = [], ?string &$lastVersion = null) : array
    - public [getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getSubscribersList.md)(string $planetDotName, string $uniDir, ?array &$noLpiFiles = [], ?array $options = []) : array
    - public [getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDepsFileDependenciesByPlanetDir.md)(string $planetDir) : array | false
    - private [collectLpiDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/collectLpiDependenciesRecursive.md)(string $planetDotName, string $versionExpr, array &$deps) : void
    - private [getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getWebRepository.md)() : [LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)

}




Properties
=============

- <span id="property-webRepository"><b>webRepository</b></span>

    This property holds the webRepository for this instance.
    
    



Methods
==============

- [LpiDependenciesHelper::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/__construct.md) &ndash; Builds the LpiDependenciesHelper instance.
- [LpiDependenciesHelper::getLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDependenciesByPlanetDir.md) &ndash; Returns an array of lpi dependencies for the given planet.
- [LpiDependenciesHelper::getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getSubscribersList.md) &ndash; Returns an array listing the planets that depend on the given planet, along with the version numbers.
- [LpiDependenciesHelper::getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDepsFileDependenciesByPlanetDir.md) &ndash; Returns all the lpi dependencies for the given planet dir, or false if no lpi-deps.byml file was found.
- [LpiDependenciesHelper::collectLpiDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/collectLpiDependenciesRecursive.md) &ndash; Collects the lpi dependencies recursively for the given planet, and stores them in the $deps array.
- [LpiDependenciesHelper::getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getWebRepository.md) &ndash; Returns the webRepository of this instance.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDependenciesHelper.php)



SeeAlso
==============
Previous class: [LpiConfHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper.md)<br>Next class: [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)<br>
