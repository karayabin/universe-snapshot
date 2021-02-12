[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiImporterInterface class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md)


LpiImporterInterface::getDependencies
================



LpiImporterInterface::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


abstract public [LpiImporterInterface::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getDependencies.md)(string $planetIdentifier, string $version) : array




Returns the array of dependencies for the given planet and version.

The returned array contains items, each of which has the following structure:
- 0: planetDot
- 1: versionExpr




Parameters
================


- planetIdentifier

    

- version

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiImporterInterface::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiImporterInterface.php#L91-L91)


See Also
================

The [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md) class.

Previous method: [getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md)<br>

