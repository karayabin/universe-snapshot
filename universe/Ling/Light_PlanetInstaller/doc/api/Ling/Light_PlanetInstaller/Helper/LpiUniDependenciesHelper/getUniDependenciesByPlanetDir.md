[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiUniDependenciesHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper.md)


LpiUniDependenciesHelper::getUniDependenciesByPlanetDir
================



LpiUniDependenciesHelper::getUniDependenciesByPlanetDir — Returns an array of uni dependencies for the given planet.




Description
================


public [LpiUniDependenciesHelper::getUniDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/getUniDependenciesByPlanetDir.md)(string $planetDir, ?array $options = []) : array




Returns an array of uni dependencies for the given planet.

Available options:
- recursive: bool=false, whether to get the dependencies recursively.


The [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe) is used if it exists.


The returned array is an array of planet dot names.




Parameters
================


- planetDir

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LpiUniDependenciesHelper::getUniDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiUniDependenciesHelper.php#L50-L65)


See Also
================

The [LpiUniDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/__construct.md)<br>Next method: [collectUniDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiUniDependenciesHelper/collectUniDependenciesRecursive.md)<br>

