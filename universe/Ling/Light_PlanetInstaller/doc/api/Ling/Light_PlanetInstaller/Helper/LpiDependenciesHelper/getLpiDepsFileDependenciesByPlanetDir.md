[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDependenciesHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)


LpiDependenciesHelper::getLpiDepsFileDependenciesByPlanetDir
================



LpiDependenciesHelper::getLpiDepsFileDependenciesByPlanetDir — Returns all the lpi dependencies for the given planet dir, or false if no lpi-deps.byml file was found.




Description
================


public [LpiDependenciesHelper::getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getLpiDepsFileDependenciesByPlanetDir.md)(string $planetDir) : array | false




Returns all the lpi dependencies for the given planet dir, or false if no lpi-deps.byml file was found.
The returned array is an array of version => item.
Each item is an array with the following structure:

- 0: planetDotName
- 1: versionExpr




Parameters
================


- planetDir

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiDependenciesHelper::getLpiDepsFileDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDependenciesHelper.php#L193-L220)


See Also
================

The [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md) class.

Previous method: [getSubscribersList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/getSubscribersList.md)<br>Next method: [collectLpiDependenciesRecursive](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper/collectLpiDependenciesRecursive.md)<br>

