[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The PlanetTool class
================
2019-02-26 --> 2021-07-30






Introduction
============

The PlanetTool class.

Contains methods related to a planet, like listing the [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes found in a planet for instance.



Class synopsis
==============


class <span class="pl-k">PlanetTool</span>  {

- Methods
    - public static [getPlanetDotNamesByWorkingDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNamesByWorkingDir.md)(string $workingDir) : array
    - public static [getVersionByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getVersionByPlanetDir.md)(string $planetDir) : string | null
    - public static [exists](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/exists.md)(string $planetDotName, string $applicationDir) : bool
    - public static [getPlanetSlashNameByDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetSlashNameByDotName.md)(string $planetDotName) : string
    - public static [getPlanetDirByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirByPlanetDotName.md)(string $planetDotName, string $appDir) : string
    - public static [getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md)($planetDir, ?array $options = []) : array
    - public static [getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md)(string $universeDir) : array
    - public static [getPlanetDotNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNames.md)(string $uniDir) : array
    - public static [getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md)(string $planetDir) : array | false
    - public static [getPlanetDotNameByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByPlanetDir.md)(string $planetDir) : string
    - public static [getTightPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getTightPlanetName.md)(string $planetName) : string
    - public static [getCompressedPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getCompressedPlanetName.md)(string $planetName) : string
    - public static [getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md)(string $longPlanetName) : array | false
    - public static [extractPlanetId](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetId.md)(string $planetId) : array
    - public static [extractPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetDotName.md)(string $planetDotName) : array
    - public static [getGalaxyPlanetByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyPlanetByClassName.md)(string $className) : array | false
    - public static [getPlanetDotNameByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByClassName.md)(string $className) : string
    - public static [importPlanetByExternalDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/importPlanetByExternalDir.md)(string $planetDot, string $extPlanetDir, string $appDir, ?array $options = []) : void
    - public static [installAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/installAssetsByPlanetDotName.md)(string $appDir, string $planetDotName) : void
    - public static [removeAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removeAssetsByPlanetDotName.md)(string $appDir, string $planetDotName) : void
    - public static [removePlanet](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removePlanet.md)(string $planetDot, string $appDir, ?array $options = []) : void

}






Methods
==============

- [PlanetTool::getPlanetDotNamesByWorkingDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNamesByWorkingDir.md) &ndash; Returns the list of the planet dot names present in the given working dir.
- [PlanetTool::getVersionByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getVersionByPlanetDir.md) &ndash; Returns the version number of the planet if found, or null otherwise.
- [PlanetTool::exists](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/exists.md) &ndash; Returns whether the given planet exists in the given app.
- [PlanetTool::getPlanetSlashNameByDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetSlashNameByDotName.md) &ndash; Returns the [planet slash name](https://github.com/karayabin/universe-snapshot#the-planet-slash-name) from the given planet dot name.
- [PlanetTool::getPlanetDirByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirByPlanetDotName.md) &ndash; Returns the location of the planet directory from the given planet dot name and app dir.
- [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md) &ndash; Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.
- [PlanetTool::getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md) &ndash; Returns the list of planet dirs for a given $universeDir.
- [PlanetTool::getPlanetDotNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNames.md) &ndash; Returns the array of planet dot names found in the given universe directory.
- [PlanetTool::getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
- [PlanetTool::getPlanetDotNameByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByPlanetDir.md) &ndash; Returns the planet dot name from the given planet dir.
- [PlanetTool::getTightPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getTightPlanetName.md) &ndash; Returns the [tight planet name](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/nomenclature.md#tight-planet-name) for a given planet.
- [PlanetTool::getCompressedPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getCompressedPlanetName.md) &ndash; Returns the [compressed planet name](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name) for a given planet.
- [PlanetTool::getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.
- [PlanetTool::extractPlanetId](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetId.md) &ndash; Returns an array containing the galaxy and the planet, based on the given planetId.
- [PlanetTool::extractPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/extractPlanetDotName.md) &ndash; Returns an array containing the galaxy and the planet, based on the given [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).
- [PlanetTool::getGalaxyPlanetByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyPlanetByClassName.md) &ndash; Returns an array containing the galaxy and planet contained in the given class name.
- [PlanetTool::getPlanetDotNameByClassName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDotNameByClassName.md) &ndash; Returns the page(planet dot name) from the given class name.
- [PlanetTool::importPlanetByExternalDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/importPlanetByExternalDir.md) &ndash; Imports a planet by copying its given external source dir to the target application.
- [PlanetTool::installAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/installAssetsByPlanetDotName.md) &ndash; Installs the assets of the given planet.
- [PlanetTool::removeAssetsByPlanetDotName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removeAssetsByPlanetDotName.md) &ndash; Removes the assets for the given planet.
- [PlanetTool::removePlanet](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/removePlanet.md) &ndash; Removes the given planet from the given app directory.





Location
=============
Ling\UniverseTools\PlanetTool<br>
See the source code of [Ling\UniverseTools\PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/PlanetTool.php)



SeeAlso
==============
Previous class: [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md)<br>Next class: [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)<br>
