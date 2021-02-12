[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiApplicationRepository class
================
2020-12-08 --> 2021-02-11






Introduction
============

The LpiApplicationRepository class.



Class synopsis
==============


class <span class="pl-k">LpiApplicationRepository</span> implements [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) {

- Properties
    - protected string [$appDir](#property-appDir) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/__construct.md)() : void
    - public [setAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/setAppDir.md)(string $appDir) : void
    - public [hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/hasPlanet.md)(string $planetDot, string $realVersion) : bool
    - public [getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getFirstVersionWithMinimumNumber.md)(string $planetDot, string $realVersion) : string | false
    - public [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/copy.md)(string $planetDot, string $realVersion, string $dstDir, ?array &$warnings = []) : void
    - public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getDependencies.md)(string $planetDot, string $realVersion) : array
    - public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getUniDependencies.md)(string $planetDot, string $realVersion) : array

}




Properties
=============

- <span id="property-appDir"><b>appDir</b></span>

    This property holds the appDir for this instance.
    
    



Methods
==============

- [LpiApplicationRepository::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/__construct.md) &ndash; Builds the ApplicationRepository instance.
- [LpiApplicationRepository::setAppDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/setAppDir.md) &ndash; Sets the appDir.
- [LpiApplicationRepository::hasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/hasPlanet.md) &ndash; Returns whether the repository contains a planet matching the given arguments.
- [LpiApplicationRepository::getFirstVersionWithMinimumNumber](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getFirstVersionWithMinimumNumber.md) &ndash; Returns the real version number of the planet that is at least $realVersion, or false if not possible.
- [LpiApplicationRepository::copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/copy.md) &ndash; Make a copy of the given planet so that the copy's path is $dstDir.
- [LpiApplicationRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiApplicationRepository::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getUniDependencies.md) &ndash; Returns the array of dependencies, in the uni style.





Location
=============
Ling\Light_PlanetInstaller\Repository\LpiApplicationRepository<br>
See the source code of [Ling\Light_PlanetInstaller\Repository\LpiApplicationRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiApplicationRepository.php)



SeeAlso
==============
Previous class: [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md)<br>Next class: [LpiGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository.md)<br>
