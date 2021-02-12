[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Repository\LpiGlobalDirRepository class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository.md)


LpiGlobalDirRepository::getDependencies
================



LpiGlobalDirRepository::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


public [LpiGlobalDirRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getDependencies.md)(string $planetDot, string $realVersion) : array




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
See the source code for method [LpiGlobalDirRepository::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Repository/LpiGlobalDirRepository.php#L77-L99)


See Also
================

The [LpiGlobalDirRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository.md) class.

Previous method: [copy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/copy.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Repository/LpiGlobalDirRepository/getUniDependencies.md)<br>

