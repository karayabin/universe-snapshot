[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::updateApplicationByWishlist
================



LightPlanetInstallerApplication::updateApplicationByWishlist — Updates the application planets using the lpi file as a reference, and fills the virtualBin array.




Description
================


public [LightPlanetInstallerApplication::updateApplicationByWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/updateApplicationByWishlist.md)(?array $options = [], ?array &$virtualBin = []) : void




Updates the application planets using the lpi file as a reference, and fills the virtualBin array.

Available options are:
- mode: string(import|install)=import. Whether to use import or install for each planet.
- appDir: string|null = null, the target application directory where to import/install the plugin(s).
     If null, the current directory will be used (assuming the user called this command from the target app's root dir).
- keepBuild: bool=false, whether to remove the build dir after the process is successfully executed.
     Beware that setting this to true can cause problems can interfere with the execution of the script, use
     this only if you know what you are doing.
- useDebug: bool=false. If true, all log levels are displayed to the screen.
- source: mixed. The source to use as the wishlist. Can be either the keyword "lpi", or a string representing the planetDefinition.
     The planetDefinition is: $planetDotName(:$versionExpr=last)?
- force: bool=false. Whether to force the reimport/reinstall




Parameters
================


- options

    

- virtualBin

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::updateApplicationByWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L469-L528)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/lpiDiff.md)<br>Next method: [logError](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/logError.md)<br>

