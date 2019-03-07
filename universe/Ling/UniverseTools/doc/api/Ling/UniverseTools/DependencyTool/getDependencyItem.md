[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyItem
================



DependencyTool::getDependencyItem — Returns an array of dependency items for the given $planetDir.




Description
================


public static [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md)(string $planetDir) : array




Returns an array of dependency items for the given $planetDir.


Note: it will parse the dependencies.byml file at the root of the planet dir.
If the planet dir does not exist, an UniverseToolsException will be thrown.
If the dependencies.byml file does not exist, an array will be returned.


The returned array has the following structure:

- dependencies:
0: dependency system / galaxy identifier
1: the dependency identifier (name or url, ...)
- post_install: array of post install directives




Parameters
================


- planetDir

    


Return values
================

Returns array.







See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md)<br>Next method: [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)<br>

