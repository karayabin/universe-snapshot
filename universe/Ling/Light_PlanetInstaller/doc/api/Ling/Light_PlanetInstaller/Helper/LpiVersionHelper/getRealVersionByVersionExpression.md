[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiVersionHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md)


LpiVersionHelper::getRealVersionByVersionExpression
================



LpiVersionHelper::getRealVersionByVersionExpression — Returns the real version corresponding to the given planet and versionExpr, or throws an exception in case of problem.




Description
================


public static [LpiVersionHelper::getRealVersionByVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/getRealVersionByVersionExpression.md)(string $planetDotName, string $versionExpr) : string




Returns the real version corresponding to the given planet and versionExpr, or throws an exception in case of problem.
The modifier symbol, if any, are just stripped out.




Parameters
================


- planetDotName

    

- versionExpr

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiVersionHelper::getRealVersionByVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiVersionHelper.php#L47-L51)


See Also
================

The [LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md) class.

Previous method: [toMiniVersionExpression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/toMiniVersionExpression.md)<br>Next method: [extractMiniVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/extractMiniVersion.md)<br>

