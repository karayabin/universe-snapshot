[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::importPlanet
================



LightPlanetInstallerApplication::importPlanet — Imports the planet, which planetDot and real version are given, without dependencies, into the current application.




Description
================


public [LightPlanetInstallerApplication::importPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/importPlanet.md)(string $planetDot, string $version) : void




Imports the planet, which planetDot and real version are given, without dependencies, into the current application.

If a planet with the same name exists, it will be first removed, before the new planet is imported.
The import and removal procedure of a planet is described in the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md).

This method also stores a copy of the planet to the global directory if it's not there already (see the conception notes for more details about the global directory).


todo: here...
todo: here...
todo: here...
todo: here...
todo: here...




Parameters
================


- planetDot

    

- version

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::importPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L361-L363)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [getPlanetsInstallList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getPlanetsInstallList.md)<br>Next method: [globalDirHasPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/globalDirHasPlanet.md)<br>

