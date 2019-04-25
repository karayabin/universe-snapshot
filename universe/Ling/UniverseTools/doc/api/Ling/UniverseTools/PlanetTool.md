[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The PlanetTool class
================
2019-02-26 --> 2019-04-25






Introduction
============

The PlanetTool class.

Contains methods related to a planet, like listing the [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes found in a planet for instance.



Class synopsis
==============


class <span class="pl-k">PlanetTool</span>  {

- Methods
    - public static [getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md)(?$planetDir) : array
    - public static [getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md)(string $universeDir) : array
    - public static [getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md)(string $planetDir) : array | false
    - public static [getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md)(string $longPlanetName) : array | false

}






Methods
==============

- [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md) &ndash; Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.
- [PlanetTool::getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md) &ndash; Returns the list of planet dirs for a given $universeDir.
- [PlanetTool::getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
- [PlanetTool::getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.





Location
=============
Ling\UniverseTools\PlanetTool


SeeAlso
==============
Previous class: [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md)<br>
