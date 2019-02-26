[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)<br>
[Back to the UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md)


DependencyTool::getDependencyHomeUrl
================



DependencyTool::getDependencyHomeUrl — Returns the home url (i.e.




Description
================


public static [DependencyTool::getDependencyHomeUrl](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyHomeUrl.md)(array $dependencyItem) : string




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
"*",
];
az(DependencyTool::getDependencyHomeUrl($item)); // string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
```


Will output:

```html
string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
```

See also [the DependencyTool::getDependencyList method](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/getDependencyList.md)


Parameters
================


- dependencyItem

    


Return values
================

Returns string.







See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md) class.
