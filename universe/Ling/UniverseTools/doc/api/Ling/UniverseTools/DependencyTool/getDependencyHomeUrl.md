[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyHomeUrl
================



DependencyTool::getDependencyHomeUrl — Returns the home url (i.e.




Description
================


public static [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyHomeUrl.md)(array $dependencyItem) : string




Returns the home url (i.e. the url of the main documentation) for the given $dependencyItem.
$dependencyItems are returned by the getDependencyList method of this class.


Design note: this method encapsulates the logic of getting the url of the documentation
for EVERY download technique handled by the universe.



Example:
------------
The following code:

```php
$item = [
     "ling",
     "Bat",
];
az(DependencyTool::getDependencyHomeUrl($item)); // string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/Bat"
```


Will output:

```html
string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/Bat"
```

See also [the DependencyTool::getDependencyList method](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyList.md)


Parameters
================


- dependencyItem

    


Return values
================

Returns string.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;
When the dependency system is unknown to this class.






Source Code
===========
See the source code for method [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/DependencyTool.php#L492-L508)


See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool.md) class.

Previous method: [getDependencyListByFile](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/getDependencyListByFile.md)<br>Next method: [writeDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/DependencyTool/writeDependencies.md)<br>

