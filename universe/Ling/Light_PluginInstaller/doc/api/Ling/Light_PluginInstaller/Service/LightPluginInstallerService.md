[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)



The LightPluginInstallerService class
================
2020-02-07 --> 2020-07-31






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
    - protected [Ling\Light_PluginInstaller\Extension\PluginInstallerExtensionInterface[]](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Extension/PluginInstallerExtensionInterface.md) [$pluginExtensions](#property-pluginExtensions) ;
    - protected [Ling\Light_PluginInstaller\PluginInstaller\PluginPostInstallerInterface[]](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md) [$postInstallers](#property-postInstallers) ;
    - protected array [$options](#property-options) ;
    - private [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) [$mysqlInfoUtil](#property-mysqlInfoUtil) ;
    - private bool [$_isInstalling](#property-_isInstalling) ;
    - private int [$_indent](#property-_indent) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md)() : void
    - public [setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getOption.md)(string $key, ?$defaultValue = null) : mixed
    - public [setRootDir](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setRootDir.md)(string $rootDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setUninstallStrictMode](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setUninstallStrictMode.md)(bool $uninstallStrictMode) : void
    - public [registerPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPlugin.md)(string $name, [Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) $pluginInstaller) : void
    - public [registerPostInstaller](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPostInstaller.md)(int $level, callable $postInstaller) : void
    - public [getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getRegisteredPluginNames.md)() : array
    - public [isRegistered](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isRegistered.md)(string $name) : bool
    - public [registerPluginExtension](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPluginExtension.md)([Ling\Light_PluginInstaller\Extension\PluginInstallerExtensionInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Extension/PluginInstallerExtensionInterface.md) $extension) : void
    - public [pluginHasCacheEntry](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/pluginHasCacheEntry.md)(string $pluginName) : bool
    - public [removeCacheEntry](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/removeCacheEntry.md)(string $pluginName) : void
    - public [pluginsAreBeingInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/pluginsAreBeingInstalled.md)() : bool
    - public [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md)(string $name, ?array $options = []) : void
    - public [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md)(string $name, ?array $options = []) : void
    - public [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md)(string $name) : bool
    - public [installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md)() : void
    - public [uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md)() : void
    - public [onInitialize](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/onInitialize.md)() : void
    - public [debugLog](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/debugLog.md)(string $msg) : void
    - public [hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/hasTable.md)(string $table) : bool
    - public [tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md)(string $table, string $column, $value) : bool
    - public [fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md)(string $table, string $column, $where, ?bool $throwEx = false) : string | false
    - public [synchronizeByCreateFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/synchronizeByCreateFile.md)(string $pluginName, string $createFile, ?array $syncOptions = [], ?array $options = []) : void
    - private [getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md)(string $name) : string
    - private [dispatch](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/dispatch.md)(string $eventName, $parameter) : void
    - private [error](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/error.md)(string $msg) : void

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

    Whether the uninstall method throws exceptions (true) or silently ignore them (false).
    
    

- <span id="property-pluginExtensions"><b>pluginExtensions</b></span>

    An array of plugin extensions.
    
    

- <span id="property-postInstallers"><b>postInstallers</b></span>

    This property holds the postInstallers for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    The available options are:
    
    - useDebug: bool=false.
         Whether to write the debug messages to the log.
         See the conception notes for more details.
    - useCache: bool=true.
         Whether to use the cache when checking whether a plugin is installed.
         Note: with this version of the plugin, the checking of every plugin is done on every application boot,
         therefore using the cache is recommended in production, as it's faster.
         When you debug though, or if you encounter problems with our service, it might be a good idea to temporarily
         disable the cache.
         When the cache is disable, our service will ask the plugin directly whether it's installed or not (which takes a bit longer
         than the cached response, but is potentially more accurate when in doubt).
    
    

- <span id="property-mysqlInfoUtil"><b>mysqlInfoUtil</b></span>

    This property holds a cache for the  mysqlInfoUtil used by this instance.
    
    

- <span id="property-_isInstalling"><b>_isInstalling</b></span>

    This property holds the _isInstalling for this instance.
    
    

- <span id="property-_indent"><b>_indent</b></span>

    This internal property holds the number of indent chars to prefix a log message with.
    
    



Methods
==============

- [LightPluginInstallerService::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md) &ndash; Builds the LightPluginInstallerService instance.
- [LightPluginInstallerService::setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md) &ndash; Sets the options.
- [LightPluginInstallerService::getOption](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getOption.md) &ndash; Returns the value of the option which name was given, or the given defaultValue otherwise (if the option was not found).
- [LightPluginInstallerService::setRootDir](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setRootDir.md) &ndash; Sets the rootDir.
- [LightPluginInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md) &ndash; Sets the container.
- [LightPluginInstallerService::setUninstallStrictMode](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setUninstallStrictMode.md) &ndash; Sets the uninstallStrictMode.
- [LightPluginInstallerService::registerPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPlugin.md) &ndash; Registers the given plugin.
- [LightPluginInstallerService::registerPostInstaller](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/registerPostInstaller.md) &ndash; Registers a post installer.
- [LightPluginInstallerService::getRegisteredPluginNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getRegisteredPluginNames.md) &ndash; Returns the array of registered plugin names.
- [LightPluginInstallerService::isRegistered](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isRegistered.md) &ndash; Returns whether the given plugin is registered.
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
- [LightPluginInstallerService::getPluginInstallFile](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getPluginInstallFile.md) &ndash; Returns the path to the plugin install file.
- [LightPluginInstallerService::dispatch](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/dispatch.md) &ndash; Dispatches the given event to the registered plugin extensions.
- [LightPluginInstallerService::error](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PluginInstaller\Service\LightPluginInstallerService<br>
See the source code of [Ling\Light_PluginInstaller\Service\LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php)



SeeAlso
==============
Previous class: [PluginPostInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginPostInstallerInterface.md)<br>
