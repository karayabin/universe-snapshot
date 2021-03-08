[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::adaptToWishlist
================



PlanetImportProcessUtil::adaptToWishlist — Tests whether the given mini version expression is defined in the wishlist, and returns either false, or the adapted version.




Description
================


private [PlanetImportProcessUtil::adaptToWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/adaptToWishlist.md)(string $planetDot, string $miniVersionExpr, ?string &$wishMiniVersionExpr = null) : false | string




Tests whether the given mini version expression is defined in the wishlist, and returns either false, or the adapted version.
False is returned if the given planet is not defined in the wishlist.
Otherwise, this method returns the adapted absolute version number that fits the wishlist.
If the wishlist defines an absolute version number, the isAbsolute flag is raised to true.

The $wishMiniVersionExpr variable is set to the wishlist mini version expression if defined, or stays null otherwise.




Parameters
================


- planetDot

    

- miniVersionExpr

    

- wishMiniVersionExpr

    


Return values
================

Returns false | string.








Source Code
===========
See the source code for method [PlanetImportProcessUtil::adaptToWishlist](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L1066-L1146)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [getVersionToInstallFromMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/getVersionToInstallFromMiniVersionExpression.md)<br>Next method: [hasConflict](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/hasConflict.md)<br>

