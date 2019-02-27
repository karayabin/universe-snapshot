[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)<br>
[Back to the UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyItem
================



DependencyTool::getDependencyItem — Returns an array of dependency items for the given $planetDir.




Description
================


public static [DependencyTool::getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyItem.md)(string $planetDir) : array




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





Examples
================

Example 1: simple getDependencyItem example
--------------



The following code:

```php
az(DependencyTool::getDependencyItem("/path/to/universe/InvisiblePlanet"));
```


Will output:

```html
array(2) {
  ["dependencies"] => array(2) {
    ["ling"] => array(2) {
      [0] => string(3) "Bat"
      [1] => string(13) "ArrayToString"
    }
    ["git"] => array(1) {
      [0] => string(35) "https://github.com/tecnickcom/tcpdf"
    }
  }
  ["post_install"] => array(1) {
    ["do_something"] => string(19) "not implemented yet"
  }
}
```


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md) class.

Previous method: [parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/parseDumpDependencies.md)<br>Next method: [getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md)<br>

