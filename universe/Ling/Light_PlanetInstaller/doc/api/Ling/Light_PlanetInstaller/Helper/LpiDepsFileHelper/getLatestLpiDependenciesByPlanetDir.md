[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)


LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir
================



LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir — Returns an array containing [lpi-deps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-lpibyml-file) info for the last version of the given planet.




Description
================


public static [LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLatestLpiDependenciesByPlanetDir.md)(string $planetDir) : array




Returns an array containing [lpi-deps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-lpibyml-file) info for the last version of the given planet.

The returned array has the following structure:

- 0: real version number
- 1: array of planetDotName => version expression


Links: [version expression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#version-expression).




Parameters
================


- planetDir

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php#L48-L65)


See Also
================

The [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md) class.

Previous method: [getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md)<br>Next method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)<br>

