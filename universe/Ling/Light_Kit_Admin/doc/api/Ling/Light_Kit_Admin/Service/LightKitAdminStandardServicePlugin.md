[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminStandardServicePlugin class
================
2019-05-17 --> 2020-12-01






Introduction
============

The LightKitAdminStandardServicePlugin class.



Class synopsis
==============


abstract class <span class="pl-k">LightKitAdminStandardServicePlugin</span> implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - private string [$_className](#property-_className) ;
    - private string [$_exceptionClassName](#property-_exceptionClassName) ;
    - private string [$_basePluginName](#property-_basePluginName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/setOptions.md)(array $options) : void
    - public [install](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/install.md)() : void
    - public [isInstalled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/isInstalled.md)() : bool
    - public [uninstall](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/uninstall.md)() : void
    - public [getDependencies](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/getDependencies.md)() : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/error.md)(string $msg) : void
    - private [prepareTheNames](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/prepareTheNames.md)() : void

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

- [LightKitAdminStandardServicePlugin::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/__construct.md) &ndash; Builds the LightLingStandardService01 instance.
- [LightKitAdminStandardServicePlugin::setContainer](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/setContainer.md) &ndash; Sets the container.
- [LightKitAdminStandardServicePlugin::setOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/setOptions.md) &ndash; Sets the options.
- [LightKitAdminStandardServicePlugin::install](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/install.md) &ndash; Installs the plugin in the light application.
- [LightKitAdminStandardServicePlugin::isInstalled](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
- [LightKitAdminStandardServicePlugin::uninstall](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/uninstall.md) &ndash; Uninstalls the plugin.
- [LightKitAdminStandardServicePlugin::getDependencies](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightKitAdminStandardServicePlugin::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/error.md) &ndash; Throws an exception.
- [LightKitAdminStandardServicePlugin::prepareTheNames](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminStandardServicePlugin/prepareTheNames.md) &ndash; prepareTheNames names used by this class.





Location
=============
Ling\Light_Kit_Admin\Service\LightKitAdminStandardServicePlugin<br>
See the source code of [Ling\Light_Kit_Admin\Service\LightKitAdminStandardServicePlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Service/LightKitAdminStandardServicePlugin.php)



SeeAlso
==============
Previous class: [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)<br>Next class: [LightKitAdminChloroformWidget](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Widget/Picasso/LightKitAdminChloroformWidget.md)<br>
