[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper.md)


LpiFileHelper::upgradeLpiPlanets
================



LpiFileHelper::upgradeLpiPlanets — Upgrades planets in the lpi.byml file of the application, for either the specified planetDotName only, or for all the planets found in the application (by default), then return the file's planets.




Description
================


public static [LpiFileHelper::upgradeLpiPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/upgradeLpiPlanets.md)(string $appDir, ?string $planetDotName = null) : array




Upgrades planets in the lpi.byml file of the application, for either the specified planetDotName only, or for all the planets found in the application (by default), then return the file's planets.

The latest versions are fetched from the [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe) first, then from the web otherwise.
A plus symbol is added to that version number.

The returned array is an array of planetDotName => versionExpression.




Parameters
================


- appDir

    

- planetDotName

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LpiFileHelper::upgradeLpiPlanets](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiFileHelper.php#L32-L72)


See Also
================

The [LpiFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper.md) class.

Next method: [getPlanetsMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiFileHelper/getPlanetsMap.md)<br>

