[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataPlanetInstaller class
================
2019-09-27 --> 2021-03-22






Introduction
============

The LightUserDataPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightUserDataPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [onMapCopyAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightUserDataPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PlanetInstaller/LightUserDataPlanetInstaller/onMapCopyAfter.md) &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_UserData\Light_PlanetInstaller\LightUserDataPlanetInstaller<br>
See the source code of [Ling\Light_UserData\Light_PlanetInstaller\LightUserDataPlanetInstaller](https://github.com/lingtalfi/Light_UserData/blob/master/Light_PlanetInstaller/LightUserDataPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightUserDataHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper.md)<br>Next class: [LightUserDataPluginInstaller](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Light_PluginInstaller/LightUserDataPluginInstaller.md)<br>
