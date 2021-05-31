[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::getTheoreticalImportMap
================



ImportUtil::getTheoreticalImportMap — Returns the [theoretical import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet.




Description
================


private [ImportUtil::getTheoreticalImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMap.md)(string $planetDotName, ?string $version = null, ?array $options = []) : array




Returns the [theoretical import map](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#import-map) for the given planet.

The returned array is an array of planetDotName => version.

If the version is NOT specified, this method will list the latest version of the planet and the latest versions for each
dependency recursively (by default).

If the version is specified, the listed dependencies will be the ones used by the planet in the specified version.

In case of conflicts, the conflicting planets will be ignored (i.e. the first planet stays), and the conflicts information
will be available via the getConflicts method.


The warnings that this method may trigger will be available via the getWarnings method.


Available options come from the import method of the same class:
- deps
- alt
- altHasLast
- lo




Parameters
================


- planetDotName

    

- version

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ImportUtil::getTheoreticalImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L1176-L1224)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [getConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getConcreteImportMap.md)<br>Next method: [getTheoreticalImportMapWithSpecificVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getTheoreticalImportMapWithSpecificVersion.md)<br>

