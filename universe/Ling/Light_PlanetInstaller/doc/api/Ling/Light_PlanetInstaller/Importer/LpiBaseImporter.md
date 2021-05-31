[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiBaseImporter class
================
2020-12-08 --> 2021-05-31






Introduction
============

The LpiBaseImporter class.



Class synopsis
==============


abstract class <span class="pl-k">LpiBaseImporter</span> implements [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md) {

- Properties
    - protected array [$conf](#property-conf) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/__construct.md)() : void
    - public [configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/configure.md)(array $importerConf) : void
    - protected [getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/getConfigValue.md)(string $key, ?bool $throwEx = true, ?$default = null) : void
    - protected [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/error.md)(string $msg, ?int $code = null) : void

- Inherited methods
    - abstract public [LpiImporterInterface::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/importItem.md)(string $planetIdentifier, string $version, string $dstDir, ?array &$warnings = []) : true | array
    - abstract public [LpiImporterInterface::hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/hasItem.md)(string $planetIdentifier, string $version) : bool
    - abstract public [LpiImporterInterface::getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getCurrentVersion.md)(string $planetIdentifier) : string
    - abstract public [LpiImporterInterface::getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md)(string $planetIdentifier) : array
    - abstract public [LpiImporterInterface::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getLpiDependencies.md)(string $planetIdentifier) : array
    - abstract public [LpiImporterInterface::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md)(string $planetIdentifier) : array

}




Properties
=============

- <span id="property-conf"><b>conf</b></span>

    This property holds the conf for this instance.
    
    



Methods
==============

- [LpiBaseImporter::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/__construct.md) &ndash; Builds the LpiGithubImporter instance.
- [LpiBaseImporter::configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/configure.md) &ndash; Configures the importer before it's used.
- [LpiBaseImporter::getConfigValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/getConfigValue.md) &ndash; Fetches the $key property from the importer configuration and returns the result.
- [LpiBaseImporter::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiBaseImporter/error.md) &ndash; Throws an exception.
- [LpiImporterInterface::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/importItem.md) &ndash; Imports the item described by the $planetIdentifier and $version to the $dstDir.
- [LpiImporterInterface::hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/hasItem.md) &ndash; Returns whether there is planet with identifier $planetIdentifier in the given $version.
- [LpiImporterInterface::getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getCurrentVersion.md) &ndash; Returns the current version number of the planet which identifier is given.
- [LpiImporterInterface::getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md) &ndash; Returns an array of all available versions of the planet, sorted by increasing number.
- [LpiImporterInterface::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getLpiDependencies.md) &ndash; Returns the array of lpi dependencies for the given planet.
- [LpiImporterInterface::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md) &ndash; Returns an array of planetDotNames corresponding to the uni style dependencies for the given planet identifier.





Location
=============
Ling\Light_PlanetInstaller\Importer\LpiBaseImporter<br>
See the source code of [Ling\Light_PlanetInstaller\Importer\LpiBaseImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiBaseImporter.php)



SeeAlso
==============
Previous class: [LpiWebHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiWebHelper.md)<br>Next class: [LpiGithubImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md)<br>
