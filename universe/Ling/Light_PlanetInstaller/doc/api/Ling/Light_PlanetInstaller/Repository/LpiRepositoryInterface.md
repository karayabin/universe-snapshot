[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiRepositoryInterface class
================
2020-12-08 --> 2021-05-03






Introduction
============

The LpiRepositoryInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LpiRepositoryInterface</span>  {

- Methods
    - abstract public [hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/hasPlanet.md)(string $planetDot, string $realVersion) : bool
    - abstract public [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getFirstVersionWithMinimumNumber.md)(string $planetDot, string $realVersion) : string | false
    - abstract public [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void
    - abstract public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getDependencies.md)(string $planetDot, string $realVersion) : array
    - abstract public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getUniDependencies.md)(string $planetDot, string $realVersion) : array

}






Methods
==============

- [LpiRepositoryInterface::hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/hasPlanet.md) &ndash; Returns whether the repository contains a planet matching the given arguments.
- [LpiRepositoryInterface::getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getFirstVersionWithMinimumNumber.md) &ndash; Returns the real version number of the planet that is at least $realVersion, or false if not possible.
- [LpiRepositoryInterface::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/copy.md) &ndash; Make a copy of the given planet so that the copy's path is $dstDir.
- [LpiRepositoryInterface::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiRepositoryInterface::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getUniDependencies.md) &ndash; Returns the array of dependencies, in the uni style.





Location
=============
Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface<br>
See the source code of [Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiRepositoryInterface.php)



SeeAlso
==============
Previous class: [LpiLocalUniverseRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md)<br>Next class: [LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)<br>
