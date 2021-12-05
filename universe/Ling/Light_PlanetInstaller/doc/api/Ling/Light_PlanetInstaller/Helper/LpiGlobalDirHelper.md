[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiGlobalDirHelper class
================
2020-12-08 --> 2021-07-08






Introduction
============

The LpiGlobalDirHelper class.



Class synopsis
==============


class <span class="pl-k">LpiGlobalDirHelper</span>  {

- Methods
    - public static [getPlanetVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/getPlanetVersions.md)(string $planetDot) : array
    - public static [copyToGlobalDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/copyToGlobalDir.md)(string $galaxy, string $planet, string $realVersion, string $planetDir) : void
    - public static [globalDirHasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/globalDirHasPlanet.md)(string $planetDot, string $realVersion) : bool
    - public static [getPlanetPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/getPlanetPath.md)(string $galaxy, $planet, $realVersion) : string

}






Methods
==============

- [LpiGlobalDirHelper::getPlanetVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/getPlanetVersions.md) &ndash; Returns the version numbers available for the given planet (in the global dir repo), sorted by increasing value.
- [LpiGlobalDirHelper::copyToGlobalDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/copyToGlobalDir.md) &ndash; Copies the planetDir to the global dir.
- [LpiGlobalDirHelper::globalDirHasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/globalDirHasPlanet.md) &ndash; Returns whether the global directory contains the planet identified by the given $planetDot, in the specified $realVersion.
- [LpiGlobalDirHelper::getPlanetPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiGlobalDirHelper/getPlanetPath.md) &ndash; Returns the path to the planet in the global directory.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiGlobalDirHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiGlobalDirHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiGlobalDirHelper.php)



SeeAlso
==============
Previous class: [LpiFormatHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFormatHelper.md)<br>Next class: [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)<br>
