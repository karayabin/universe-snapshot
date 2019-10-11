[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\PlanetTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)


PlanetTool::getClassNames
================



PlanetTool::getClassNames — Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.




Description
================


public static [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getClassNames.md)(?$planetDir, array $options = []) : array




Parses the given directory recursively and returns an array containing the names of all [bsr-1](https://github.com/lingtalfi/TheScientist/blob/master/bsr-1.md) classes found.

Example:
-----------

The following code:

```php
$planetDir = "/komin/jin_site_demo/universe/Ling/UniverseTools";
az(PlanetTool::getClassNames($planetDir));
```


Will output:

```html
array(3) {
[0] => string(33) "Ling\UniverseTools\DependencyTool"
[1] => string(51) "Ling\UniverseTools\Exception\UniverseToolsException"
[2] => string(29) "Ling\UniverseTools\PlanetTool"
}

```




Available options are:
- ignoreFilesStartingWith: array of prefixes to look for. If a prefix matches the beginning of a (relative) file path (relative to the planet root dir),
         then the file is excluded.




Parameters
================


- planetDir

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;







Source Code
===========
See the source code for method [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/PlanetTool.php#L58-L128)


See Also
================

The [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md) class.

Next method: [getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool/getPlanetDirs.md)<br>

