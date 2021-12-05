[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The DependencyTool class
================
2019-02-26 --> 2021-07-30






Introduction
============

The DependencyTool class.
This class helps resolving dependencies related problem.

See more about universe dependencies in the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).



Class synopsis
==============


class <span class="pl-k">DependencyTool</span>  {

- Methods
    - public static [getDependencyListRecursiveByUniverseDirPlanets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListRecursiveByUniverseDirPlanets.md)(string $uniDir, array $planetDotNames, ?bool $includeParents = true, ?array &$errors = [], ?array $options = []) : array
    - public static [parsePlanetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parsePlanetDependencies.md)(string $planetDir) : array
    - public static [parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir, ?array &$conf = [], ?array $postInstall = [], ?array $options = []) : string
    - public static [getUniverseAssetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getUniverseAssetDependencies.md)(string $planetDir) : array
    - public static [getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md)(string $planetDir) : array
    - public static [getDependencyArray](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyArray.md)(string $planetDir) : array
    - public static [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)(string $planetDir, ?array $options = []) : array
    - public static [getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListByFile.md)(string $file, ?array $options = []) : array
    - public static [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)(array $dependencyItem) : string
    - public static [writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md)(string $planetDir, ?array $postInstall = [], ?array $options = []) : bool
    - private static [collectDependenciesRecursively](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/collectDependenciesRecursively.md)(array &$ret, string $uniDir, string $planetDotName, ?array &$errors = []) : void

}






Methods
==============

- [DependencyTool::getDependencyListRecursiveByUniverseDirPlanets](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListRecursiveByUniverseDirPlanets.md) &ndash; Returns a list of sorted [planet dot names](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) corresponding to all the dependencies listed in the dependencies.byml file for the given planets, recursively.
- [DependencyTool::parsePlanetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parsePlanetDependencies.md) &ndash; Returns the real planet dependencies by scanning the planet folder.
- [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).
- [DependencyTool::getUniverseAssetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getUniverseAssetDependencies.md) &ndash; Returns the [universe asset dependencies](https://github.com/lingtalfi/NotationFan/blob/master/universe-assets.md#the-universeassetdependencies-trick) for a given planet directory.
- [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md) &ndash; Returns an array of dependency items for the given $planetDir.
- [DependencyTool::getDependencyArray](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyArray.md) &ndash; Returns the array contained in the dependencies.byml file if found, or an empty array otherwise.
- [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
- [DependencyTool::getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListByFile.md) &ndash; Parses the given dependencies.byml file, and returns an array of all dependencies found in it.
- [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.
- [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md) &ndash; Writes the dependencies.byml file at the root of the given $planetDir.
- [DependencyTool::collectDependenciesRecursively](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/collectDependenciesRecursively.md) &ndash; Collects the dependencies of the given planet recursively, and stores them in the given ret array.





Location
=============
Ling\UniverseTools\DependencyTool<br>
See the source code of [Ling\UniverseTools\DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php)



SeeAlso
==============
Previous class: [BangTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/BangTool.md)<br>Next class: [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md)<br>
