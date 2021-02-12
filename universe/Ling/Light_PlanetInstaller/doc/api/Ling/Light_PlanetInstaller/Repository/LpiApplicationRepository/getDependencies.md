[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiApplicationRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository.md)


LpiApplicationRepository::getDependencies
================



LpiApplicationRepository::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


public [LpiApplicationRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getDependencies.md)(string $planetDot, string $realVersion) : array




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
See the source code for method [LpiApplicationRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiApplicationRepository.php#L97-L100)


See Also
================

The [LpiApplicationRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository.md) class.

Previous method: [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/copy.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiApplicationRepository/getUniDependencies.md)<br>

