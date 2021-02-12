[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::getPlanetsInfoFromLpi
================



LightPlanetInstallerApplication::getPlanetsInfoFromLpi — Returns an array of [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) => versionExpression contained in the lpi.byml file.




Description
================


private [LightPlanetInstallerApplication::getPlanetsInfoFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfoFromLpi.md)(?array $options = []) : array




Returns an array of [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) => versionExpression contained in the lpi.byml file.

If the lpi file doesn't exist, an exception is thrown.

The versionExpression is defined in the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md).

Available options are:
- appDir: string=null, the application directory to use. If null, defaults to the current directory.




Parameters
================


- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::getPlanetsInfoFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L667-L684)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [getPlanetsInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInfo.md)<br>Next method: [countPlanetsFromLpi](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/countPlanetsFromLpi.md)<br>

