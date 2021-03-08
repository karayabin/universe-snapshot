[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiGlobalDirRepository class
================
2020-12-08 --> 2021-03-05






Introduction
============

The LpiGlobalDirRepository class.



Class synopsis
==============


class <span class="pl-k">LpiGlobalDirRepository</span> implements [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) {

- Methods
    - public [hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/hasPlanet.md)(string $planetDot, string $realVersion) : bool
    - public [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getFirstVersionWithMinimumNumber.md)(string $planetDot, string $realVersion) : string | false
    - public [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void
    - public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getDependencies.md)(string $planetDot, string $realVersion) : array
    - public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getUniDependencies.md)(string $planetDot, string $realVersion) : array

}






Methods
==============

- [LpiGlobalDirRepository::hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/hasPlanet.md) &ndash; Returns whether the repository contains a planet matching the given arguments.
- [LpiGlobalDirRepository::getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getFirstVersionWithMinimumNumber.md) &ndash; Returns the real version number of the planet that is at least $realVersion, or false if not possible.
- [LpiGlobalDirRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/copy.md) &ndash; Make a copy of the given planet so that the copy's path is $dstDir.
- [LpiGlobalDirRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiGlobalDirRepository::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getUniDependencies.md) &ndash; Returns the array of dependencies, in the uni style.





Location
=============
Ling\Light_PlanetInstaller\Repository\LpiGlobalDirRepository<br>
See the source code of [Ling\Light_PlanetInstaller\Repository\LpiGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiGlobalDirRepository.php)



SeeAlso
==============
Previous class: [LpiApplicationRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository.md)<br>Next class: [LpiLocalUniverseRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md)<br>
