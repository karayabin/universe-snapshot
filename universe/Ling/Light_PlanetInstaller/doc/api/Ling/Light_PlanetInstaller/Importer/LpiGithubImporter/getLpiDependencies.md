[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiGithubImporter class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md)


LpiGithubImporter::getLpiDependencies
================



LpiGithubImporter::getLpiDependencies — Returns the array of lpi dependencies for the given planet.




Description
================


public [LpiGithubImporter::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getLpiDependencies.md)(string $planetIdentifier) : array




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
See the source code for method [LpiGithubImporter::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiGithubImporter.php#L151-L157)


See Also
================

The [LpiGithubImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md) class.

Previous method: [getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getCurrentVersion.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getUniDependencies.md)<br>

