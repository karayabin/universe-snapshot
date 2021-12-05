[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The CustomLightTaskSchedulerApiFactory class
================
2020-06-30 --> 2021-06-25






Introduction
============

The CustomLightTaskSchedulerApiFactory class.



Class synopsis
==============


class <span class="pl-k">CustomLightTaskSchedulerApiFactory</span> extends [LightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory.md)  {

- Inherited properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [LightTaskSchedulerApiFactory::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightTaskSchedulerApiFactory::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory/__construct.md)() : void

- Inherited methods
    - public [LightTaskSchedulerApiFactory::getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md)() : [CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.md)
    - public [LightTaskSchedulerApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void
    - public [LightTaskSchedulerApiFactory::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}






Methods
==============

- [CustomLightTaskSchedulerApiFactory::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory/__construct.md) &ndash; Builds the CustomLightTaskSchedulerApiFactory instance.
- [LightTaskSchedulerApiFactory::getTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/getTaskScheduleApi.md) &ndash; Returns a CustomTaskScheduleApiInterface.
- [LightTaskSchedulerApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.
- [LightTaskSchedulerApiFactory::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Generated/LightTaskSchedulerApiFactory/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory<br>
See the source code of [Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Api/Custom/CustomLightTaskSchedulerApiFactory.php)



SeeAlso
==============
Previous class: [CustomTaskScheduleApi](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Classes/CustomTaskScheduleApi.md)<br>Next class: [CustomTaskScheduleApiInterface](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/Interfaces/CustomTaskScheduleApiInterface.md)<br>
