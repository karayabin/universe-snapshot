[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)



The LightLoginNotifierService class
================
2020-11-27 --> 2021-06-25






Introduction
============

The LightLoginNotifierService class.



Class synopsis
==============


class <span class="pl-k">LightLoginNotifierService</span> extends [LightLingStandardService02](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02.md)  {

- Properties
    - protected [Ling\Light_LoginNotifier\Api\Custom\CustomLightLoginNotifierApiFactory](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/CustomLightLoginNotifierApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLingStandardService02::$container](#property-container) ;
    - protected array [LightLingStandardService02::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/__construct.md)() : void
    - public [onWebsiteUserLogin](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/onWebsiteUserLogin.md)(Ling\Light_User\LightWebsiteUser $user) : void
    - public [getFactory](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/getFactory.md)() : [CustomLightLoginNotifierApiFactory](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Custom/CustomLightLoginNotifierApiFactory.md)

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

- [LightLoginNotifierService::__construct](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/__construct.md) &ndash; Builds the LightLoginNotifierService instance.
- [LightLoginNotifierService::onWebsiteUserLogin](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/onWebsiteUserLogin.md) &ndash; Notifies the Light_LoginNotifier plugin that a website user has just logged in.
- [LightLoginNotifierService::getFactory](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Service/LightLoginNotifierService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- LightLingStandardService02::setContainer &ndash; Sets the container.
- LightLingStandardService02::setOptions &ndash; Sets the options.
- LightLingStandardService02::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService02::error &ndash; Throws an exception.





Location
=============
Ling\Light_LoginNotifier\Service\LightLoginNotifierService<br>
See the source code of [Ling\Light_LoginNotifier\Service\LightLoginNotifierService](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Service/LightLoginNotifierService.php)



SeeAlso
==============
Previous class: [LightLoginNotifierPlanetInstaller](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Light_PlanetInstaller/LightLoginNotifierPlanetInstaller.md)<br>
