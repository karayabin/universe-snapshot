[Back to the Ling/Light_PluginDatabaseInstaller api](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller.md)



The LightPluginDatabaseInstallerInterface class
================
2019-09-11 --> 2020-12-08






Introduction
============

The LightPluginDatabaseInstallerInterface interface.

Light plugins who want to use our service should implement this interface.



Class synopsis
==============


abstract class <span class="pl-k">LightPluginDatabaseInstallerInterface</span>  {

- Methods
    - abstract public [install](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/LightPluginDatabaseInstallerInterface/install.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - abstract public [uninstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/LightPluginDatabaseInstallerInterface/uninstall.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [LightPluginDatabaseInstallerInterface::install](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/LightPluginDatabaseInstallerInterface/install.md) &ndash; Installs the database part of the light plugin.
- [LightPluginDatabaseInstallerInterface::uninstall](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/LightPluginDatabaseInstallerInterface/uninstall.md) &ndash; Uninstalls the database part of the light plugin.





Location
=============
Ling\Light_PluginDatabaseInstaller\LightPluginDatabaseInstallerInterface<br>
See the source code of [Ling\Light_PluginDatabaseInstaller\LightPluginDatabaseInstallerInterface](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/LightPluginDatabaseInstallerInterface.php)



SeeAlso
==============
Previous class: [LightPluginDatabaseInstallerException](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Exception/LightPluginDatabaseInstallerException.md)<br>Next class: [LightPluginDatabaseInstallerService](https://github.com/lingtalfi/Light_PluginDatabaseInstaller/blob/master/doc/api/Ling/Light_PluginDatabaseInstaller/Service/LightPluginDatabaseInstallerService.md)<br>
