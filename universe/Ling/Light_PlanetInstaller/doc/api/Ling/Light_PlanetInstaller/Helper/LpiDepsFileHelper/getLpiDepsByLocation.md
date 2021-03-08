[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)


LpiDepsFileHelper::getLpiDepsByLocation
================



LpiDepsFileHelper::getLpiDepsByLocation — Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.




Description
================


public static [LpiDepsFileHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsByLocation.md)(string $location, string $version) : array




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
See the source code for method [LpiDepsFileHelper::getLpiDepsByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php#L151-L175)


See Also
================

The [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md) class.

Previous method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)<br>Next method: [getDependencyListByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getDependencyListByPlanetDir.md)<br>

