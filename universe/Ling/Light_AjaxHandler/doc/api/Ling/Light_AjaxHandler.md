Ling/Light_AjaxHandler
================
2019-09-19 --> 2020-08-21




Table of contents
===========

- [LightAjaxHandlerController](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController.md) &ndash; The LightAjaxHandlerController class.
    - [LightAjaxHandlerController::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/handle.md) &ndash; Handles the request and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).
    - LightController::__construct &ndash; Builds the LightController instance.
    - LightController::setLight &ndash; Sets the light instance.
- [LightAjaxHandlerException](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Exception/LightAjaxHandlerException.md) &ndash; The LightAjaxHandlerException class.
- [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md) &ndash; The BaseLightAjaxHandler class.
    - [BaseLightAjaxHandler::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/handle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md) &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md) &ndash; Sets the light service container interface.
- [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) &ndash; The ContainerAwareLightAjaxHandler class.
    - [ContainerAwareLightAjaxHandler::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/__construct.md) &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - [ContainerAwareLightAjaxHandler::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler/setContainer.md) &ndash; Sets the light service container interface.
    - [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) &ndash; The LightAjaxHandlerInterface interface.
    - [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- [LightAjaxHandlerService](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService.md) &ndash; The LightAjaxHandlerService class.
    - [LightAjaxHandlerService::__construct](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/__construct.md) &ndash; Builds the LightAjaxHandlerService instance.
    - [LightAjaxHandlerService::setContainer](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/setContainer.md) &ndash; Sets the container.
    - [LightAjaxHandlerService::registerHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/registerHandler.md) &ndash; Registers a handler.
    - [LightAjaxHandlerService::getHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/getHandler.md) &ndash; Returns the handler identified by the given identifier.
    - [LightAjaxHandlerService::getServiceUrl](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/getServiceUrl.md) &ndash; Returns the base url for the ajax handler service controller.
    - [LightAjaxHandlerService::getRouteName](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/getRouteName.md) &ndash; Returns the name of the route used by this service.
    - [LightAjaxHandlerService::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/handle.md) &ndash; Handles the request and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_CsrfSession](https://github.com/lingtalfi/Light_CsrfSession)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light_ReverseRouter](https://github.com/lingtalfi/Light_ReverseRouter)


