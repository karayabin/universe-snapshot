[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiConfHelper class
================
2020-12-08 --> 2021-05-03






Introduction
============

The LpiConfHelper class.



Class synopsis
==============


class <span class="pl-k">LpiConfHelper</span>  {

- Properties
    - private static array [$conf](#property-conf) ;

- Methods
    - public static [getCliRootDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getCliRootDir.md)() : string
    - public static [getConfPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfPath.md)() : string
    - public static [getHandlers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getHandlers.md)() : array
    - public static [getLocalUniverseHasLast](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getLocalUniverseHasLast.md)() : bool
    - public static [getGlobalDirPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getGlobalDirPath.md)() : string
    - public static [getMasterFilePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getMasterFilePath.md)() : string
    - public static [getMasterVersionFilePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getMasterVersionFilePath.md)() : string
    - private static [getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfValue.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed

}




Properties
=============

- <span id="property-conf"><b>conf</b></span>

    This property holds the conf for this instance.
    
    



Methods
==============

- [LpiConfHelper::getCliRootDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getCliRootDir.md) &ndash; Returns the path to the root dir (containing the global conf, lpi master etc...).
- [LpiConfHelper::getConfPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfPath.md) &ndash; Returns the path to the global configuration file.
- [LpiConfHelper::getHandlers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getHandlers.md) &ndash; Returns the handlers global conf value.
- [LpiConfHelper::getLocalUniverseHasLast](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getLocalUniverseHasLast.md) &ndash; Returns the local_universe_has_last global conf value.
- [LpiConfHelper::getGlobalDirPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getGlobalDirPath.md) &ndash; Returns the path to the global directory.
- [LpiConfHelper::getMasterFilePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getMasterFilePath.md) &ndash; Returns the path to the master lpi file.
- [LpiConfHelper::getMasterVersionFilePath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getMasterVersionFilePath.md) &ndash; Returns the path to the master version file.
- [LpiConfHelper::getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfValue.md) &ndash; Returns a value from the global configuration file.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiConfHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiConfHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiConfHelper.php)



SeeAlso
==============
Previous class: [LpiIncompatibleException](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Exception/LpiIncompatibleException.md)<br>Next class: [LpiDependenciesHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDependenciesHelper.md)<br>
