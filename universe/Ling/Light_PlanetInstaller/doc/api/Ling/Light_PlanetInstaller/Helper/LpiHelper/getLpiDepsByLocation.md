[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md)


LpiHelper::getLpiDepsByLocation
================



LpiHelper::getLpiDepsByLocation — Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.




Description
================


public static [LpiHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/getLpiDepsByLocation.md)(string $location, string $version) : array




Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.
The returned array items have the following structure:

- 0: planetDot
- 1: versionExpression

Throws an exception if it can't return the array.

The location can be either an url or a filesystem path.




Parameters
================


- location

    

- version

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiHelper.php#L179-L203)


See Also
================

The [LpiHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper.md) class.

Previous method: [createLpiDepsFileByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/createLpiDepsFileByPlanetDir.md)<br>Next method: [uniDependenciesToPlanetDotList](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiHelper/uniDependenciesToPlanetDotList.md)<br>

