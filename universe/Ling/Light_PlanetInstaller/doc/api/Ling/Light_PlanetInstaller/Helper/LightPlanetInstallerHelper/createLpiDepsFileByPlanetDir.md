[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LightPlanetInstallerHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper.md)


LightPlanetInstallerHelper::createLpiDepsFileByPlanetDir
================



LightPlanetInstallerHelper::createLpiDepsFileByPlanetDir — Creates the lpi-deps file for the given planetDir.




Description
================


public static [LightPlanetInstallerHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper/createLpiDepsFileByPlanetDir.md)(string $planetDir, ?array $options = []) : void




Creates the lpi-deps file for the given planetDir.

- uniDir, string, the universe dir where to look for planets.
     The default is two parents above the given planet dir.

This method assumes that you are listing all the planet versions in the README.md file of your planet,
and in the history log section. See the source code for more details.
If that's not the case, don't use this method: it won't work.




Parameters
================


- planetDir

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPlanetInstallerHelper::createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LightPlanetInstallerHelper.php#L92-L107)


See Also
================

The [LightPlanetInstallerHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper.md) class.

Previous method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LightPlanetInstallerHelper/updateLpiDepsByPlanetDir.md)<br>

