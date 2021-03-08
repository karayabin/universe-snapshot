[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::hasConflict
================



PlanetImportProcessUtil::hasConflict — Returns whether there is a conflict between the given planet and the one in the bin.




Description
================


private [PlanetImportProcessUtil::hasConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/hasConflict.md)(string $locationId, string $planetDot, string $miniVersionExpr, ?string &$versionToAddToVirtualBin = null) : bool




Returns whether there is a conflict between the given planet and the one in the bin.
If there is no matching planet in the bin, false is returned.

In case of conflict, the variable $versionToAddToVirtualBin is filled with the value which solves the conflict.
The conflict is the bernoni conflict, which is explained in more details in our conception notes.




Parameters
================


- locationId

    

- planetDot

    

- miniVersionExpr

    

- versionToAddToVirtualBin

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [PlanetImportProcessUtil::hasConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L1164-L1235)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [adaptToWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/adaptToWishlist.md)<br>Next method: [getBernoniId](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getBernoniId.md)<br>

