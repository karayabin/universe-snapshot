Ling/Light_Crud
================
2019-11-28 --> 2020-06-04




Table of contents
===========

- [LightCrudAjaxHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler.md) &ndash; The LightCrudAjaxHandler class.
    - [LightCrudAjaxHandler::doHandle](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/doHandle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - BaseLightAjaxHandler::handle &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
    - ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) &ndash; The LightBaseCrudRequestHandler class.
    - [LightBaseCrudRequestHandler::__construct](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/__construct.md) &ndash; Builds the LightBaseCrudRequestHandler instance.
    - [LightBaseCrudRequestHandler::setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/setContainer.md) &ndash; Sets the light service container interface.
    - [LightBaseCrudRequestHandler::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/execute.md) &ndash; and throws an exception if a problem occurs.
- [LightCrudRequestHandlerInterface](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) &ndash; The LightCrudRequestHandlerInterface interface.
    - [LightCrudRequestHandlerInterface::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface/execute.md) &ndash; and throws an exception if a problem occurs.
- [LightCrudException](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Exception/LightCrudException.md) &ndash; The LightCrudException class.
- [LightCrudService](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService.md) &ndash; The LightCrudService class.
    - [LightCrudService::__construct](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/__construct.md) &ndash; Builds the LightCrudService instance.
    - [LightCrudService::registerHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/registerHandler.md) &ndash; Registers a crud request handler.
    - [LightCrudService::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/execute.md) &ndash; Executes the sql request and dispatches an event.
    - [LightCrudService::setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [Light_Events](https://github.com/lingtalfi/Light_Events)


