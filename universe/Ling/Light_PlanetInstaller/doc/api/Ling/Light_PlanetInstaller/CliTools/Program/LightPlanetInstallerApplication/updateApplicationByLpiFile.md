[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::updateApplicationByLpiFile
================



LightPlanetInstallerApplication::updateApplicationByLpiFile — Updates the application planets using the lpi file as a reference.




Description
================


public [LightPlanetInstallerApplication::updateApplicationByLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/updateApplicationByLpiFile.md)(?array $options = []) : void




Updates the application planets using the lpi file as a reference.

Available options are:
- mode: string(import|install)=import. Whether to use import or install for each planet.
- appDir: string|null = null, the target application directory where to import/install the plugin(s).
     If null, the current directory will be used (assuming the user called this command from the target app's root dir).




Parameters
================


- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::updateApplicationByLpiFile](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L409-L464)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/lpiDiff.md)<br>Next method: [logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/logError.md)<br>

