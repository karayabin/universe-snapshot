[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::getPreConcreteImportMap
================



ImportUtil::getPreConcreteImportMap — Returns a preconcrete import map, used internally to prepare the concrete import map.




Description
================


private [ImportUtil::getPreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getPreConcreteImportMap.md)(string $appDir, array $theoreticalMap, ?int &$nbAppConflicts = 0) : array




Returns a preconcrete import map, used internally to prepare the concrete import map.

This is an array of planetDotName => item, each of which:

- 0: version (theoretical version that we want to import)
- 1: conflicting version (version already existing in the app), or null if the planet doesn't conflict (i.e. it doesn't exist, or it has the exact same version number already)

See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details about the concrete import map.




Parameters
================


- appDir

    

- theoreticalMap

    

- nbAppConflicts

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [ImportUtil::getPreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L904-L932)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [getLoader](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getLoader.md)<br>Next method: [resolvePreConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/resolvePreConcreteImportMap.md)<br>

