[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerService class
================
2020-06-30 --> 2020-07-27






Introduction
============

The LightTaskSchedulerService class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;
    - protected [Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md) [$factory](#property-factory) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setOptions.md)(array $options) : void
    - public [run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md)() : void
    - public [logDebug](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/logDebug.md)($msg) : void
    - public [getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md)() : [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md)
    - protected [executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md)(array $taskRow) : false | mixed
    - private [error](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    - useDebug: bool, whether to enable the debug log
    
    
    
    See the [Light_TaskScheduler conception notes](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/pages/conception-notes.md) for more details.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    



Methods
==============

- [LightTaskSchedulerService::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md) &ndash; Builds the LightTaskSchedulerService instance.
- [LightTaskSchedulerService::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setContainer.md) &ndash; Sets the container.
- [LightTaskSchedulerService::setOptions](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setOptions.md) &ndash; Sets the options.
- [LightTaskSchedulerService::run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md) &ndash; This method IS the task manager.
- [LightTaskSchedulerService::logDebug](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/logDebug.md) &ndash; Sends a message to the debug log, only if the useDebug option is set to true.
- [LightTaskSchedulerService::getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightTaskSchedulerService::executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md) &ndash; Executes the task and returns its return.
- [LightTaskSchedulerService::error](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_TaskScheduler\Service\LightTaskSchedulerService<br>
See the source code of [Ling\Light_TaskScheduler\Service\LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Service/LightTaskSchedulerService.php)



SeeAlso
==============
Previous class: [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md)<br>
