[Back to the Ling/Light_MailStats api](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats.md)



The LightMailStatsApiFactory class
================
2021-06-18 --> 2021-06-25






Introduction
============

The LightMailStatsApiFactory class.



Class synopsis
==============


class <span class="pl-k">LightMailStatsApiFactory</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/__construct.md)() : void
    - public [getTrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/getTrackerApi.md)() : [CustomTrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Interfaces/CustomTrackerApiInterface.md)
    - public [getStatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/getStatsApi.md)() : [CustomStatsApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Custom/Interfaces/CustomStatsApiInterface.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightMailStatsApiFactory::__construct](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/__construct.md) &ndash; Builds the LightMailStatsApiFactoryObjectFactory instance.
- [LightMailStatsApiFactory::getTrackerApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/getTrackerApi.md) &ndash; Returns a CustomTrackerApiInterface.
- [LightMailStatsApiFactory::getStatsApi](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/getStatsApi.md) &ndash; Returns a CustomStatsApiInterface.
- [LightMailStatsApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightMailStatsApiFactory::setContainer](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/LightMailStatsApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_MailStats\Api\Generated\LightMailStatsApiFactory<br>
See the source code of [Ling\Light_MailStats\Api\Generated\LightMailStatsApiFactory](https://github.com/lingtalfi/Light_MailStats/blob/master/Api/Generated/LightMailStatsApiFactory.php)



SeeAlso
==============
Previous class: [TrackerApiInterface](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Api/Generated/Interfaces/TrackerApiInterface.md)<br>Next class: [LightMailStatsController](https://github.com/lingtalfi/Light_MailStats/blob/master/doc/api/Ling/Light_MailStats/Controller/LightMailStatsController.md)<br>
