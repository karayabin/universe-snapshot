[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::writeDependencies
================



DependencyTool::writeDependencies — Writes the dependencies.byml file at the root of the given $planetDir.




Description
================


public static [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md)(string $planetDir, array $postInstall = []) : bool




Writes the dependencies.byml file at the root of the given $planetDir.

If the postInstall array is passed, it will be merged with any existing post install directives that might
already be there (which might happen if the dependency file already exists).




Parameters
================


- planetDir

    

- postInstall

    


Return values
================

Returns bool.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;







Source Code
===========
See the source code for method [DependencyTool::writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L352-L366)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)<br>

