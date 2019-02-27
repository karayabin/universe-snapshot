[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)<br>
[Back to the UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyList
================



DependencyTool::getDependencyList — and return an array of all dependencies found in it.




Description
================


public static [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md)(?$planetDir) : array




Parses the dependencies.byml file (at the root of the given $planetDir) if it exists,
and return an array of all dependencies found in it.

See the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more information.

The array is a list of dependencyItem, each of which being an array with 3 items:

- 0: the galaxy identifier/ download technique
- 1: the dependency item (name, url, ...).




Parameters
================


- planetDir

    


Return values
================

Returns array.





Examples
================

Example 1: simple getDependencyList example
--------------



The following code:

```php
az(DependencyTool::getDependencyList("/path/to/universe/InvisiblePlanet"));
```


Will output:

```html
array(3) {
  [0] => array(3) {
    [0] => string(13) "ling"
    [1] => string(3) "Bat"
    [2] => string(1) "*"
  }
  [1] => array(3) {
    [0] => string(13) "ling"
    [1] => string(13) "ArrayToString"
    [2] => string(5) "1.4.0"
  }
  [2] => array(3) {
    [0] => string(3) "git"
    [1] => string(35) "https://github.com/tecnickcom/tcpdf"
    [2] => string(1) "*"
  }
}

```


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md) class.
