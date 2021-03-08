[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiLocalUniverseRepository class
================
2020-12-08 --> 2021-03-05






Introduction
============

The LpiLocalUniverseRepository class.



Class synopsis
==============


class <span class="pl-k">LpiLocalUniverseRepository</span> implements [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) {

- Methods
    - public [getPlanetPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getPlanetPath.md)(string $planetDot) : string | false
    - public [hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/hasPlanet.md)(string $planetDot, string $realVersion) : bool
    - public [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getFirstVersionWithMinimumNumber.md)(string $planetDot, string $realVersion) : string | false
    - public [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void
    - public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getDependencies.md)(string $planetDot, string $realVersion) : array
    - public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getUniDependencies.md)(string $planetDot, string $realVersion) : array

}






Methods
==============

- [LpiLocalUniverseRepository::getPlanetPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getPlanetPath.md) &ndash; Returns the planet path in the local universe that matches the given planet dot name, or false otherwise.
- [LpiLocalUniverseRepository::hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/hasPlanet.md) &ndash; Returns whether the repository contains a planet matching the given arguments.
- [LpiLocalUniverseRepository::getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getFirstVersionWithMinimumNumber.md) &ndash; Returns the real version number of the planet that is at least $realVersion, or false if not possible.
- [LpiLocalUniverseRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/copy.md) &ndash; Make a copy of the given planet so that the copy's path is $dstDir.
- [LpiLocalUniverseRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiLocalUniverseRepository::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getUniDependencies.md) &ndash; Returns the array of dependencies, in the uni style.





Location
=============
Ling\Light_PlanetInstaller\Repository\LpiLocalUniverseRepository<br>
See the source code of [Ling\Light_PlanetInstaller\Repository\LpiLocalUniverseRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiLocalUniverseRepository.php)



SeeAlso
==============
Previous class: [LpiGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository.md)<br>Next class: [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)<br>
