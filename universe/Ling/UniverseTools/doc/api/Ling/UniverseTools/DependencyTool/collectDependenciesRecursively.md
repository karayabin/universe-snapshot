[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::collectDependenciesRecursively
================



DependencyTool::collectDependenciesRecursively — Collects the dependencies of the given planet recursively, and stores them in the given ret array.




Description
================


private static [DependencyTool::collectDependenciesRecursively](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/collectDependenciesRecursively.md)(array &$ret, string $uniDir, string $planetDotName, ?array &$errors = []) : void




Collects the dependencies of the given planet recursively, and stores them in the given ret array.

Errors are put in the $errors variable.




Parameters
================


- ret

    

- uniDir

    

- planetDotName

    

- errors

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [DependencyTool::collectDependenciesRecursively](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L583-L601)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md)<br>

