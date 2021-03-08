[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)


LpiHelper::getLatestLpiDependenciesByPlanetDir
================



LpiHelper::getLatestLpiDependenciesByPlanetDir — Returns an array containing [lpi-deps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-lpibyml-file) info for the last version of the given planet.




Description
================


public static [LpiHelper::getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLatestLpiDependenciesByPlanetDir.md)(string $planetDir) : array




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
See the source code for method [LpiHelper::getLatestLpiDependenciesByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php#L127-L144)


See Also
================

The [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md) class.

Previous method: [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getDependencyListByPlanetDir.md)<br>Next method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateLpiDepsByPlanetDir.md)<br>

