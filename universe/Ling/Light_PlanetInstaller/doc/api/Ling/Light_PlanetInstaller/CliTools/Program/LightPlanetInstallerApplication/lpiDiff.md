[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md)


LightPlanetInstallerApplication::lpiDiff
================



LightPlanetInstallerApplication::lpiDiff — Returns the list of elements to update in the current app, based on their definition in the lpi file.




Description
================


public [LightPlanetInstallerApplication::lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/lpiDiff.md)(?array $options = []) : array




Returns the list of elements to update in the current app, based on their definition in the lpi file.

Basically, when an element is defined in the lpi file and does not have an exact correspondence in the app, it's added to the returned list.

The returned list is an array of [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) => versionExpression

The versionExpression is defined in the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md).

Available options are:
- appDir: string=null, the application dir to use. If null, defaults to the current directory.




Parameters
================


- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightPlanetInstallerApplication::lpiDiff](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Program/LightPlanetInstallerApplication.php#L364-L447)


See Also
================

The [LightPlanetInstallerApplication](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication.md) class.

Previous method: [copyToGlobalDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/copyToGlobalDir.md)<br>Next method: [updateApplicationByWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Program/LightPlanetInstallerApplication/updateApplicationByWishlist.md)<br>

