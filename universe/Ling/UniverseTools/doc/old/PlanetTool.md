PlanetTool
==========
2019-02-12




getClassNames
------------------------
2019-02-12


Parses the given directory recursively and returns an array containing the names of all (bsr-0) classes found.

See [BSR-0 convention](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) for more details.




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


