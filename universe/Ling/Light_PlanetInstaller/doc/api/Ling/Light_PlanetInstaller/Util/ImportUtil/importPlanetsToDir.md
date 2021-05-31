[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::importPlanetsToDir
================



ImportUtil::importPlanetsToDir — Imports the given planets to the given dir, and returns whether the program should continue.




Description
================


private [ImportUtil::importPlanetsToDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/importPlanetsToDir.md)(array $planets, string $dstDir, ?array $options = []) : void




Imports the given planets to the given dir, and returns whether the program should continue.


The given planets argument is an array of planetDotName => version (to install/import).


Note: the program might ask the user to stop the program in case of a planet not found.

Available options are (when no explanations, same as import method from this class):

- alt
- lo
- altHasLast
- useUniStyle: bool=false. Whether to use uni style import (i.e. always use latest versions)




Parameters
================


- planets

    

- dstDir

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ImportUtil::importPlanetsToDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L662-L792)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [stripConcreteImportMap](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/stripConcreteImportMap.md)<br>Next method: [smartCopy](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/smartCopy.md)<br>

