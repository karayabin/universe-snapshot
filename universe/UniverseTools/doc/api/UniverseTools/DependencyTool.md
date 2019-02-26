[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)



The DependencyTool class
================
2019-02-26 --> 2019-02-26






Introduction
============

The DependencyTool class.
This class helps resolving dependencies related problem.

See more about universe dependencies in the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).



Class synopsis
==============


class <span class="pl-k">DependencyTool</span>  {

- Methods
    - public static [parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir, $br = &lt;br&gt;) : string
    - public static [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md)(?$planetDir) : array
    - public static [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyHomeUrl.md)(array $dependencyItem) : string

}






Methods
==============

- [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/parseDumpDependencies.md) &ndash; A method to help creating the **dependencies.byml** file.
- [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md) &ndash; and return an array of all dependencies found in it.
- [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyHomeUrl.md) &ndash; Returns the home url (i.e.





Location
=============
UniverseTools\DependencyTool