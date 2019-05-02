[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The MetaInfoTool class
================
2019-02-26 --> 2019-04-30






Introduction
============

The MetaInfoTool class.

A planet should have a meta-info.byml file at the root of its directory.

The meta-info.byml contains various information about the planet, especially the current version of the planet.



Class synopsis
==============


class <span class="pl-k">MetaInfoTool</span>  {

- Methods
    - public static [parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md)(string $planetDir) : array
    - public static [writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md)(string $planetDir, array $info) : bool

}






Methods
==============

- [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md) &ndash; Returns an array of the meta info found in the given planet.
- [MetaInfoTool::writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md) &ndash; Writes the given meta $info to the meta-info.byml file of the given $planetDir.





Location
=============
Ling\UniverseTools\MetaInfoTool


SeeAlso
==============
Previous class: [GalaxyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/GalaxyTool.md)<br>Next class: [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)<br>
