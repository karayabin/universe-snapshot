Ling/Light_PluginInstaller
================
2020-02-07 --> 2020-07-31




Table of contents
===========

- [LightPluginInstallerException](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Exception/LightPluginInstallerException.md) &ndash; The LightPluginInstallerException class.
- [PluginInstallerExtensionInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Extension/PluginInstallerExtensionInterface.md) &ndash; The PluginInstallerExtensionInterface interface.
    - [PluginInstallerExtensionInterface::trigger](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Extension/PluginInstallerExtensionInterface/trigger.md) &ndash; Triggers the event which name was given.
- [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) &ndash; The PluginInstallerInterface interface.
    - [PluginInstallerInterface::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/install.md) &ndash; Installs the plugin in the light application.
    - [PluginInstallerInterface::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
    - [PluginInstallerInterface::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/uninstall.md) &ndash; Uninstalls the plugin.
    - [PluginInstallerInterface::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/getDependencies.md) &ndash; Returns the array of dependencies.
- [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md) &ndash; The PluginPostInstallerInterface interface.
    - [PluginPostInstallerInterface::registerPostInstallerCallables](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface/registerPostInstallerCallables.md) &ndash; Registers all the post installers for this plugin.
- [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) &ndash; The LightPluginInstallerService class.
    - [LightPluginInstallerService::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md) &ndash; Builds the LightPluginInstallerService instance.
    - [LightPluginInstallerService::setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md) &ndash; Sets the options.
    - [LightPluginInstallerService::getOption](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getOption.md) &ndash; Returns the value of the option which name was given, or the given defaultValue otherwise (if the option was not found).
    - [LightPluginInstallerService::setRootDir](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setRootDir.md) &ndash; Sets the rootDir.
    - [LightPluginInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md) &ndash; Sets the container.
    - [LightPluginInstallerService::setUninstallStrictMode](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setUninstallStrictMode.md) &ndash; Sets the uninstallStrictMode.
    - [LightPluginInstallerService::registerPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPlugin.md) &ndash; Registers the given plugin.
    - [LightPluginInstallerService::registerPostInstaller](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPostInstaller.md) &ndash; Registers a post installer.
    - [LightPluginInstallerService::getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getRegisteredPluginNames.md) &ndash; Returns the array of registered plugin names.
    - [LightPluginInstallerService::registerPluginExtension](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPluginExtension.md) &ndash; Registers a plugin extension.
    - [LightPluginInstallerService::pluginHasCacheEntry](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/pluginHasCacheEntry.md) &ndash; Returns whether the given plugin has a cache entry.
    - [LightPluginInstallerService::removeCacheEntry](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/removeCacheEntry.md) &ndash; Removes the cache entry, if any, for the given plugin.
    - [LightPluginInstallerService::pluginsAreBeingInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/pluginsAreBeingInstalled.md) &ndash; Returns whether the service is currently in the middle of core installing plugins.
    - [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md) &ndash; Installs a registered plugin by its name.
    - [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md) &ndash; Uninstalls a registered plugin by its name.
    - [LightPluginInstallerService::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md) &ndash; Returns whether the given plugin is installed.
    - [LightPluginInstallerService::installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md) &ndash; This method will install all registered plugins.
    - [LightPluginInstallerService::uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md) &ndash; This method uninstalls all registered plugins.
    - [LightPluginInstallerService::onInitialize](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/onInitialize.md) &ndash; Method called in response to [the Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
    - [LightPluginInstallerService::debugLog](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/debugLog.md) &ndash; Sends a message to our "official" debug log.
    - [LightPluginInstallerService::hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/hasTable.md) &ndash; Returns whether the given table exists in the current database.
    - [LightPluginInstallerService::tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md) &ndash; Returns whether the given table has an entry where the column is the given column with the value being the given value.
    - [LightPluginInstallerService::fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md) &ndash; Returns the value of the given column in the given table, matching the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
    - [LightPluginInstallerService::synchronizeByCreateFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/synchronizeByCreateFile.md) &ndash; Tries to synchronize the database with the given [create file](https://github.com/lingtalfi/Light_DbSynchronizer/blob/master/doc/pages/conception-notes.md#create-file).


Dependencies
============
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_DbSynchronizer](https://github.com/lingtalfi/Light_DbSynchronizer)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


