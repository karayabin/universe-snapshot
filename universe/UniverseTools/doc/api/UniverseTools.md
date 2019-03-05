UniverseTools
================
2019-02-26 --> 2019-03-05




Table of contents
===========

- [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md) &ndash; The DependencyTool class.
    - [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the **dependencies.byml** file.
    - [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyItem.md) &ndash; Returns an array of dependency items for the given $planetDir.
    - [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
    - [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.
- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/Exception/UniverseToolsException.md) &ndash; The base exception class for the UniverseTools planet.
- [MetaInfoTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/MetaInfoTool.md) &ndash; The MetaInfoTool class.
    - [MetaInfoTool::parseInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/MetaInfoTool/parseInfo.md) &ndash; Returns an array of the meta info found in the given planet.
- [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool.md) &ndash; The PlanetTool class.
    - [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool/getClassNames.md) &ndash; Parses the given directory recursively and returns an array containing the names of all [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes found.
    - [PlanetTool::getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool/getPlanetDirs.md) &ndash; Returns the list of planet dirs for a given $universeDir.


Dependencies
============
- [Universe: BabyYaml](https://github.com/karayabin/universe-snapshot/tree/master/universe/BabyYaml)


