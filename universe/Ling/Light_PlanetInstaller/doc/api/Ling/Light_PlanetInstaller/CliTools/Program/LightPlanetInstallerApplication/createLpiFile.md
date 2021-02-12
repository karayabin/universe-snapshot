[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::createLpiFile
================



LightPlanetInstallerApplication::createLpiFile — Creates the lpi file for this application if it doesn't exist yet.




Description
================


public [LightPlanetInstallerApplication::createLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/createLpiFile.md)(?array $options = []) : void




Creates the lpi file for this application if it doesn't exist yet.
If the file already exists, it will do nothing by default.

This command assumes that the user is located at the root of the application.

Available options are:
- skipIfExist: bool=true. If false, the file will be updated if it exists. If true (by default) the file is ignored.




Parameters
================


- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::createLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L235-L275)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [removePlanetFromLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/removePlanetFromLpiFile.md)<br>Next method: [getLpiPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/getLpiPath.md)<br>

