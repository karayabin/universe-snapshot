[Back to the Ling/Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md)



The LightLingHooksPlanetInstaller class
================
2020-08-17 --> 2021-03-22






Introduction
============

The LightLingHooksPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightLingHooksPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [onMapCopyAfter](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/onMapCopyAfter.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightLingHooksPlanetInstaller::onMapCopyAfter](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/onMapCopyAfter.md) &ndash; This hook is executed during an [install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_LingHooks\Light_PlanetInstaller\LightLingHooksPlanetInstaller<br>
See the source code of [Ling\Light_LingHooks\Light_PlanetInstaller\LightLingHooksPlanetInstaller](https://github.com/lingtalfi/Light_LingHooks/blob/master/Light_PlanetInstaller/LightLingHooksPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightLingHooksException](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Exception/LightLingHooksException.md)<br>Next class: [LightLingHooksService](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService.md)<br>
