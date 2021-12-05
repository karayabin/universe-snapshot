[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::parseDumpDependencies
================



DependencyTool::parseDumpDependencies — A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).




Description
================


public static [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir, ?array &$conf = [], ?array $postInstall = [], ?array $options = []) : string




A method to help creating the [dependencies.byml file](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).


Parses the use statements of all the [BSR-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes
found in the planet, and displays the content of a basic **dependencies.byml** file out of it.

Note: This method only works if there is an effective bsr-1 autoloader in place.
Note2: This method works by parsing the use statements in your classes, so make sure to clean your import use statements
     before running this method.



Available options are:
- ignoreFilesStartingWith: array of prefixes to look for. If a prefix matches the beginning of a (relative) file path (relative to the planet root dir),
         then the file is excluded.




Parameters
================


- planetDir

    The directory path of the planet to scan.

- conf

    A reference to the configuration array created, which has the following structure:
- dependencies: array of galaxyName => planets (list of planet names)
- post_install: the given $postInstall array
- ...other properties might be added.

- postInstall

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;





Examples
================

Example 1: Simple parseDumpDependencies example
---------------

The following code:

```php
$planetDir = "/komin/jin_site_demo/universe/UniverseTools";
echo DependencyTool::parseDumpDependencies($planetDir);
```



Will output:

```html
BabyYaml: *
DirScanner: *
TokenFun: *
```



Source Code
===========
See the source code for method [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L131-L289)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [parsePlanetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/parsePlanetDependencies.md)<br>Next method: [getUniverseAssetDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getUniverseAssetDependencies.md)<br>

