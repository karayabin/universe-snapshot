[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::updateApplicationByWishList
================



PlanetImportProcessUtil::updateApplicationByWishList — Update the given application based on the given wishlist.




Description
================


public [PlanetImportProcessUtil::updateApplicationByWishList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/updateApplicationByWishList.md)(string $appDir, array $wishList, ?array $options = []) : void




Update the given application based on the given wishlist.
The wishlist is an array of planetDot => versionExpr.

Available options are:
- bernoniMode: string (manual|auto)=auto. See the bernoniMode property of this class for more details.
- keepBuild: bool=false, whether to keep the buildDir. If false, it's removed after the execution in case of success.
- operationMode: string (import|install) = import. The operation mode.
- force: bool=false, whether to force the reimport/reinstall, even if the planet is already imported/installed.
- symlinks: bool=false, whether to use symlinks to the local universe when available, instead of copying planet dirs.




Parameters
================


- appDir

    

- wishList

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [PlanetImportProcessUtil::updateApplicationByWishList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L260-L472)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [setLogLevels](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/setLogLevels.md)<br>Next method: [getVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVirtualBin.md)<br>

