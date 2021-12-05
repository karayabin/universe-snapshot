[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The MetaInfoTool class
================
2019-02-26 --> 2021-07-30






Introduction
============

The MetaInfoTool class.

A planet should have a meta-info.byml file at the root of its directory.

The meta-info.byml contains various information about the planet, especially the current version of the planet.



Class synopsis
==============


class <span class="pl-k">MetaInfoTool</span>  {

- Methods
    - public static [parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md)(string $planetDir, ?array $options = []) : array
    - public static [getVersionByUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersionByUrl.md)($rawMetaInfoUrl) : string | null
    - public static [getVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersion.md)(string $planetDir) : string | null
    - public static [incrementVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/incrementVersion.md)(string $planetDir) : string
    - public static [writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md)(string $planetDir, array $info) : bool

}






Methods
==============

- [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md) &ndash; Returns an array of the meta info found in the given planet.
- [MetaInfoTool::getVersionByUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersionByUrl.md) &ndash; Returns the current version number of the planet, from the metaInfo url.
- [MetaInfoTool::getVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/getVersion.md) &ndash; Returns the version number associated with the given planetDir, if found in the meta-info file.
- [MetaInfoTool::incrementVersion](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/incrementVersion.md) &ndash; Increments the version number found in the meta-info.byml file, and returns that number.
- [MetaInfoTool::writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md) &ndash; Writes the given meta $info to the meta-info.byml file of the given $planetDir.





Location
=============
Ling\UniverseTools\MetaInfoTool<br>
See the source code of [Ling\UniverseTools\MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/MetaInfoTool.php)



SeeAlso
==============
Previous class: [MachineUniverseTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MachineUniverseTool.md)<br>Next class: [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)<br>
