[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::addConflict
================



ImportUtil::addConflict — Adds information about a dependency conflict that potentially occurs with the versioned system (i.e.




Description
================


private [ImportUtil::addConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addConflict.md)(string $planetDotName, string $version, array $parentChain) : void




Adds information about a dependency conflict that potentially occurs with the versioned system (i.e. not uni style).

The given planetDotName and version represent the conflictual planet information.
The parent chain points to the parent which called the planet which caused the conflict to occur.




Parameters
================


- planetDotName

    

- version

    

- parentChain

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [ImportUtil::addConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L1423-L1426)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [processLpiDepsArray](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/processLpiDepsArray.md)<br>Next method: [addWarning](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/addWarning.md)<br>

