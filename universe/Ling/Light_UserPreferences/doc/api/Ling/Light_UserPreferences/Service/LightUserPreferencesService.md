[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)



The LightUserPreferencesService class
================
2020-07-31 --> 2021-05-31






Introduction
============

The LightUserPreferencesService class.



Class synopsis
==============


class <span class="pl-k">LightUserPreferencesService</span> extends [LightLingStandardService02](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02.md)  {

- Properties
    - protected [Ling\Light_UserPreferences\Api\Custom\CustomLightUserPreferencesApiFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/CustomLightUserPreferencesApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLingStandardService02::$container](#property-container) ;
    - protected array [LightLingStandardService02::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/__construct.md)() : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Service/LightUserPreferencesService/getFactory.md)() : [CustomLightUserPreferencesApiFactory](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/CustomLightUserPreferencesApiFactory.md)

- Inherited methods
    - public LightLingStandardService02::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightLingStandardService02::setOptions(array $options) : void
    - public LightLingStandardService02::logDebug($msg) : void
    - protected LightLingStandardService02::error(string $msg) : void

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
- LightLingStandardService02::setContainer &ndash; Sets the container.
- LightLingStandardService02::setOptions &ndash; Sets the options.
- LightLingStandardService02::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService02::error &ndash; Throws an exception.





Location
=============
Ling\Light_UserPreferences\Service\LightUserPreferencesService<br>
See the source code of [Ling\Light_UserPreferences\Service\LightUserPreferencesService](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Service/LightUserPreferencesService.php)



SeeAlso
==============
Previous class: [LightUserPreferencesPluginInstaller](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Light_PluginInstaller/LightUserPreferencesPluginInstaller.md)<br>
