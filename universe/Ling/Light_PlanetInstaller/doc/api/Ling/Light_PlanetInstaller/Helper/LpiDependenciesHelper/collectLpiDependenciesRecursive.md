[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)


LpiDependenciesHelper::collectLpiDependenciesRecursive
================



LpiDependenciesHelper::collectLpiDependenciesRecursive — Collects the lpi dependencies recursively for the given planet, and stores them in the $deps array.




Description
================


private [LpiDependenciesHelper::collectLpiDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/collectLpiDependenciesRecursive.md)(string $planetDotName, string $versionExpr, array &$deps) : void




Collects the lpi dependencies recursively for the given planet, and stores them in the $deps array.




Parameters
================


- planetDotName

    

- versionExpr

    

- deps

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiDependenciesHelper::collectLpiDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDependenciesHelper.php#L236-L253)


See Also
================

The [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md) class.

Previous method: [getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDepsFileDependenciesByPlanetDir.md)<br>Next method: [getWebRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getWebRepository.md)<br>

