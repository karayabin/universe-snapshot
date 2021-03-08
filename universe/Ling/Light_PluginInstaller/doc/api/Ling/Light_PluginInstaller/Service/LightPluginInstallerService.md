[Back to the Ling/Light_PluginInstaller api](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller.md)



The LightPluginInstallerService class
================
2020-02-07 --> 2021-03-05






Introduction
============

The LightPluginInstallerService class.



Class synopsis
==============


class <span class="pl-k">LightPluginInstallerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected string [$outputMode](#property-outputMode) ;
    - protected array [$outputLevels](#property-outputLevels) ;
    - protected [Ling\CliTools\Formatter\BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md) [$outputFormatter](#property-outputFormatter) ;
    - protected array [$options](#property-options) ;
    - private [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) [$mysqlInfoUtil](#property-mysqlInfoUtil) ;
    - private int [$_indent](#property-_indent) ;
    - private [Ling\CyclicChainDetector\CyclicChainDetectorUtil](https://github.com/lingtalfi/CyclicChainDetector/blob/master/doc/api/Ling/CyclicChainDetector/CyclicChainDetectorUtil.md) [$cyclicUtil](#property-cyclicUtil) ;
    - private array|null [$dependencies](#property-dependencies) ;
    - private array [$installers](#property-installers) ;
    - private array|null [$allPlanetDotNames](#property-allPlanetDotNames) ;
    - private [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) [$output](#property-output) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md)() : void
    - public [setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md)(array $options) : void
    - public [setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOutputLevels](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutputLevels.md)(array $outputLevels) : void
    - public [addOutputLevel](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/addOutputLevel.md)(string $outputLevel) : void
    - public [setOutput](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutput.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : void
    - public [install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md)(string $planetDotName, ?array $options = []) : void
    - public [uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md)(string $planetDotName) : void
    - public [isInstallable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstallable.md)(string $planetDotName) : bool
    - public [isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md)(string $planetDotName) : bool
    - public [installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md)(?array $options = []) : void
    - public [uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md)() : void
    - public [messageFromPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/messageFromPlugin.md)(string $planetDotName, string $msg, ?string $type = null) : void
    - public [getInstallerInstance](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallerInstance.md)(string $planetDotName) : [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) | null
    - private [getUninstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getUninstallMap.md)(string $planetDotName) : array
    - private [collectChildrenDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/collectChildrenDependencies.md)(string $planetDotName, array &$uninstallMap) : void
    - private [getInstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallMap.md)(string $planetDotName) : array
    - private [collectInstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/collectInstallMap.md)(string $planetDotName, array &$installMap) : void
    - private [getLogicDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getLogicDependencies.md)(string $planetDotName) : array
    - private [initAllDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/initAllDependencies.md)() : void
    - private [getAllPlanetDotNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getAllPlanetDotNames.md)() : array
    - private [message](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/message.md)(string $msg, ?string $type = null) : void
    - private [getFormatter](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getFormatter.md)() : [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md)
    - private [error](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-outputMode"><b>outputMode</b></span>

    The mode for the output.
    Can be one of:
    
    - browser
    
    
    Note: we use the bashtml language for convenience, since it can print messages in both the cli and browser environment.
    
    

- <span id="property-outputLevels"><b>outputLevels</b></span>

    The array of output levels to display.
    We support [classic log levels](https://github.com/lingtalfi/TheBar/blob/master/discussions/classic-log-levels.md).
    
    The available output levels are:
    
    - debug
    - info
    - warning
    
    
    By default, this is the following array:
    
    - info
    - warning
    
    

- <span id="property-outputFormatter"><b>outputFormatter</b></span>

    This property holds the outputFormatter for this instance.
    
    

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
    
    

- <span id="property-_indent"><b>_indent</b></span>

    This internal property holds the number of indent chars to prefix a log message with.
    
    

- <span id="property-cyclicUtil"><b>cyclicUtil</b></span>

    This property holds the cyclicUtil for this instance.
    
    

- <span id="property-dependencies"><b>dependencies</b></span>

    A logic dependency cache.
    It's an array of planetDotName => logic dependencies.
    With logic dependencies being an array of planetDotNames.
    
    Note: this cache is used differently, depending on the calling method.
    
    

- <span id="property-installers"><b>installers</b></span>

    Cache for installer instances.
    It's an array of planetDotName => PluginInstallerInterface.
    
    

- <span id="property-allPlanetDotNames"><b>allPlanetDotNames</b></span>

    Cache of all the planetDotNames in the current application.
    
    

- <span id="property-output"><b>output</b></span>

    The output to use.
    If null, "echo" statements will be used instead.
    
    



Methods
==============

- [LightPluginInstallerService::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md) &ndash; Builds the LightPluginInstallerService instance.
- [LightPluginInstallerService::setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md) &ndash; Sets the options.
- [LightPluginInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md) &ndash; Sets the container.
- [LightPluginInstallerService::setOutputLevels](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutputLevels.md) &ndash; Sets the outputLevels.
- [LightPluginInstallerService::addOutputLevel](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/addOutputLevel.md) &ndash; Adds an output level.
- [LightPluginInstallerService::setOutput](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutput.md) &ndash; Sets the output.
- [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md) &ndash; Installs the planet which [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) is given.
- [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md) &ndash; Uninstalls the plugin which planetDotName is given.
- [LightPluginInstallerService::isInstallable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstallable.md) &ndash; Returns whether the given planet is [installable](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
- [LightPluginInstallerService::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md) &ndash; Returns whether the given plugin is installed.
- [LightPluginInstallerService::installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md) &ndash; This method will logic install all plugins found in the current application.
- [LightPluginInstallerService::uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md) &ndash; This method will logic uninstall all plugins found in the current application.
- [LightPluginInstallerService::messageFromPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/messageFromPlugin.md) &ndash; Writes a message to the appropriate output.
- [LightPluginInstallerService::getInstallerInstance](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallerInstance.md) &ndash; Returns the plugin installer interface instance for the given planetDotName if defined, or null otherwise.
- [LightPluginInstallerService::getUninstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getUninstallMap.md) &ndash; Returns the uninstall map array for the given [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).
- [LightPluginInstallerService::collectChildrenDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/collectChildrenDependencies.md) &ndash; Collects the children dependencies, recursively.
- [LightPluginInstallerService::getInstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallMap.md) &ndash; Returns the install map array for the given [planet dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).
- [LightPluginInstallerService::collectInstallMap](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/collectInstallMap.md) &ndash; Collects the install map recursively.
- [LightPluginInstallerService::getLogicDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getLogicDependencies.md) &ndash; 
- [LightPluginInstallerService::initAllDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/initAllDependencies.md) &ndash; Parses all the planets in the current application, and fills the dependency cache (i.e.
- [LightPluginInstallerService::getAllPlanetDotNames](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getAllPlanetDotNames.md) &ndash; Returns an array of all planetDotNames found in the current application.
- [LightPluginInstallerService::message](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/message.md) &ndash; Writes a message to the appropriate output.
- [LightPluginInstallerService::getFormatter](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getFormatter.md) &ndash; Returns the bashtml formatter instance.
- [LightPluginInstallerService::error](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_PluginInstaller\Service\LightPluginInstallerService<br>
See the source code of [Ling\Light_PluginInstaller\Service\LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/Service/LightPluginInstallerService.php)



SeeAlso
==============
Previous class: [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md)<br>Next class: [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md)<br>
