[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiVersionHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md)


LpiVersionHelper::shouldBeReplaced
================



LpiVersionHelper::shouldBeReplaced — Returns whether the real version should be replaced with the challenger version expression.




Description
================


public static [LpiVersionHelper::shouldBeReplaced](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/shouldBeReplaced.md)(string $realVersion, string $versionExpr) : bool




Returns whether the real version should be replaced with the challenger version expression.

The "last" keyword is not allowed in versionExpr.



In this method, the following are true:

- 1.6.2   1.6.2+         no: the real version is ok.
- 1.6.4  1.6.4           no: the real version is ok
- 1.6.4  1.7.4

"last" always win, except against another "last" (in which case it's a draw).




Parameters
================


- realVersion

    

- versionExpr

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LpiVersionHelper::shouldBeReplaced](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiVersionHelper.php#L198-L202)


See Also
================

The [LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md) class.

Previous method: [isGreaterThan](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isGreaterThan.md)<br>Next method: [compare](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/compare.md)<br>

