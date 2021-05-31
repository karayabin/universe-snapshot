[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiImporterInterface class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md)


LpiImporterInterface::getLpiDependencies
================



LpiImporterInterface::getLpiDependencies — Returns the array of lpi dependencies for the given planet.




Description
================


abstract public [LpiImporterInterface::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getLpiDependencies.md)(string $planetIdentifier) : array




Returns the array of lpi dependencies for the given planet.

Throws a LpiIncompatibleException exception if the lpi deps file can't be found.




Parameters
================


- planetIdentifier

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiImporterInterface::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiImporterInterface.php#L88-L88)


See Also
================

The [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md) class.

Previous method: [getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md)<br>

