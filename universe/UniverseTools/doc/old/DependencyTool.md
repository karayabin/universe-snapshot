DependencyTool
==============
2019-02-08 --> 2019-02-12


Summary
=======

- [getDependencyHomeUrl](#getdependencyhomeurl)
- [getDependencyList](#getdependencylist)
- [parseDumpDependencies](#parsedumpdependencies)



getDependencyHomeUrl
------------------------
2019-02-11


Returns the home url of the given dependency item.

A dependency item is an item returned by the getDependencyList method (see the method above in this document).

The home url is actually the main page of the repository.

Note: this method was originally created so that documentation authors can create a "Related planets" section
with links to external dependencies.




The following code:

```php
$item = [
    "universe.ling",
    "Bat",
    "*",
];
az(DependencyTool::getDependencyHomeUrl($item)); // string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
```


Will output:

```html
string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
```



getDependencyList
-----------------
2019-02-08



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



parseDumpDependencies
-----------------
2019-02-12



A method to help creating the **dependencies.byml** file.


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
