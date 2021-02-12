[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiVersionHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md)


LpiVersionHelper::versionMeetsExpectations
================



LpiVersionHelper::versionMeetsExpectations — Returns whether the given real version meets the expectations of the given mini version expression.




Description
================


public static [LpiVersionHelper::versionMeetsExpectations](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/versionMeetsExpectations.md)(string $realVersion, string $miniVersionExpr, ?string &$highestVersion = null) : bool




Returns whether the given real version meets the expectations of the given mini version expression.

So, if v is the real version, and c the mini version expression challenger, we have:

- v: 1.4.0, c: 1.6.0     => false
- v: 1.4.0, c: 1.4.0     => true
- v: 1.4.0, c: 1.2.0     => false

- v: 1.4.0, c: 1.6.0+    => false
- v: 1.4.0, c: 1.4.0+    => true
- v: 1.4.0, c: 1.2.0+    => true


If the real version and the challenger don't have the same format, they are converted to the same format first,
which is the format of the longest string.
So for instance if v: 1.4 and c: 1.4.0, then v is first converted to 1.4.0 before the algorithm kicks in.

The $highestVersion variable is filled with whichever version is the highest, in its non-equalized form.
If both versions are equal, any of them fills the $highestVersion variable.




Parameters
================


- realVersion

    

- miniVersionExpr

    

- highestVersion

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LpiVersionHelper::versionMeetsExpectations](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiVersionHelper.php#L88-L112)


See Also
================

The [LpiVersionHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper.md) class.

Previous method: [isPolaritySymbol](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isPolaritySymbol.md)<br>Next method: [isGreaterThan](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiVersionHelper/isGreaterThan.md)<br>

