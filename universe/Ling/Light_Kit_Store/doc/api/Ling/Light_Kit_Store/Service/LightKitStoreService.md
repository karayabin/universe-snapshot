[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The LightKitStoreService class
================
2021-04-06 --> 2021-08-02






Introduction
============

The LightKitStoreService class.



Class synopsis
==============


class <span class="pl-k">LightKitStoreService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md)|null [$passwordProtector](#property-passwordProtector) ;
    - protected [Ling\Light_Kit_Store\Api\Custom\CustomLightKitStoreApiFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/CustomLightKitStoreApiFactory.md)|null [$factory](#property-factory) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void
    - public [getRecaptchaKey](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getRecaptchaKey.md)(string $project, ?bool $isSite = true) : string
    - public [generateUserToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/generateUserToken.md)() : string
    - public [prepareUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/prepareUser.md)(Ling\Light_User\LightUserInterface $user) : void
    - public [registerWebsiteFromDirectory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/registerWebsiteFromDirectory.md)() : void
    - public [getApiUrl](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getApiUrl.md)(string $action) : string
    - public [getFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getFactory.md)() : [CustomLightKitStoreApiFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Custom/CustomLightKitStoreApiFactory.md)
    - public [getPasswordProtector](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getPasswordProtector.md)() : [LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md)
    - public [onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/onLightExceptionCaught.md)(Ling\Light\Events\LightEvent $event) : void
    - private [error](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_Kit_Store conception notes](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-passwordProtector"><b>passwordProtector</b></span>

    This property holds a passwordProtector for this instance.
    See the Light_PasswordProtector planet for mor info: https://github.com/lingtalfi/Light_PasswordProtector.
    
    Note that we use our own instance, so that it's not altered by the user/maintainer configuration.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    



Methods
==============

- [LightKitStoreService::__construct](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/__construct.md) &ndash; Builds the LightKitStoreService instance.
- [LightKitStoreService::setContainer](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setContainer.md) &ndash; Sets the container.
- [LightKitStoreService::setOptions](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/setOptions.md) &ndash; Sets the options.
- [LightKitStoreService::getOption](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getOption.md) &ndash; Returns the option value corresponding to the given key.
- [LightKitStoreService::getRecaptchaKey](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getRecaptchaKey.md) &ndash; Returns the recaptcha key corresponding to the given project, or an empty string if nothing matches.
- [LightKitStoreService::generateUserToken](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/generateUserToken.md) &ndash; Generates a token.
- [LightKitStoreService::prepareUser](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/prepareUser.md) &ndash; This is the callback for the user_manager->addPrepareUserCallback method.
- [LightKitStoreService::registerWebsiteFromDirectory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/registerWebsiteFromDirectory.md) &ndash; Registers a website from a directory.
- [LightKitStoreService::getApiUrl](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getApiUrl.md) &ndash; Shortcut to the api url.
- [LightKitStoreService::getFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightKitStoreService::getPasswordProtector](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/getPasswordProtector.md) &ndash; Returns a configured instance of LightPasswordProtector.
- [LightKitStoreService::onLightExceptionCaught](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/onLightExceptionCaught.md) &ndash; 
- [LightKitStoreService::error](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_Kit_Store\Service\LightKitStoreService<br>
See the source code of [Ling\Light_Kit_Store\Service\LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Service/LightKitStoreService.php)



SeeAlso
==============
Previous class: [LightKitStorePlanetInstaller](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Light_PlanetInstaller/LightKitStorePlanetInstaller.md)<br>Next class: [LightKitStoreItemInstallerInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/StoreItemInstaller/LightKitStoreItemInstallerInterface.md)<br>
