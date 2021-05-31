[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)


LpiDepsFileHelper::getLpiDepsContentByLocation
================



LpiDepsFileHelper::getLpiDepsContentByLocation — Returns the content of the lpi deps file as an array.




Description
================


public static [LpiDepsFileHelper::getLpiDepsContentByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsContentByLocation.md)(string $location) : array




Returns the content of the lpi deps file as an array.

Throws an LpiIncompatibleException exception the lpi deps file wasn't found at the given location.

The location can be either an url or a filesystem path.




Parameters
================


- location

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiDepsFileHelper::getLpiDepsContentByLocation](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiDepsFileHelper.php#L47-L54)


See Also
================

The [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md) class.

Previous method: [getLpiDepsFilePathByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/getLpiDepsFilePathByPlanetDir.md)<br>Next method: [updateLpiDepsByPlanetDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper/updateLpiDepsByPlanetDir.md)<br>

