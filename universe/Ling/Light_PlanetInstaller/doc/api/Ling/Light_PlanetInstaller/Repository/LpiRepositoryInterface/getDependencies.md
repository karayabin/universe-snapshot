[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiRepositoryInterface class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md)


LpiRepositoryInterface::getDependencies
================



LpiRepositoryInterface::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


abstract public [LpiRepositoryInterface::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getDependencies.md)(string $planetDot, string $realVersion) : array




Returns the array of dependencies for the given planet and version.

The returned array contains items, each of which has the following structure:
- 0: planetDot
- 1: versionExpr




Parameters
================


- planetDot

    

- realVersion

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LpiRepositoryInterface::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiRepositoryInterface.php#L64-L64)


See Also
================

The [LpiRepositoryInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface.md) class.

Previous method: [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/copy.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiRepositoryInterface/getUniDependencies.md)<br>

