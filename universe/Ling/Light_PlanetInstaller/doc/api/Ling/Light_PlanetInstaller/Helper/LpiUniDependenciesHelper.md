[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiUniDependenciesHelper class
================
2020-12-08 --> 2021-05-31






Introduction
============

The LpiUniDependenciesHelper class.



Class synopsis
==============


class <span class="pl-k">LpiUniDependenciesHelper</span>  {

- Properties
    - protected [Ling\Light_PlanetInstaller\Repository\LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)|null [$webRepository](#property-webRepository) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/__construct.md)() : void
    - public [getUniDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/getUniDependenciesByPlanetDir.md)(string $planetDir, ?array $options = []) : array
    - private [collectUniDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/collectUniDependenciesRecursive.md)(string $planetDotName, array &$ret) : void
    - private [getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/getWebRepository.md)() : [LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)

}




Properties
=============

- <span id="property-webRepository"><b>webRepository</b></span>

    This property holds the webRepository for this instance.
    
    



Methods
==============

- [LpiUniDependenciesHelper::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/__construct.md) &ndash; Builds the LpiUniDependenciesHelper instance.
- [LpiUniDependenciesHelper::getUniDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/getUniDependenciesByPlanetDir.md) &ndash; Returns an array of uni dependencies for the given planet.
- [LpiUniDependenciesHelper::collectUniDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/collectUniDependenciesRecursive.md) &ndash; Collects the uni dependencies recursively, and stores them in the $ret array.
- [LpiUniDependenciesHelper::getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/getWebRepository.md) &ndash; Returns the webRepository of this instance.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiUniDependenciesHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiUniDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiUniDependenciesHelper.php)



SeeAlso
==============
Previous class: [LpiPlanetHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiPlanetHelper.md)<br>Next class: [LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md)<br>
