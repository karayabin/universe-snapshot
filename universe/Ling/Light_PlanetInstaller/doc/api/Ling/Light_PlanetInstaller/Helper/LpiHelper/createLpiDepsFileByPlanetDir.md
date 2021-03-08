[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)


LpiHelper::createLpiDepsFileByPlanetDir
================



LpiHelper::createLpiDepsFileByPlanetDir — Creates the lpi-deps file for the given planetDir.




Description
================


public static [LpiHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void




Creates the lpi-deps file for the given planetDir.


Available options are:
- uniDir, string, the universe dir where to look for planets.
     The default is two parents above the given planet dir.

This method assumes that you are listing all the planet versions in the README.md file of your planet,
and in the history log section. See the source code for more details.
If that's not the case, don't use this method: it won't work.




Parameters
================


- planetDir

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LpiHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php#L193-L209)


See Also
================

The [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md) class.

Previous method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateLpiDepsByPlanetDir.md)<br>Next method: [updateDependency](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateDependency.md)<br>

