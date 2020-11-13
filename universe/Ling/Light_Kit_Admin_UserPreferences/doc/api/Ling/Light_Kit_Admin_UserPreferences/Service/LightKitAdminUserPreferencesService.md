[Back to the Ling/Light_Kit_Admin_UserPreferences api](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences.md)



The LightKitAdminUserPreferencesService class
================
2020-08-13 --> 2020-08-28






Introduction
============

The LightKitAdminUserPreferencesService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserPreferencesService</span> extends [LightKitAdminStandardServicePlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin.md) implements [LightRealformLateServiceRegistrationInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformLateServiceRegistrationInterface.md), [LightRealistCustomServiceInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md), [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightKitAdminStandardServicePlugin::$container](#property-container) ;
    - protected array [LightKitAdminStandardServicePlugin::$options](#property-options) ;

- Inherited methods
    - public LightKitAdminStandardServicePlugin::__construct() : void
    - public LightKitAdminStandardServicePlugin::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightKitAdminStandardServicePlugin::setOptions(array $options) : void
    - public LightKitAdminStandardServicePlugin::install() : void
    - public LightKitAdminStandardServicePlugin::isInstalled() : bool
    - public LightKitAdminStandardServicePlugin::uninstall() : void
    - public LightKitAdminStandardServicePlugin::getDependencies() : array
    - public LightKitAdminStandardServicePlugin::registerRealistByRequestId(string $requestId) : mixed
    - public LightKitAdminStandardServicePlugin::registerRealformByIdentifier(string $identifier) : mixed
    - protected LightKitAdminStandardServicePlugin::error(string $msg) : void
    - private LightKitAdminStandardServicePlugin::prepareTheNames() : void

}






Methods
==============

- LightKitAdminStandardServicePlugin::__construct &ndash; Builds the LightLingStandardService01 instance.
- LightKitAdminStandardServicePlugin::setContainer &ndash; Sets the container.
- LightKitAdminStandardServicePlugin::setOptions &ndash; Sets the options.
- LightKitAdminStandardServicePlugin::install &ndash; Installs the plugin in the light application.
- LightKitAdminStandardServicePlugin::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightKitAdminStandardServicePlugin::uninstall &ndash; Uninstalls the plugin.
- LightKitAdminStandardServicePlugin::getDependencies &ndash; Returns the array of dependencies.
- LightKitAdminStandardServicePlugin::registerRealistByRequestId &ndash; Registers the plugin to the realist service.
- LightKitAdminStandardServicePlugin::registerRealformByIdentifier &ndash; Registers the plugin to the realform service.
- LightKitAdminStandardServicePlugin::error &ndash; Throws an exception.
- LightKitAdminStandardServicePlugin::prepareTheNames &ndash; prepareTheNames names used by this class.





Location
=============
Ling\Light_Kit_Admin_UserPreferences\Service\LightKitAdminUserPreferencesService<br>
See the source code of [Ling\Light_Kit_Admin_UserPreferences\Service\LightKitAdminUserPreferencesService](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/Service/LightKitAdminUserPreferencesService.php)



SeeAlso
==============
Previous class: [LightKitAdminUserPreferencesLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/LightKitAdminPlugin/Generated/LightKitAdminUserPreferencesLkaPlugin.md)<br>
