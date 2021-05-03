[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiGithubImporter class
================
2020-12-08 --> 2021-05-03






Introduction
============

The LpiGithubImporter class.

Warning, this importer uses git under the hood, which means you need to have it installed on your machine
before you can use this importer.

Configuration:

- ?verbose: bool=false, whether to display the executed commands. By default, it's quiet (i.e. no message display).
- account: string. The name of the github.com account (which is displayed in the url).



Class synopsis
==============


class <span class="pl-k">LpiGithubImporter</span> extends [LpiBaseImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter.md) implements [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md) {

- Inherited properties
    - protected array [LpiBaseImporter::$conf](#property-conf) ;

- Methods
    - public [importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/importItem.md)(string $planetIdentifier, string $version, string $dstDir, ?array &$warnings = []) : true | array
    - public [hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/hasItem.md)(string $planetIdentifier, string $version) : bool
    - public [getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getCurrentVersion.md)(string $planetIdentifier) : string
    - public [getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getDependencies.md)(string $planetIdentifier, string $version) : array
    - public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getUniDependencies.md)(string $planetIdentifier) : array
    - public [getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getAllVersions.md)(string $planetIdentifier) : array

- Inherited methods
    - public [LpiBaseImporter::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/__construct.md)() : void
    - public [LpiBaseImporter::configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/configure.md)(array $importerConf) : void
    - protected [LpiBaseImporter::getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/getConfigValue.md)(string $key, ?bool $throwEx = true, ?$default = null) : void
    - protected [LpiBaseImporter::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/error.md)(string $msg, ?int $code = null) : void

}






Methods
==============

- [LpiGithubImporter::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/importItem.md) &ndash; Imports the item described by the $planetIdentifier and $version to the $dstDir.
- [LpiGithubImporter::hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/hasItem.md) &ndash; Returns whether there is planet with identifier $planetIdentifier in the given $version.
- [LpiGithubImporter::getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getCurrentVersion.md) &ndash; Returns the current version number of the planet which identifier is given.
- [LpiGithubImporter::getDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getDependencies.md) &ndash; Returns the array of dependencies for the given planet and version.
- [LpiGithubImporter::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getUniDependencies.md) &ndash; Returns an array of planetDotNames corresponding to the uni style dependencies for the given planet identifier.
- [LpiGithubImporter::getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter/getAllVersions.md) &ndash; Returns an array of all available versions of the planet, sorted by increasing number.
- [LpiBaseImporter::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/__construct.md) &ndash; Builds the LpiGithubImporter instance.
- [LpiBaseImporter::configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/configure.md) &ndash; Configures the importer before it's used.
- [LpiBaseImporter::getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/getConfigValue.md) &ndash; Fetches the $key property from the importer configuration and returns the result.
- [LpiBaseImporter::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Importer\LpiGithubImporter<br>
See the source code of [Ling\Light_PlanetInstaller\Importer\LpiGithubImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiGithubImporter.php)



SeeAlso
==============
Previous class: [LpiBaseImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter.md)<br>Next class: [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md)<br>
