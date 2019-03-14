[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Helper\DependencyMasterHelper class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md)


DependencyMasterHelper::collectDependenciesByPlanetName
================



DependencyMasterHelper::collectDependenciesByPlanetName — Collects the dependencies and post_installs entries for the getDependencyMapByPlanetName method of the same class.




Description
================


private static [DependencyMasterHelper::collectDependenciesByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/collectDependenciesByPlanetName.md)(string $longPlanetName, array $dependencyMaster, array $galaxies, array &$dependencies = [], array &$postInstalls = [], bool $isRoot = false) : void




Collects the dependencies and post_installs entries for the getDependencyMapByPlanetName method of the same class.
This method is like the working horse of the getDependencyMapByPlanetName method if you will.




Parameters
================


- longPlanetName

    

- dependencyMaster

    

- galaxies

    

- dependencies

    Passed by reference.

- postInstalls

    

- isRoot

    


Return values
================

Returns void.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;







See Also
================

The [DependencyMasterHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md) class.

Previous method: [getDependencyMapByPlanetName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper/getDependencyMapByPlanetName.md)<br>

