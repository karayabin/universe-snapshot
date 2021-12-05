[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerService class
================
2020-06-30 --> 2021-06-25






Introduction
============

The LightTaskSchedulerService class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerService</span> extends [LightLingStandardService02](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService02.md)  {

- Properties
    - protected [Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightLingStandardService02::$container](#property-container) ;
    - protected array [LightLingStandardService02::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md)() : void
    - public [run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md)() : void
    - public [getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md)() : [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md)
    - protected [executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md)(array $taskRow) : false | mixed

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

- [LightTaskSchedulerService::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md) &ndash; Builds the LightTaskSchedulerService instance.
- [LightTaskSchedulerService::run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md) &ndash; This method IS the task manager.
- [LightTaskSchedulerService::getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightTaskSchedulerService::executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md) &ndash; Executes the task and returns its return.
- LightLingStandardService02::setContainer &ndash; Sets the container.
- LightLingStandardService02::setOptions &ndash; Sets the options.
- LightLingStandardService02::logDebug &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- LightLingStandardService02::error &ndash; Throws an exception.





Location
=============
Ling\Light_TaskScheduler\Service\LightTaskSchedulerService<br>
See the source code of [Ling\Light_TaskScheduler\Service\LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Service/LightTaskSchedulerService.php)



SeeAlso
==============
Previous class: [LightTaskSchedulerPlanetInstaller](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Light_PlanetInstaller/LightTaskSchedulerPlanetInstaller.md)<br>
