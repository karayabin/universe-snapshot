[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetInstallListUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil.md)


PlanetInstallListUtil::collectDependenciesByPlanet
================



PlanetInstallListUtil::collectDependenciesByPlanet — Builds the planet install list and stores it in the retList.




Description
================


private [PlanetInstallListUtil::collectDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/collectDependenciesByPlanet.md)(string $planetDot, string $realVersion, array &$globalList, array &$retList) : array




Builds the planet install list and stores it in the retList.
Throws an exception in case of problem.


Global list is an array to keep track of already processed planets.




Parameters
================


- planetDot

    

- realVersion

    

- globalList

    

- retList

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PlanetInstallListUtil::collectDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetInstallListUtil.php#L79-L118)


See Also
================

The [PlanetInstallListUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil.md) class.

Previous method: [getInstallListByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getInstallListByPlanet.md)<br>Next method: [getDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getDependenciesByPlanet.md)<br>

