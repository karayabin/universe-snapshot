[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiHelper class
================
2020-12-08 --> 2021-05-31






Introduction
============

The LpiHelper class.



Class synopsis
==============


class <span class="pl-k">LpiHelper</span>  {

- Methods
    - public static [getSelfTmpDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getSelfTmpDir.md)() : string
    - public static [getSessionDirsPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getSessionDirsPath.md)() : string
    - public static [getUniverseMapsDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getUniverseMapsDir.md)(string $appDir) : string
    - public static [getPlanetInstallerInstance](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getPlanetInstallerInstance.md)(string $planetDotName) : object | false
    - public static [uniDependenciesToPlanetDotList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/uniDependenciesToPlanetDotList.md)(array $uniDependencies) : array

}






Methods
==============

- [LpiHelper::getSelfTmpDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getSelfTmpDir.md) &ndash; Returns a temporary directory used internally by this planet.
- [LpiHelper::getSessionDirsPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getSessionDirsPath.md) &ndash; Returns the location of the "session dirs" directory.
- [LpiHelper::getUniverseMapsDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getUniverseMapsDir.md) &ndash; Returns the path to the universe maps directory.
- [LpiHelper::getPlanetInstallerInstance](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getPlanetInstallerInstance.md) &ndash; Returns the planet installer instance for the given planet, if it exists, or false otherwise.
- [LpiHelper::uniDependenciesToPlanetDotList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/uniDependenciesToPlanetDotList.md) &ndash; Creates a list of planetDot names out of the given uni dependencies.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php)



SeeAlso
==============
Previous class: [LpiGlobalDirHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper.md)<br>Next class: [LpiImporterHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper.md)<br>
