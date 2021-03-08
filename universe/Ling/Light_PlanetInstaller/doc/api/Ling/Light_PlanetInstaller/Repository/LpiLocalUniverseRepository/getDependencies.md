[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiLocalUniverseRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md)


LpiLocalUniverseRepository::getDependencies
================



LpiLocalUniverseRepository::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


public [LpiLocalUniverseRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getDependencies.md)(string $planetDot, string $realVersion) : array




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
See the source code for method [LpiLocalUniverseRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiLocalUniverseRepository.php#L85-L93)


See Also
================

The [LpiLocalUniverseRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository.md) class.

Previous method: [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/copy.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiLocalUniverseRepository/getUniDependencies.md)<br>

