[Back to the Ling/Light_TaskScheduler api](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler.md)



The LightTaskSchedulerService class
================
2020-06-30 --> 2020-08-14






Introduction
============

The LightTaskSchedulerService class.



Class synopsis
==============


class <span class="pl-k">LightTaskSchedulerService</span> extends [LightLingStandardService01](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_TaskScheduler\Api\Custom\CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected array [LightLingStandardService01::$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md)() : void
    - public [getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md)() : [CustomLightTaskSchedulerApiFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Api/Custom/CustomLightTaskSchedulerApiFactory.md)
    - protected [executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md)(array $taskRow) : false | mixed

- Inherited methods
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

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    - useDebug: bool, whether to enable the debug log (more about that in https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)
    
    



Methods
==============

- [LightTaskSchedulerService::__construct](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/__construct.md) &ndash; Builds the LightTaskSchedulerService instance.
- [LightTaskSchedulerService::setContainer](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/setContainer.md) &ndash; Sets the container.
- [LightTaskSchedulerService::run](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/run.md) &ndash; This method IS the task manager.
- [LightTaskSchedulerService::getFactory](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [LightTaskSchedulerService::executeTaskByRow](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Service/LightTaskSchedulerService/executeTaskByRow.md) &ndash; Executes the task and returns its return.
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
Ling\Light_TaskScheduler\Service\LightTaskSchedulerService<br>
See the source code of [Ling\Light_TaskScheduler\Service\LightTaskSchedulerService](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/Service/LightTaskSchedulerService.php)



SeeAlso
==============
Previous class: [LightTaskSchedulerException](https://github.com/lingtalfi/Light_TaskScheduler/blob/master/doc/api/Ling/Light_TaskScheduler/Exception/LightTaskSchedulerException.md)<br>
