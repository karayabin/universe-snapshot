[Back to the Ling/Light_LingStandardService api](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService.md)



The LightLingStandardService01 class
================
2020-07-28 --> 2021-05-31






Introduction
============

The LightLingStandardService01 class.



Class synopsis
==============


abstract class <span class="pl-k">LightLingStandardService01</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - private string [$_className](#property-_className) ;
    - private string [$_serviceName](#property-_serviceName) ;
    - private string [$_exceptionClassName](#property-_exceptionClassName) ;
    - private string [$_pluginName](#property-_pluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/setOptions.md)(array $options) : void
    - public [install](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/getDependencies.md)() : array
    - public [logDebug](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/logDebug.md)($msg) : void
    - protected [error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/error.md)(string $msg) : void
    - private [prepareNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/prepareNames.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    - useDebug: bool, whether to enable the debug log (more about that in https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)
    
    

- <span id="property-_className"><b>_className</b></span>

    The concrete class name.
    This is only available after a call to the prepareNames method.
    
    

- <span id="property-_serviceName"><b>_serviceName</b></span>

    The service name.
    This is only available after a call to the prepareNames method.
    
    

- <span id="property-_exceptionClassName"><b>_exceptionClassName</b></span>

    The exception class name.
    This is only available after a call to the prepareNames method.
    
    

- <span id="property-_pluginName"><b>_pluginName</b></span>

    The plugin name (aka planet name).
    This is only available after a call to the prepareNames method.
    
    



Methods
==============

- [LightLingStandardService01::__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/__construct.md) &ndash; Builds the LightLingStandardService01 instance.
- [LightLingStandardService01::setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/setContainer.md) &ndash; Sets the container.
- [LightLingStandardService01::setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/setOptions.md) &ndash; Sets the options.
- [LightLingStandardService01::install](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/install.md) &ndash; Installs the plugin in the light application.
- [LightLingStandardService01::isInstalled](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightLingStandardService01::uninstall](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/uninstall.md) &ndash; Uninstalls the plugin.
- [LightLingStandardService01::getDependencies](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightLingStandardService01::logDebug](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/logDebug.md) &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- [LightLingStandardService01::error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/error.md) &ndash; Throws an exception.
- [LightLingStandardService01::prepareNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01/prepareNames.md) &ndash; Prepare names used by this class.





Location
=============
Ling\Light_LingStandardService\Service\LightLingStandardService01<br>
See the source code of [Ling\Light_LingStandardService\Service\LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/Service/LightLingStandardService01.php)



SeeAlso
==============
Previous class: [LightLingStandardServiceException](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Exception/LightLingStandardServiceException.md)<br>Next class: [LightLingStandardService02](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02.md)<br>
