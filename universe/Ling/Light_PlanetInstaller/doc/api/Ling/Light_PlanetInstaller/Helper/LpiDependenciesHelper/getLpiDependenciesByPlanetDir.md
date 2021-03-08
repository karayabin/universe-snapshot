[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)


LpiDependenciesHelper::getLpiDependenciesByPlanetDir
================



LpiDependenciesHelper::getLpiDependenciesByPlanetDir — Returns an array of lpi dependencies for the given planet.




Description
================


public [LpiDependenciesHelper::getLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDependenciesByPlanetDir.md)(string $planetDir, ?array $options = [], ?string &$lastVersion = null) : array




Returns an array of lpi dependencies for the given planet.

Available options:
- recursive: bool=false, whether to get the dependencies recursively.
- version: string|null=null, which version to get the dependencies for.
     If null, the last version will be used, and the $lastVersion variable will be set.



The [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe) is used if it exists.


The returned array is an array of planetDotName => version.




Parameters
================


- planetDir

    

- options

    

- lastVersion

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LpiDependenciesHelper::getLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDependenciesHelper.php#L58-L95)


See Also
================

The [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/__construct.md)<br>Next method: [getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getSubscribersList.md)<br>

