[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::processLpiDepsArray
================



ImportUtil::processLpiDepsArray — A factorized snippet used by the collectVersionedDependencies method.




Description
================


private [ImportUtil::processLpiDepsArray](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/processLpiDepsArray.md)(array $arr, string $planetDotName, string $version, array $options, array &$ret, array &$parentChain, array &$found) : bool




A factorized snippet used by the collectVersionedDependencies method.
Returns whether or not the planet has been added to the import map.




Parameters
================


- arr

    

- planetDotName

    

- version

    

- options

    

- ret

    

- parentChain

    

- found

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ImportUtil::processLpiDepsArray](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L1382-L1411)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [collectVersionedDependencies](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/collectVersionedDependencies.md)<br>Next method: [addConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addConflict.md)<br>

