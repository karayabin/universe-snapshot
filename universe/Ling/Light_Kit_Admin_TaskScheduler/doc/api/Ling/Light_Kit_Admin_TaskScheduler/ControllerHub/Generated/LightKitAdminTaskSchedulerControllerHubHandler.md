[Back to the Ling/Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md)



The LightKitAdminTaskSchedulerControllerHubHandler class
================
2020-07-31 --> 2020-08-28






Introduction
============

The LightKitAdminTaskSchedulerControllerHubHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminTaskSchedulerControllerHubHandler</span> extends [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) implements [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBaseControllerHubHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/ControllerHub/Generated/LightKitAdminTaskSchedulerControllerHubHandler/handle.md)(string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightBaseControllerHubHandler::__construct() : void
    - public LightBaseControllerHubHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightBaseControllerHubHandler::doHandle(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

}






Methods
==============

- [LightKitAdminTaskSchedulerControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/ControllerHub/Generated/LightKitAdminTaskSchedulerControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
- LightBaseControllerHubHandler::setContainer &ndash; Sets the container.
- LightBaseControllerHubHandler::doHandle &ndash; Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.





Location
=============
Ling\Light_Kit_Admin_TaskScheduler\ControllerHub\Generated\LightKitAdminTaskSchedulerControllerHubHandler<br>
See the source code of [Ling\Light_Kit_Admin_TaskScheduler\ControllerHub\Generated\LightKitAdminTaskSchedulerControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/ControllerHub/Generated/LightKitAdminTaskSchedulerControllerHubHandler.php)



SeeAlso
==============
Previous class: [LtsTaskScheduleController](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController.md)<br>Next class: [LightKitAdminTaskSchedulerLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/LightKitAdminPlugin/Generated/LightKitAdminTaskSchedulerLkaPlugin.md)<br>
