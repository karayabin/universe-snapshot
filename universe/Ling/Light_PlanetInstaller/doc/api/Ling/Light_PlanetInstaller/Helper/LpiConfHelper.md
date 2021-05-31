[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)



The LpiConfHelper class
================
2020-12-08 --> 2021-05-31






Introduction
============

The LpiConfHelper class.



Class synopsis
==============


class <span class="pl-k">LpiConfHelper</span>  {

- Properties
    - private static array [$conf](#property-conf) ;

- Methods
    - public static [getRootDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getRootDir.md)() : string
    - public static [getConfPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfPath.md)() : string
    - public static [getHandlers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getHandlers.md)() : array
    - public static [getGlobalDirPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getGlobalDirPath.md)() : string
    - private static [getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfValue.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed

}




Properties
=============

- <span id="property-conf"><b>conf</b></span>

    This property holds the conf for this instance.
    
    



Methods
==============

- [LpiConfHelper::getRootDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getRootDir.md) &ndash; Returns the path to the machine level root dir (containing the global conf for all Light_PlanetInstaller instances).
- [LpiConfHelper::getConfPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfPath.md) &ndash; Returns the path to the global configuration file.
- [LpiConfHelper::getHandlers](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getHandlers.md) &ndash; Returns the handlers global conf value.
- [LpiConfHelper::getGlobalDirPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getGlobalDirPath.md) &ndash; Returns the path to the global directory.
- [LpiConfHelper::getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfValue.md) &ndash; Returns a value from the global configuration file.





Location
=============
Ling\Light_PlanetInstaller\Helper\LpiConfHelper<br>
See the source code of [Ling\Light_PlanetInstaller\Helper\LpiConfHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiConfHelper.php)



SeeAlso
==============
Previous class: [LpiIncompatibleException](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Exception/LpiIncompatibleException.md)<br>Next class: [LpiDepsFileHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiDepsFileHelper.md)<br>
