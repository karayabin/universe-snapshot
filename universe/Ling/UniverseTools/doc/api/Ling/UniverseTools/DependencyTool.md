[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The DependencyTool class
================
2019-02-26 --> 2019-04-29






Introduction
============

The DependencyTool class.
This class helps resolving dependencies related problem.

See more about universe dependencies in the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).



Class synopsis
==============


class <span class="pl-k">DependencyTool</span>  {

- Methods
    - public static [parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir, array &$conf = [], array $postInstall = []) : string
    - public static [getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md)(string $planetDir) : array
    - public static [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)(string $planetDir) : array
    - public static [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)(array $dependencyItem) : string
    - public static [writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md)(string $planetDir, array $postInstall = []) : bool

}






Methods
==============

- [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).
- [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md) &ndash; Returns an array of dependency items for the given $planetDir.
- [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
- [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.
- [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md) &ndash; Writes the dependencies.byml file at the root of the given $planetDir.





Location
=============
Ling\UniverseTools\DependencyTool


SeeAlso
==============
Next class: [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md)<br>
