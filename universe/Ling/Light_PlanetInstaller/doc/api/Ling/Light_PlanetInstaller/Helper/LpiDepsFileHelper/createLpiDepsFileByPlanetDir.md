[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)


LpiDepsFileHelper::createLpiDepsFileByPlanetDir
================



LpiDepsFileHelper::createLpiDepsFileByPlanetDir — Creates the lpi-deps file for the given planetDir.




Description
================


private static [LpiDepsFileHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void




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
See the source code for method [LpiDepsFileHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php#L141-L156)


See Also
================

The [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md) class.

Previous method: [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md)<br>

