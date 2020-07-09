Ling/Light_ControllerHub
================
2019-10-28 --> 2020-07-02




Table of contents
===========

- [LightControllerHubController](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Controller/LightControllerHubController.md) &ndash; The LightControllerHubController class.
    - [LightControllerHubController::render](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Controller/LightControllerHubController/render.md) &ndash; Understands the incoming http request an returns the appropriate HttpResponseInterface.
    - LightController::__construct &ndash; Builds the LightController instance.
    - LightController::setLight &ndash; Sets the light instance.
- [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) &ndash; The LightBaseControllerHubHandler class.
    - [LightBaseControllerHubHandler::__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/__construct.md) &ndash; Builds the LightKitAdminControllerHubHandler instance.
    - [LightBaseControllerHubHandler::setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/setContainer.md) &ndash; Sets the container.
    - [LightControllerHubHandlerInterface::handle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) &ndash; The LightControllerHubHandlerInterface interface.
    - [LightControllerHubHandlerInterface::handle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- [LightControllerHubException](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Exception/LightControllerHubException.md) &ndash; The LightControllerHubException class.
- [LightControllerHubService](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService.md) &ndash; The LightControllerHubService class.
    - [LightControllerHubService::__construct](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/__construct.md) &ndash; Builds the LightControllerHubService instance.
    - [LightControllerHubService::getControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getControllerHubHandler.md) &ndash; Returns the controller hub handler registered by the plugin which name is given.
    - [LightControllerHubService::registerHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/registerHandler.md) &ndash; Registers the handler for the plugin which name is given.
    - [LightControllerHubService::getRouteName](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/Service/LightControllerHubService/getRouteName.md) &ndash; Returns the route name of the hub controller.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin)


