[Back to the Ling/Light_Kit_Admin_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor.md)



The LightKitAdminKitEditorPlanetInstaller class
================
2021-06-18 --> 2021-06-18






Introduction
============

The LightKitAdminKitEditorPlanetInstaller class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminKitEditorPlanetInstaller</span> extends [LightKitAdminBasePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Light_PlanetInstaller/LightKitAdminBasePlanetInstaller.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightPlanetInstallerInit2HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit2HookInterface.md), [LightPlanetInstallerInit3HookInterface](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/PlanetInstaller/LightPlanetInstallerInit3HookInterface.md) {

- Inherited properties
    - protected [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [LightKitAdminBasePlanetInstaller::$_output](#property-_output) ;
    - protected string [LightKitAdminBasePlanetInstaller::$_planetDotName](#property-_planetDotName) ;
    - protected string [LightKitAdminBasePlanetInstaller::$microPermissionProfile](#property-microPermissionProfile) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBasePlanetInstaller::$container](#property-container) ;

- Methods
    - public [init2](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Light_PlanetInstaller/LightKitAdminKitEditorPlanetInstaller/init2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public [undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Light_PlanetInstaller/LightKitAdminKitEditorPlanetInstaller/undoInit2.md)(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void

- Inherited methods
    - public LightKitAdminBasePlanetInstaller::__construct() : void
    - public LightKitAdminBasePlanetInstaller::init3(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - public LightKitAdminBasePlanetInstaller::undoInit3(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void
    - protected LightKitAdminBasePlanetInstaller::message(string $message) : void
    - protected LightKitAdminBasePlanetInstaller::prepareMessage([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - protected LightKitAdminBasePlanetInstaller::registerOpenMicroPermissionsByProfile(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $planetDotName, string $relProfile) : void
    - protected LightKitAdminBasePlanetInstaller::unregisterOpenMicroPermissionsByProfile(string $appDir, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $planetDotName, string $relProfile) : void
    - public LightBasePlanetInstaller::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightKitAdminKitEditorPlanetInstaller::init2](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Light_PlanetInstaller/LightKitAdminKitEditorPlanetInstaller/init2.md) &ndash; Executes the init 2 phase of the install command.
- [LightKitAdminKitEditorPlanetInstaller::undoInit2](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Light_PlanetInstaller/LightKitAdminKitEditorPlanetInstaller/undoInit2.md) &ndash; Undoes the init 2 phase.
- LightKitAdminBasePlanetInstaller::__construct &ndash; Builds the LightKitAdminBasePlanetInstaller instance.
- LightKitAdminBasePlanetInstaller::init3 &ndash; Executes the init 3 phase of the install command.
- LightKitAdminBasePlanetInstaller::undoInit3 &ndash; Undoes the init 3 phase.
- LightKitAdminBasePlanetInstaller::message &ndash; Writes a message to the output, assuming it's set.
- LightKitAdminBasePlanetInstaller::prepareMessage &ndash; Prepares the instance so that it can use the message method properly.
- LightKitAdminBasePlanetInstaller::registerOpenMicroPermissionsByProfile &ndash; Registers micro-permissions using their open system, from a given profile relative path (from the config/data directory).
- LightKitAdminBasePlanetInstaller::unregisterOpenMicroPermissionsByProfile &ndash; Unregisters micro-permissions using their open system, from a given profile relative path (from the config/data directory).
- LightBasePlanetInstaller::setContainer &ndash; Sets the light service container interface.





Location
=============
Ling\Light_Kit_Admin_Kit_Editor\Light_PlanetInstaller\LightKitAdminKitEditorPlanetInstaller<br>
See the source code of [Ling\Light_Kit_Admin_Kit_Editor\Light_PlanetInstaller\LightKitAdminKitEditorPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/Light_PlanetInstaller/LightKitAdminKitEditorPlanetInstaller.php)



SeeAlso
==============
Previous class: [LightKitAdminKitEditorControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Light_ControllerHub/Generated/LightKitAdminKitEditorControllerHubHandler.md)<br>Next class: [LightKitAdminKitEditorService](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Service/LightKitAdminKitEditorService.md)<br>
