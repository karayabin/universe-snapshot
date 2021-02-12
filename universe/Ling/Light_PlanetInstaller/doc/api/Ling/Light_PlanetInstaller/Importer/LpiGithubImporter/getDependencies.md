[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiGithubImporter class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md)


LpiGithubImporter::getDependencies
================



LpiGithubImporter::getDependencies — Returns the array of dependencies for the given planet and version.




Description
================


public [LpiGithubImporter::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getDependencies.md)(string $planetIdentifier, string $version) : array




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
See the source code for method [LpiGithubImporter::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiGithubImporter.php#L150-L156)


See Also
================

The [LpiGithubImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md) class.

Previous method: [getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getCurrentVersion.md)<br>Next method: [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getUniDependencies.md)<br>

