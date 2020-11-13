[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)



The LightUserPreferencesService class
================
2020-07-31 --> 2020-08-13






Introduction
============

The LightUserPreferencesService class.



Class synopsis
==============


class <span class="pl-k">LightUserPreferencesService</span> extends [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected [Ling\Light_UserPreferences\Api\Custom\CustomLightUserPreferencesApiFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/CustomLightUserPreferencesApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLingStandardService01::$container](#property-container) ;
    - protected array [LightLingStandardService01::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/__construct.md)() : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/getFactory.md)() : [CustomLightUserPreferencesApiFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/CustomLightUserPreferencesApiFactory.md)

- Inherited methods
    - public LightLingStandardService01::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightLingStandardService01::setOptions(array $options) : void
    - public LightLingStandardService01::install() : void
    - public LightLingStandardService01::isInstalled() : bool
    - public LightLingStandardService01::uninstall() : void
    - public LightLingStandardService01::getDependencies() : array
    - public LightLingStandardService01::logDebug($msg) : void
    - protected LightLingStandardService01::error(string $msg) : void
    - private LightLingStandardService01::prepareNames() : void

}




Properties
=============

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    - useDebug: bool, whether to enable the debug log (more about that in https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)
    
    



Methods
==============

- [LightUserPreferencesService::__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/__construct.md) &ndash; Builds the LightUserPreferencesService instance.
- [LightUserPreferencesService::getFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- LightLingStandardService01::setContainer &ndash; Sets the container.
- LightLingStandardService01::setOptions &ndash; Sets the options.
- LightLingStandardService01::install &ndash; Installs the plugin in the light application.
- LightLingStandardService01::isInstalled &ndash; Returns whether the core install phase of the plugin is fully completed.
- LightLingStandardService01::uninstall &ndash; Uninstalls the plugin.
- LightLingStandardService01::getDependencies &ndash; Returns the array of dependencies.
- LightLingStandardService01::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService01::error &ndash; Throws an exception.
- LightLingStandardService01::prepareNames &ndash; Prepare names used by this class.





Location
=============
Ling\Light_UserPreferences\Service\LightUserPreferencesService<br>
See the source code of [Ling\Light_UserPreferences\Service\LightUserPreferencesService](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Service/LightUserPreferencesService.php)



SeeAlso
==============
Previous class: [LightUserPreferencesException](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Exception/LightUserPreferencesException.md)<br>
