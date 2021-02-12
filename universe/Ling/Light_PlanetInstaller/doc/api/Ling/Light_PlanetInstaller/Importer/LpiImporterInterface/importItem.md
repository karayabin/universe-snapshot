[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Importer\LpiImporterInterface class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md)


LpiImporterInterface::importItem
================



LpiImporterInterface::importItem — Imports the item described by the $planetIdentifier and $version to the $dstDir.




Description
================


abstract public [LpiImporterInterface::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/importItem.md)(string $planetIdentifier, string $version, string $dstDir, ?array &$warnings = []) : true | array




Imports the item described by the $planetIdentifier and $version to the $dstDir.

Returns true if the operation went smoothly, or an array of errors otherwise.

Note that the $dstDir is the new location of the imported item.
So, $dstDir is not the parent dir containing the item, but the item itself.

The item must be ultimately resolved as a directory.
It can be downloaded as a zip file at first, or any compressed file, but once unzipped, should always
become a directory located at $dstDir.

An exception is thrown if the method fails.

The warnings array is filled by this method if a warning should be displayed to the user, but the method can still be
executed successfully. It's an array of strings.




Parameters
================


- planetIdentifier

    

- version

    

- dstDir

    

- warnings

    


Return values
================

Returns true | array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiImporterInterface::importItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Importer/LpiImporterInterface.php#L48-L48)


See Also
================

The [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md) class.

Previous method: [configure](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/configure.md)<br>Next method: [hasItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface/hasItem.md)<br>

