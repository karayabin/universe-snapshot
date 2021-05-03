[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)



The LightCrudAjaxHandler class
================
2019-11-28 --> 2021-03-15






Introduction
============

The LightCrudAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightCrudAjaxHandler</span> extends [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md) implements [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - public [doHandle](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/doHandle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - protected [error](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/error.md)(string $msg) : void
    - protected [executeDeleteRows](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/executeDeleteRows.md)(array $params) : array

- Inherited methods
    - public BaseLightAjaxHandler::handle(string $action, Ling\Light\Http\HttpRequestInterface $request) : array
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightCrudAjaxHandler::doHandle](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/doHandle.md) &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- [LightCrudAjaxHandler::error](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/error.md) &ndash; Throws an error message.
- [LightCrudAjaxHandler::executeDeleteRows](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/AjaxHandler/LightCrudAjaxHandler/executeDeleteRows.md) &ndash; Deletes the rows given in the params.
- BaseLightAjaxHandler::handle &ndash; Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_Crud\AjaxHandler\LightCrudAjaxHandler<br>
See the source code of [Ling\Light_Crud\AjaxHandler\LightCrudAjaxHandler](https://github.com/lingtalfi/Light_Crud/blob/master/AjaxHandler/LightCrudAjaxHandler.php)



SeeAlso
==============
Next class: [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)<br>
