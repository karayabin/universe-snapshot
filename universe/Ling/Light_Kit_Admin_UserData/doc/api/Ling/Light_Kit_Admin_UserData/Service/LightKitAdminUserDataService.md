[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)



The LightKitAdminUserDataService class
================
2020-02-28 --> 2020-08-21






Introduction
============

The LightKitAdminUserDataService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserDataService</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [BMenuDirectInjectorInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md), [LightRealistCustomServiceInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md), [LightRealformLateServiceRegistrationInterface](https://github.com/lingtalfi/Light_Realform/blob/master/doc/api/Ling/Light_Realform/Service/LightRealformLateServiceRegistrationInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [install](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/install.md)() : void
    - public [uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/uninstall.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/isInstalled.md)() : bool
    - public [getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/getDependencies.md)() : array
    - public [inject](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/inject.md)(string $menuStructureId, Ling\Light_BMenu\Menu\LightBMenu $menu) : void
    - public [registerRealistByRequestId](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/registerRealistByRequestId.md)(string $requestId) : mixed
    - public [registerRealformByIdentifier](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/registerRealformByIdentifier.md)(string $identifier) : mixed

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightKitAdminUserDataService::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/__construct.md) &ndash; Builds the LightKitAdminUserDataService instance.
- [LightKitAdminUserDataService::setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/setContainer.md) &ndash; Sets the container.
- [LightKitAdminUserDataService::install](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/install.md) &ndash; Installs the plugin in the light application.
- [LightKitAdminUserDataService::uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/uninstall.md) &ndash; Uninstalls the plugin.
- [LightKitAdminUserDataService::isInstalled](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightKitAdminUserDataService::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightKitAdminUserDataService::inject](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/inject.md) &ndash; Injects menu fragments in the given menu, knowing the "menuStructureId" context.
- [LightKitAdminUserDataService::registerRealistByRequestId](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/registerRealistByRequestId.md) &ndash; Registers the plugin to the realist service.
- [LightKitAdminUserDataService::registerRealformByIdentifier](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/registerRealformByIdentifier.md) &ndash; Registers the plugin to the realform service.





Location
=============
Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService<br>
See the source code of [Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Service/LightKitAdminUserDataService.php)



SeeAlso
==============
Previous class: [LightKitAdminUserDataRowRestrictionHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Light_UserRowRestriction/LightKitAdminUserDataRowRestrictionHandler.md)<br>
