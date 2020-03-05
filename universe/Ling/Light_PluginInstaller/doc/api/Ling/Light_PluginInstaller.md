Ling/Light_PluginInstaller
================
2020-02-07 --> 2020-03-03




Table of contents
===========

- [LightPluginInstallerException](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Exception/LightPluginInstallerException.md) &ndash; The LightPluginInstallerException class.
- [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) &ndash; The PluginInstallerInterface interface.
    - [PluginInstallerInterface::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/install.md) &ndash; Installs the plugin in the light application.
    - [PluginInstallerInterface::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/uninstall.md) &ndash; Uninstalls the plugin.
    - [PluginInstallerInterface::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) &ndash; The LightPluginInstallerService class.
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


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


