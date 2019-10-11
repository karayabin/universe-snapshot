[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyList
================



DependencyTool::getDependencyList — and return an array of all dependencies found in it.




Description
================


public static [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)(string $planetDir) : array




Parses the dependencies.byml file (at the root of the given $planetDir) if it exists,
and return an array of all dependencies found in it.

See the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more information.

The array is a list of dependencyItem, each of which being an array with 2 items:

- 0: the galaxy identifier/ dependency system
- 1: the dependency identifier (name or url, ...), aka packageImportName.




Parameters
================


- planetDir

    


Return values
================

Returns array.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;





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


Source Code
===========
See the source code for method [DependencyTool::getDependencyList](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L280-L303)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [getDependencyItem](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyItem.md)<br>Next method: [getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)<br>

