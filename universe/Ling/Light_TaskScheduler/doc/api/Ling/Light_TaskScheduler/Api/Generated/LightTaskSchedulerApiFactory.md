[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerApiFactory class
================
2020-06-30 --> 2021-05-31






Introduction
============

The LightTaskSchedulerApiFactory class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerApiFactory</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/__construct.md)() : void
    - public [getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md)() : [CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.md)
    - public [setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightTaskSchedulerApiFactory::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/__construct.md) &ndash; Builds the LightTaskSchedulerApiFactoryObjectFactory instance.
- [LightTaskSchedulerApiFactory::getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md) &ndash; Returns a CustomTaskScheduleApiInterface.
- [LightTaskSchedulerApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightTaskSchedulerApiFactory::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_TaskScheduler\Api\Generated\LightTaskSchedulerApiFactory<br>
See the source code of [Ling\Light_TaskScheduler\Api\Generated\LightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Generated/LightTaskSchedulerApiFactory.php)



SeeAlso
==============
Previous class: [TaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/Interfaces/TaskScheduleApiInterface.md)<br>Next class: [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md)<br>
