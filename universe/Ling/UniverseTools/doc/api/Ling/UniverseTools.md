Ling/UniverseTools
================
2019-02-26 --> 2019-09-23




Table of contents
===========

- [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) &ndash; The DependencyTool class.
    - [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).
    - [DependencyTool::getUniverseAssetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getUniverseAssetDependencies.md) &ndash; Returns the [universe asset dependencies](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md#the-universeassetdependencies-trick) for a given planet directory.
    - [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md) &ndash; Returns an array of dependency items for the given $planetDir.
    - [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
    - [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.
    - [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md) &ndash; Writes the dependencies.byml file at the root of the given $planetDir.
- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md) &ndash; The base exception class for the UniverseTools planet.
- [GalaxyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/GalaxyTool.md) &ndash; The GalaxyTool class.
    - [GalaxyTool::getKnownGalaxies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/GalaxyTool/getKnownGalaxies.md) &ndash; Returns the array of known galaxies.
- [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool.md) &ndash; The MetaInfoTool class.
    - [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/parseInfo.md) &ndash; Returns an array of the meta info found in the given planet.
    - [MetaInfoTool::writeInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/MetaInfoTool/writeInfo.md) &ndash; Writes the given meta $info to the meta-info.byml file of the given $planetDir.
- [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md) &ndash; The PlanetTool class.
    - [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md) &ndash; Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.
    - [PlanetTool::getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md) &ndash; Returns the list of planet dirs for a given $universeDir.
    - [PlanetTool::getGalaxyNamePlanetNameByDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByDir.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
    - [PlanetTool::getGalaxyNamePlanetNameByPlanetName](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getGalaxyNamePlanetNameByPlanetName.md) &ndash; Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [TokenFun](https://github.com/lingtalfi/TokenFun)


