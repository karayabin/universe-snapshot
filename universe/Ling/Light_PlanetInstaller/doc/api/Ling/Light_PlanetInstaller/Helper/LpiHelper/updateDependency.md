[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)


LpiHelper::updateDependency
================



LpiHelper::updateDependency — Takes the lpi-deps.byml file of the given source planet, and updates all dependencies of the given dstPlanetDotName found in it with the given version expression.




Description
================


public static [LpiHelper::updateDependency](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/updateDependency.md)(string $srcPlanetDir, string $dstPlanetDotName, string $dstVersionExpr) : void




Takes the lpi-deps.byml file of the given source planet, and updates all dependencies of the given dstPlanetDotName found in it with the given version expression.




Parameters
================


- srcPlanetDir

    

- dstPlanetDotName

    

- dstVersionExpr

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LpiHelper::updateDependency](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php#L220-L246)


See Also
================

The [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md) class.

Previous method: [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createLpiDepsFileByPlanetDir.md)<br>Next method: [getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLpiDepsByLocation.md)<br>

