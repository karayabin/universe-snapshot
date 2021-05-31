[Back to the Ling/Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md)



The LightLingHooksPlanetInstaller class
================
2020-08-17 --> 2021-05-31






Introduction
============

The LightLingHooksPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightLingHooksPlanetInstaller</span> extends [LightBasePlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/init2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/undoInit2.md)(string $appDir, Ling\CliTools\Output\OutputInterface $output) : void

- Inherited methods
    - public LightBasePlanetInstaller::__construct() : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightLingHooksPlanetInstaller::init2](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightLingHooksPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Light_PlanetInstaller/LightLingHooksPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightBasePlanetInstaller::__construct &ndash; Builds the LightBasePlanetInstaller instance.
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_LingHooks\Light_PlanetInstaller\LightLingHooksPlanetInstaller<br>
See the source code of [Ling\Light_LingHooks\Light_PlanetInstaller\LightLingHooksPlanetInstaller](https://github.com/lingtalfi/Light_LingHooks/blob/master/Light_PlanetInstaller/LightLingHooksPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightLingHooksException](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Exception/LightLingHooksException.md)<br>Next class: [LightLingHooksService](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks/Service/LightLingHooksService.md)<br>
