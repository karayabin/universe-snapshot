[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyListByFile
================



DependencyTool::getDependencyListByFile — Parses the given dependencies.byml file, and returns an array of all dependencies found in it.




Description
================


public static [DependencyTool::getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListByFile.md)(string $file, ?array $options = []) : array




Parses the given dependencies.byml file, and returns an array of all dependencies found in it.

See the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more information.

The array is a list of dependencyItem, each of which being an array with 2 items:

- 0: the galaxy identifier/ dependency system
- 1: the dependency identifier (name or url, ...), aka packageImportName.


Available options are:
- dotNames: bool=false, if true, each returned item is a planetDotName instead




Parameters
================


- file

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [DependencyTool::getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L446-L469)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)<br>Next method: [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)<br>

