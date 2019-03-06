[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)<br>
[Back to the UniverseTools\PlanetTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool.md)


PlanetTool::getClassNames
================



PlanetTool::getClassNames — Parses the given directory recursively and returns an array containing the names of all [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes found.




Description
================


public static [PlanetTool::getClassNames](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool/getClassNames.md)(?$planetDir) : array




Parses the given directory recursively and returns an array containing the names of all [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes found.

Example:
-----------

The following code:

```php
$planetDir = "/komin/jin_site_demo/universe/UniverseTools";
az(PlanetTool::getClassNames($planetDir));
```


Will output:

```html
array(3) {
[0] => string(28) "UniverseTools\DependencyTool"
[1] => string(46) "UniverseTools\Exception\UniverseToolsException"
[2] => string(24) "UniverseTools\PlanetTool"
}

```




Parameters
================


- planetDir

    


Return values
================

Returns array.







See Also
================

The [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool.md) class.

Next method: [getPlanetDirs](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/PlanetTool/getPlanetDirs.md)<br>

