[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::getUniStyleImportMap
================



ImportUtil::getUniStyleImportMap — Returns the [import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet, in uni style (i.e.




Description
================


private [ImportUtil::getUniStyleImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getUniStyleImportMap.md)(string $planetDotName, ?array $options = []) : array




Returns the [import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet, in uni style (i.e. always use the latest dependencies recursively).


Available options come from the getTheoreticalImportMap method in this class:
- alt
- lo




Parameters
================


- planetDotName

    

- options

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [ImportUtil::getUniStyleImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L1419-L1451)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [debug](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/debug.md)<br>Next method: [getTheoreticalImportMapFromUniDependencyMaster](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapFromUniDependencyMaster.md)<br>

