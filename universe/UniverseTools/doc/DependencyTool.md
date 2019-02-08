DependencyTool
==============


The getDependencyList method
----------------------------


You can use this method to get the list of the dependencies of a planet which uses [the new dependency system](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).

The following code:

```php
az(DependencyTool::getDependencyList("/path/to/universe/InvisiblePlanet"));
```


Will output:

```html
array(3) {
  [0] => array(3) {
    [0] => string(13) "universe.ling"
    [1] => string(3) "Bat"
    [2] => string(1) "*"
  }
  [1] => array(3) {
    [0] => string(13) "universe.ling"
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