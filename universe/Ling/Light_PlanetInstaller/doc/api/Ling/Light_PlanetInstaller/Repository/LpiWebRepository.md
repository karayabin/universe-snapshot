[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiWebRepository class
================
2020-12-08 --> 2021-02-11






Introduction
============

The LpiWebRepository class.



Class synopsis
==============


class <span class="pl-k">LpiWebRepository</span> implements [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) {

- Methods
    - public [hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/hasPlanet.md)(string $planetDot, string $realVersion) : bool
    - public [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getFirstVersionWithMinimumNumber.md)(string $planetDot, string $realVersion) : string | false
    - public [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void
    - public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getDependencies.md)(string $planetDot, string $realVersion) : array
    - public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getUniDependencies.md)(string $planetDot, string $realVersion) : array

}






Methods
==============

- [LpiWebRepository::hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/hasPlanet.md) &ndash; Returns whether the repository contains a planet matching the given arguments.
- [LpiWebRepository::getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getFirstVersionWithMinimumNumber.md) &ndash; Returns the real version number of the planet that is at least $realVersion, or false if not possible.
- [LpiWebRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/copy.md) &ndash; Make a copy of the given planet so that the copy's path is $dstDir.
- [LpiWebRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiWebRepository::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getUniDependencies.md) &ndash; Returns the array of dependencies, in the uni style.





Location
=============
Ling\Light_PlanetInstaller\Repository\LpiWebRepository<br>
See the source code of [Ling\Light_PlanetInstaller\Repository\LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiWebRepository.php)



SeeAlso
==============
Previous class: [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)<br>Next class: [LightPlanetInstallerService](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService.md)<br>
