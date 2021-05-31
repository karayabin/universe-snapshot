[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::getConcreteImportMap
================



ImportUtil::getConcreteImportMap — Returns the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map).




Description
================


private [ImportUtil::getConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConcreteImportMap.md)(string $appDir, array $theoreticalMap, ?array $options = []) : array




Returns the [concrete import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map).
It's an array of planetDotName => item, each of which:

- 0: version the user wish to install/import
- 1: version already existing in the app, or null (if the planet doesn't exist in the app)


Available options come from the import method of this class:
- crm




Parameters
================


- appDir

    

- theoreticalMap

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [ImportUtil::getConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L1136-L1144)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [doResolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/doResolvePreConcreteImportMap.md)<br>Next method: [getTheoreticalImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMap.md)<br>

