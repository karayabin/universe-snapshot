[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The LightMailStatsService class
================
2021-06-18 --> 2021-06-25






Introduction
============

The LightMailStatsService class.



Class synopsis
==============


class <span class="pl-k">LightMailStatsService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_MailStats\Api\Custom\CustomLightMailStatsApiFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/CustomLightMailStatsApiFactory.md)|null [$factory](#property-factory) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/setOptions.md)(array $options) : void
    - private [error](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/error.md)(string $msg) : void
    - public [getFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/getFactory.md)() : [CustomLightMailStatsApiFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/CustomLightMailStatsApiFactory.md)

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_MailStats conception notes](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    



Methods
==============

- [LightMailStatsService::__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/__construct.md) &ndash; Builds the LightMailStatsService instance.
- [LightMailStatsService::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/setContainer.md) &ndash; Sets the container.
- [LightMailStatsService::setOptions](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/setOptions.md) &ndash; Sets the options.
- [LightMailStatsService::error](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/error.md) &ndash; Throws an exception.
- [LightMailStatsService::getFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Service/LightMailStatsService/getFactory.md) &ndash; Returns the factory for this plugin's api.





Location
=============
Ling\Light_MailStats\Service\LightMailStatsService<br>
See the source code of [Ling\Light_MailStats\Service\LightMailStatsService](https://github.com/lingtalfi/Light_MailStats/blob/master/Service/LightMailStatsService.php)



SeeAlso
==============
Previous class: [LightMailStatsPlanetInstaller](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Light_PlanetInstaller/LightMailStatsPlanetInstaller.md)<br>
