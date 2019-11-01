[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminAjaxHandler class
================
2019-05-17 --> 2019-10-25






Introduction
============

The LightKitAdminAjaxHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminAjaxHandler</span> extends [ContainerAwareLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/ContainerAwareLightAjaxHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [ContainerAwareLightAjaxHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/handle.md)(string $actionId, array $params) : array
    - protected [error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/error.md)(string $msg) : void
    - protected [executeListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListAction.md)(string $actionName, array $params) : array
    - protected [executeListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListGeneralAction.md)(string $actionName, array $params) : array

- Inherited methods
    - public ContainerAwareLightAjaxHandler::__construct() : void
    - public ContainerAwareLightAjaxHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected ContainerAwareLightAjaxHandler::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)

}






Methods
==============

- [LightKitAdminAjaxHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/handle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).
- [LightKitAdminAjaxHandler::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/error.md) &ndash; Throws an error message.
- [LightKitAdminAjaxHandler::executeListAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListAction.md) &ndash; Executes the list action identified by the given action name and returns the expected ajax response.
- [LightKitAdminAjaxHandler::executeListGeneralAction](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/AjaxHandler/LightKitAdminAjaxHandler/executeListGeneralAction.md) &ndash; Executes the list general action identified by the given action name and returns the expected ajax response.
- ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
- ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- ContainerAwareLightAjaxHandler::getContainer &ndash; Returns the container instance.





Location
=============
Ling\Light_Kit_Admin\AjaxHandler\LightKitAdminAjaxHandler<br>
See the source code of [Ling\Light_Kit_Admin\AjaxHandler\LightKitAdminAjaxHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/AjaxHandler/LightKitAdminAjaxHandler.php)



SeeAlso
==============
Next class: [LightKitAdminBMenuHost](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/BMenu/LightKitAdminBMenuHost.md)<br>
