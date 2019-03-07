[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::parseDumpDependencies
================



DependencyTool::parseDumpDependencies — A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).




Description
================


public static [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir) : string




A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).


Parses the use statements of all the [BSR-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes
found in the planet, and displays the content of a basic **dependencies.byml** file out of it.

Note: This method only works if there is an effective bsr-1 autoloader in place.
Note2: This method works by parsing the use statements in your classes, so make sure to clean your import use statements
before running this method.




Parameters
================


- planetDir

    The directory path of the planet to scan.


Return values
================

Returns string.







See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Next method: [getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md)<br>

