[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiWebRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md)


LpiWebRepository::getDependencies
================



LpiWebRepository::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


public [LpiWebRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getDependencies.md)(string $planetDot, string $realVersion) : array




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
See the source code for method [LpiWebRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiWebRepository.php#L73-L78)


See Also
================

The [LpiWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository.md) class.

Previous method: [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/copy.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiWebRepository/getUniDependencies.md)<br>

