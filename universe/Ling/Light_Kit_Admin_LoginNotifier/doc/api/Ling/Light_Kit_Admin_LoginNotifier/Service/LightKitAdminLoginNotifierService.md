[Back to the Ling/Light_Kit_Admin_LoginNotifier api](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier.md)



The LightKitAdminLoginNotifierService class
================
2020-11-30 --> 2020-12-01






Introduction
============

The LightKitAdminLoginNotifierService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminLoginNotifierService</span> extends [LightKitAdminStandardServicePlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

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
- LightKitAdminStandardServicePlugin::error &ndash; Throws an exception.
- LightKitAdminStandardServicePlugin::prepareTheNames &ndash; prepareTheNames names used by this class.





Location
=============
Ling\Light_Kit_Admin_LoginNotifier\Service\LightKitAdminLoginNotifierService<br>
See the source code of [Ling\Light_Kit_Admin_LoginNotifier\Service\LightKitAdminLoginNotifierService](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/Service/LightKitAdminLoginNotifierService.php)



SeeAlso
==============
Previous class: [LightKitAdminLoginNotifierControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_LoginNotifier/blob/master/doc/api/Ling/Light_Kit_Admin_LoginNotifier/Light_ControllerHub/Generated/LightKitAdminLoginNotifierControllerHubHandler.md)<br>
