[Back to the UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools.md)<br>
[Back to the UniverseTools\DependencyTool class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md)


DependencyTool::parseDumpDependencies
================



DependencyTool::parseDumpDependencies — A method to help creating the **dependencies.byml** file.




Description
================


public static [DependencyTool::parseDumpDependencies](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool/parseDumpDependencies.md)(string $planetDir, $br = &lt;br&gt;) : string




A method to help creating the **dependencies.byml** file.


Parses the planet's [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes
and returns a list of dependencies to put in the dependencies.byml * at the root of your planet.

For each dependency, this method will create a new line formatted like this:

- dependencyName: *

Note: this is the notation for the universe [dependency system](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).
Other dependency systems are not supported yet.


Note2: This method only works if there is an effective bsr-0 autoloader in place.
Note3: This method works by parsing the use statements in your classes, so make sure to clean your import use statements
before running this method.




Parameters
================


- planetDir

    The directory path of the planet to scan.

- br

    The string to use as the carriage return.


Return values
================

Returns string.





Examples
================

Example 1: Simple parseDumpDependencies example
---------------

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



See Also
================

The [DependencyTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/UniverseTools/DependencyTool.md) class.
