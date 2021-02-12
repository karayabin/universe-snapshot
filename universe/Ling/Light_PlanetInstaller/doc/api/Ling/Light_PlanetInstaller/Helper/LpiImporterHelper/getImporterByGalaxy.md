[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiImporterHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper.md)


LpiImporterHelper::getImporterByGalaxy
================



LpiImporterHelper::getImporterByGalaxy — Returns the lpi importer instance corresponding to the given $importerInfo.




Description
================


public static [LpiImporterHelper::getImporterByGalaxy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper/getImporterByGalaxy.md)(string $galaxy) : [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md)




Returns the lpi importer instance corresponding to the given $importerInfo.
Or throws an exception if something went wrong.

The importerInfo is an array containing at least the following:

- galaxy: the galaxy name




Parameters
================


- galaxy

    


Return values
================

Returns [LpiImporterInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Importer/LpiImporterInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiImporterHelper::getImporterByGalaxy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiImporterHelper.php#L31-L57)


See Also
================

The [LpiImporterHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper.md) class.

Next method: [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiImporterHelper/error.md)<br>

