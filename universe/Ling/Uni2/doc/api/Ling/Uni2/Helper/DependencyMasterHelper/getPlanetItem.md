[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Helper\DependencyMasterHelper class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md)


DependencyMasterHelper::getPlanetItem
================



DependencyMasterHelper::getPlanetItem — or false otherwise (if the planet is not referenced in the dependency master array, or the planet name is invalid).




Description
================


public static [DependencyMasterHelper::getPlanetItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getPlanetItem.md)(array $dependencyMaster, string $longPlanetName) : array | false




Returns the dependencyItem corresponding to the $planetName if found in the given dependency master array,
or false otherwise (if the planet is not referenced in the dependency master array, or the planet name is invalid).




Parameters
================


- dependencyMaster

    

- longPlanetName

    The long planet name (galaxy/shortPlanetName).


Return values
================

Returns array | false.
The returned planet item array is a dependency item array from the dependency master file
(see @page(the dependency master file page) for more info), but it also contains the following
extra-properties:

- galaxy: string. The name of the galaxy







See Also
================

The [DependencyMasterHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md) class.

Previous method: [getGalaxies](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getGalaxies.md)<br>Next method: [getDependencyMapByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getDependencyMapByPlanetName.md)<br>

