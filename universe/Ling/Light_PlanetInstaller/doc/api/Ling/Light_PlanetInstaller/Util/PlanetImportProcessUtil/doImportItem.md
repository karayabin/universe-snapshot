[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::doImportItem
================



PlanetImportProcessUtil::doImportItem — Imports the given planet and its dependencies recursively to given application directory.




Description
================


private [PlanetImportProcessUtil::doImportItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/doImportItem.md)(string $planetDot, string $versionExpr, string $applicationDir) : int




Imports the given planet and its dependencies recursively to given application directory.
Returns a return code, amongst the following:

- 0: by default
- 1: the planetDot was found in the app, so the process was skipped




Parameters
================


- planetDot

    

- versionExpr

    

- applicationDir

    


Return values
================

Returns int.








Source Code
===========
See the source code for method [PlanetImportProcessUtil::doImportItem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L342-L459)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [addProblem](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/addProblem.md)<br>Next method: [getErrorMessageByException](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getErrorMessageByException.md)<br>

