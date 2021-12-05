[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiImporterInterface class
================
2020-12-08 --> 2021-07-08






Introduction
============

The LpiImporterInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LpiImporterInterface</span>  {

- Methods
    - abstract public [configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/configure.md)(array $importerConf) : void
    - abstract public [importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/importItem.md)(string $planetIdentifier, string $version, string $dstDir, ?array &$warnings = []) : true | array
    - abstract public [hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/hasItem.md)(string $planetIdentifier, string $version) : bool
    - abstract public [getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getCurrentVersion.md)(string $planetIdentifier) : string
    - abstract public [getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md)(string $planetIdentifier) : array
    - abstract public [getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getLpiDependencies.md)(string $planetIdentifier) : array
    - abstract public [getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md)(string $planetIdentifier) : array

}






Methods
==============

- [LpiImporterInterface::configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/configure.md) &ndash; Configures the importer before it's used.
- [LpiImporterInterface::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/importItem.md) &ndash; Imports the item described by the $planetIdentifier and $version to the $dstDir.
- [LpiImporterInterface::hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/hasItem.md) &ndash; Returns whether there is planet with identifier $planetIdentifier in the given $version.
- [LpiImporterInterface::getCurrentVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getCurrentVersion.md) &ndash; Returns the current version number of the planet which identifier is given.
- [LpiImporterInterface::getAllVersions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getAllVersions.md) &ndash; Returns an array of all available versions of the planet, sorted by increasing number.
- [LpiImporterInterface::getLpiDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getLpiDependencies.md) &ndash; Returns the array of lpi dependencies for the given planet.
- [LpiImporterInterface::getUniDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/getUniDependencies.md) &ndash; Returns an array of planetDotNames corresponding to the uni style dependencies for the given planet identifier.





Location
=============
Ling\Light_PlanetInstaller\Importer\LpiImporterInterface<br>
See the source code of [Ling\Light_PlanetInstaller\Importer\LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiImporterInterface.php)



SeeAlso
==============
Previous class: [LpiGithubImporter](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiGithubImporter.md)<br>Next class: [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md)<br>
