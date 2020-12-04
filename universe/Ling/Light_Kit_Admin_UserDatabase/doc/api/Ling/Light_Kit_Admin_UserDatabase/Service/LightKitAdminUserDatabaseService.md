[Back to the Ling/Light_Kit_Admin_UserDatabase api](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase.md)



The LightKitAdminUserDatabaseService class
================
2020-06-25 --> 2020-12-01






Introduction
============

The LightKitAdminUserDatabaseService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserDatabaseService</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [BMenuDirectInjectorInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [install](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/install.md)() : void
    - public [uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/uninstall.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/isInstalled.md)() : bool
    - public [getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/getDependencies.md)() : array
    - public [inject](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/inject.md)(string $menuStructureId, Ling\Light_BMenu\Menu\LightBMenu $menu) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminUserDatabaseService::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/__construct.md) &ndash; Builds the LightKitAdminUserDataService instance.
- [LightKitAdminUserDatabaseService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/setContainer.md) &ndash; Sets the container.
- [LightKitAdminUserDatabaseService::install](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/install.md) &ndash; Installs the plugin in the light application.
- [LightKitAdminUserDatabaseService::uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/uninstall.md) &ndash; Uninstalls the plugin.
- [LightKitAdminUserDatabaseService::isInstalled](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightKitAdminUserDatabaseService::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightKitAdminUserDatabaseService::inject](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Service/LightKitAdminUserDatabaseService/inject.md) &ndash; Injects menu fragments in the given menu, knowing the "menuStructureId" context.





Location
=============
Ling\Light_Kit_Admin_UserDatabase\Service\LightKitAdminUserDatabaseService<br>
See the source code of [Ling\Light_Kit_Admin_UserDatabase\Service\LightKitAdminUserDatabaseService](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/Service/LightKitAdminUserDatabaseService.php)



SeeAlso
==============
Previous class: [LightKitAdminUserDatabaseControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserDatabase/blob/master/doc/api/Ling/Light_Kit_Admin_UserDatabase/Light_ControllerHub/Generated/LightKitAdminUserDatabaseControllerHubHandler.md)<br>
