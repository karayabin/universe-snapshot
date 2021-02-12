[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The PlanetInstallListUtil class
================
2020-12-08 --> 2020-12-08






Introduction
============

The PlanetInstallListUtil class.



Class synopsis
==============


class <span class="pl-k">PlanetInstallListUtil</span>  {

- Properties
    - protected array [$allDependencies](#property-allDependencies) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/__construct.md)() : void
    - public [setMasterDeps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/setMasterDeps.md)(array $masterDeps) : void
    - public [getInstallListByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getInstallListByPlanet.md)(string $planetDot, string $realVersion) : array
    - private [collectDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/collectDependenciesByPlanet.md)(string $planetDot, string $realVersion, array &$globalList, array &$retList) : array
    - private [getDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getDependenciesByPlanet.md)(string $planetDot, string $realVersion) : array
    - private [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-allDependencies"><b>allDependencies</b></span>

    This property holds the allDependencies for this instance.
    
    



Methods
==============

- [PlanetInstallListUtil::__construct](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/__construct.md) &ndash; Builds the PlanetInstallListUtil instance.
- [PlanetInstallListUtil::setMasterDeps](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/setMasterDeps.md) &ndash; Sets the masterDeps.
- [PlanetInstallListUtil::getInstallListByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getInstallListByPlanet.md) &ndash; Returns the planet install list for the given planetDot and realVersion.
- [PlanetInstallListUtil::collectDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/collectDependenciesByPlanet.md) &ndash; Builds the planet install list and stores it in the retList.
- [PlanetInstallListUtil::getDependenciesByPlanet](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/getDependenciesByPlanet.md) &ndash; Returns the dependencies for a given planet.
- [PlanetInstallListUtil::error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetInstallListUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PlanetInstaller\Util\PlanetInstallListUtil<br>
See the source code of [Ling\Light_PlanetInstaller\Util\PlanetInstallListUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetInstallListUtil.php)



SeeAlso
==============
Previous class: [LightPlanetInstallerService](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Service/LightPlanetInstallerService.md)<br>
