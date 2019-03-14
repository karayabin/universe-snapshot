[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Helper\DependencyMasterHelper class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md)


DependencyMasterHelper::getDependencyMapByPlanetName
================



DependencyMasterHelper::getDependencyMapByPlanetName — and returns a dependency map array.




Description
================


public static [DependencyMasterHelper::getDependencyMapByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getDependencyMapByPlanetName.md)(string $planetName, array $dependencyMaster) : array




Resolves the dependencies for the given $planetDir recursively, based on the given dependency master array,
and returns a dependency map array.



The dependency map array is a useful tool to resolve the dependencies of a planet recursively:
it's basically a flat array which contains all the dependencies of a planet recursively.
It has the following structure:

```txt
- dependencies:
----- $dependencySystemName:
--------- $packageName: $version
--------- ...
----- ...
- post_installs:
----- $packageId:
--------- (post install directives)

```

With:

- $dependencySystemName: the name of the dependency system
- $packageName: the name of the package (aka packageImportName)
- $version: the version of the package.
If the package is a planet, this will be used in the reimport algorithm to decide whether or not to reimport the dependency.
If the package is not a planet, this will be ignored and should be set to null.

- $packageId: the identifier of the package: $dependencySystemName.$packageName.
In fact, by design it should only be a galaxyName.planetName combo, since non-planets are ignored by the uni-tool.
However, we keep it open for now, just in case.


The post_installs section contains the post install directives for the dependencies only (i.e. not the post_install
directives of the $planetName).


The intent is that armed with this array, a dependency resolver can resolve the dependencies of a planet by
proceeding linearly in two phases:

- import all dependencies
- call all post installs directives



Note: if no dependency was found, the returned array will still have its structure:

```txt
- dependencies: []
- post_installs: []
```




Parameters
================


- planetName

    

- dependencyMaster

    


Return values
================

Returns array.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







See Also
================

The [DependencyMasterHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md) class.

Previous method: [getPlanetItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getPlanetItem.md)<br>Next method: [collectDependenciesByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/collectDependenciesByPlanetName.md)<br>

