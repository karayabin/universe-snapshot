[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)



The LightKitAdminUserDataService class
================
2020-02-28 --> 2020-03-05






Introduction
============

The LightKitAdminUserDataService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserDataService</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [BMenuDirectInjectorInterface](https://github.com/lingtalfi/Light_BMenu/blob/master/doc/api/Ling/Light_BMenu/DirectInjection/BMenuDirectInjectorInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [install](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/install.md)() : void
    - public [uninstall](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/getDependencies.md)() : array
    - public [inject](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/inject.md)(string $menuStructureId, Ling\Light_BMenu\Menu\LightBMenu $menu) : void

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
- [LightKitAdminUserDataService::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightKitAdminUserDataService::inject](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Service/LightKitAdminUserDataService/inject.md) &ndash; Injects menu fragments in the given menu, knowing the "menuStructureId" context.





Location
=============
Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService<br>
See the source code of [Ling\Light_Kit_Admin_UserData\Service\LightKitAdminUserDataService](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Service/LightKitAdminUserDataService.php)



SeeAlso
==============
Previous class: [LightKitAdminUserDataLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/LightKitAdminPlugin/LightKitAdminUserDataLkaPlugin.md)<br>
