[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiVersionHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md)


LpiVersionHelper::extractMiniVersion
================



LpiVersionHelper::extractMiniVersion — Returns an information array about the given mini version expression.




Description
================


public static [LpiVersionHelper::extractMiniVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/extractMiniVersion.md)(string $miniVersionExpr) : array




Returns an information array about the given mini version expression.

The array contains:
- 0: the absolute version number
- 1: the modifier symbol, or null if none

See the [Light_PlanetInstaller conception notes](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md) for more details.




Parameters
================


- miniVersionExpr

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiVersionHelper::extractMiniVersion](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiVersionHelper.php#L31-L44)


See Also
================

The [LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md) class.

Next method: [isPolaritySymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPolaritySymbol.md)<br>

