[Back to the Ling/Light_PluginDatabaseInstaller api](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller.md)



The LightPluginDatabaseInstallerService class
================
2019-09-11 --> 2020-02-07






Introduction
============

The LightPluginDatabaseInstallerService class.



Class synopsis
==============


class <span class="pl-k">LightPluginDatabaseInstallerService</span>  {

- Properties
    - protected string [$appDir](#property-appDir) ;
    - protected array [$installers](#property-installers) ;
    - protected bool [$forceInstall](#property-forceInstall) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/registerInstaller.md)(string $pluginName, $installer) : void
    - public [getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/getRegisteredPluginNames.md)() : array
    - public [install](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/install.md)(string $pluginName, ?int $installLevel = 1) : void
    - public [isInstalled](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/isInstalled.md)(string $pluginName) : bool
    - public [uninstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/uninstall.md)(string $pluginName) : void
    - public [uninstallAll](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/uninstallAll.md)() : void
    - public [setForceInstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setForceInstall.md)(bool $forceInstall) : void
    - public [setAppDir](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setAppDir.md)(string $appDir) : void
    - protected [getFilePath](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/getFilePath.md)(string $pluginName) : string
    - protected [executeByPluginName](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/executeByPluginName.md)(string $pluginName, string $method) : void

}




Properties
=============

- <span id="property-appDir"><b>appDir</b></span>

    This property holds the appDir for this instance.
    
    

- <span id="property-installers"><b>installers</b></span>

    This property holds the installers for this instance.
    
    It's an array of pluginName => LightPluginDatabaseInstallerInterface
    
    

- <span id="property-forceInstall"><b>forceInstall</b></span>

    This property holds the forceInstall for this instance.
    If true, the isInstalled method will always return false.
    This might be useful for debugging purposes.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightPluginDatabaseInstallerService::__construct](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/__construct.md) &ndash; Builds the LightPluginDatabaseInstallerService instance.
- [LightPluginDatabaseInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setContainer.md) &ndash; Sets the container.
- [LightPluginDatabaseInstallerService::registerInstaller](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/registerInstaller.md) &ndash; Registers the given installer for the given plugin.
- [LightPluginDatabaseInstallerService::getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/getRegisteredPluginNames.md) &ndash; Returns the names of the registered plugins.
- [LightPluginDatabaseInstallerService::install](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/install.md) &ndash; Installs the database part of the given plugin.
- [LightPluginDatabaseInstallerService::isInstalled](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/isInstalled.md) &ndash; Returns whether the given plugin's database part is installed.
- [LightPluginDatabaseInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/uninstall.md) &ndash; Uninstalls the database part of the given plugin.
- [LightPluginDatabaseInstallerService::uninstallAll](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/uninstallAll.md) &ndash; Uninstalls the database parts for all plugins (which database part was previously installed).
- [LightPluginDatabaseInstallerService::setForceInstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setForceInstall.md) &ndash; Sets the forceInstall.
- [LightPluginDatabaseInstallerService::setAppDir](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/setAppDir.md) &ndash; Sets the appDir.
- [LightPluginDatabaseInstallerService::getFilePath](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/getFilePath.md) &ndash; Returns the path to the **pluginA.installed** file for the given plugin.
- [LightPluginDatabaseInstallerService::executeByPluginName](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService/executeByPluginName.md) &ndash; Executes the given method for the given plugin.





Location
=============
Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService<br>
See the source code of [Ling\Light_PluginDatabaseInstaller\Service\LightPluginDatabaseInstallerService](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/Service/LightPluginDatabaseInstallerService.php)



SeeAlso
==============
Previous class: [LightPluginDatabaseInstallerInterface](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/LightPluginDatabaseInstallerInterface.md)<br>
