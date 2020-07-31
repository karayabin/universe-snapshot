[Back to the Ling/Light_LingStandardService api](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService.md)



The LightLingStandardServiceKitAdminPlugin class
================
2020-07-28 --> 2020-07-31






Introduction
============

The LightLingStandardServiceKitAdminPlugin class.



Class synopsis
==============


abstract class <span class="pl-k">LightLingStandardServiceKitAdminPlugin</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - private string [$_className](#property-_className) ;
    - private string [$_exceptionClassName](#property-_exceptionClassName) ;
    - private string [$_basePluginName](#property-_basePluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/setOptions.md)(array $options) : void
    - public [install](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/getDependencies.md)() : array
    - protected [error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/error.md)(string $msg) : void
    - private [prepareTheNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/prepareTheNames.md)() : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    

- <span id="property-_className"><b>_className</b></span>

    The concrete class name.
    This is only available after a call to the prepareTheNames method.
    
    

- <span id="property-_exceptionClassName"><b>_exceptionClassName</b></span>

    The exception class name.
    This is only available after a call to the prepareTheNames method.
    
    

- <span id="property-_basePluginName"><b>_basePluginName</b></span>

    This property holds the _basePluginName for this instance.
    
    



Methods
==============

- [LightLingStandardServiceKitAdminPlugin::__construct](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/__construct.md) &ndash; Builds the LightLingStandardService01 instance.
- [LightLingStandardServiceKitAdminPlugin::setContainer](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/setContainer.md) &ndash; Sets the container.
- [LightLingStandardServiceKitAdminPlugin::setOptions](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/setOptions.md) &ndash; Sets the options.
- [LightLingStandardServiceKitAdminPlugin::install](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/install.md) &ndash; Installs the plugin in the light application.
- [LightLingStandardServiceKitAdminPlugin::isInstalled](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightLingStandardServiceKitAdminPlugin::uninstall](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/uninstall.md) &ndash; Uninstalls the plugin.
- [LightLingStandardServiceKitAdminPlugin::getDependencies](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightLingStandardServiceKitAdminPlugin::error](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/error.md) &ndash; Throws an exception.
- [LightLingStandardServiceKitAdminPlugin::prepareTheNames](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardServiceKitAdminPlugin/prepareTheNames.md) &ndash; prepareTheNames names used by this class.





Location
=============
Ling\Light_LingStandardService\Service\LightLingStandardServiceKitAdminPlugin<br>
See the source code of [Ling\Light_LingStandardService\Service\LightLingStandardServiceKitAdminPlugin](https://github.com/lingtalfi/Light_LingStandardService/blob/master/Service/LightLingStandardServiceKitAdminPlugin.php)



SeeAlso
==============
Previous class: [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md)<br>
