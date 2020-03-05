[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)



The LightPluginInstallerService class
================
2020-02-07 --> 2020-03-03






Introduction
============

The LightPluginInstallerService class.



Class synopsis
==============


class <span class="pl-k">LightPluginInstallerService</span>  {

- Properties
    - protected [Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface[]](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) [$plugins](#property-plugins) ;
    - protected string [$rootDir](#property-rootDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected bool [$uninstallStrictMode](#property-uninstallStrictMode) ;
    - private [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) [$mysqlInfoUtil](#property-mysqlInfoUtil) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md)() : void
    - public [setRootDir](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setRootDir.md)(string $rootDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setUninstallStrictMode](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setUninstallStrictMode.md)(bool $uninstallStrictMode) : void
    - public [registerPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPlugin.md)(string $name, [Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) $pluginInstaller) : void
    - public [getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getRegisteredPluginNames.md)() : array
    - public [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md)(string $name) : void
    - public [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md)(string $name) : void
    - public [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md)(string $name) : bool
    - public [installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md)() : void
    - public [uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md)() : void
    - public [onInitialize](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/onInitialize.md)() : void
    - public [hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/hasTable.md)(string $table) : bool
    - public [tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md)(string $table, string $column, $value) : bool
    - public [fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md)(string $table, string $column, $where, ?bool $throwEx = false) : string | false
    - private [getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md)(string $name) : string

}




Properties
=============

- <span id="property-plugins"><b>plugins</b></span>

    This property holds the plugins for this instance.
    It's an array of pluginName => PluginInstallerInterface
    
    

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    The rootDir contains all the files to keep track of whether plugins are installed or not.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-uninstallStrictMode"><b>uninstallStrictMode</b></span>

    Whether the uninstall method throws exceptions (true) or silently ignore them (false=default).
    
    

- <span id="property-mysqlInfoUtil"><b>mysqlInfoUtil</b></span>

    This property holds a cache for the  mysqlInfoUtil used by this instance.
    
    



Methods
==============

- [LightPluginInstallerService::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md) &ndash; Builds the LightPluginInstallerService instance.
- [LightPluginInstallerService::setRootDir](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setRootDir.md) &ndash; Sets the rootDir.
- [LightPluginInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md) &ndash; Sets the container.
- [LightPluginInstallerService::setUninstallStrictMode](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setUninstallStrictMode.md) &ndash; Sets the uninstallStrictMode.
- [LightPluginInstallerService::registerPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPlugin.md) &ndash; Registers the given plugin.
- [LightPluginInstallerService::getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getRegisteredPluginNames.md) &ndash; Returns the array of registered plugin names.
- [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md) &ndash; Installs a registered plugin by its name.
- [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md) &ndash; Uninstalls a registered plugin by its name.
- [LightPluginInstallerService::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md) &ndash; Returns whether the given plugin is installed.
- [LightPluginInstallerService::installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md) &ndash; This method will install all registered plugins.
- [LightPluginInstallerService::uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md) &ndash; This method uninstalls all registered plugins.
- [LightPluginInstallerService::onInitialize](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/onInitialize.md) &ndash; Method called in response to [the Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
- [LightPluginInstallerService::hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/hasTable.md) &ndash; Returns whether the given table exists in the current database.
- [LightPluginInstallerService::tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md) &ndash; Returns whether the given table has an entry where the column is the given column with the value being the given value.
- [LightPluginInstallerService::fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md) &ndash; Returns the value of the given column in the given table, matching the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [LightPluginInstallerService::getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md) &ndash; Returns the path to the plugin install file.





Location
=============
Ling\Light_PluginInstaller\Service\LightPluginInstallerService<br>
See the source code of [Ling\Light_PluginInstaller\Service\LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php)



SeeAlso
==============
Previous class: [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md)<br>
