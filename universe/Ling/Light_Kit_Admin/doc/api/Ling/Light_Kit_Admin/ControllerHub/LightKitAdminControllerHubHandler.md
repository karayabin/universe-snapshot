[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminControllerHubHandler class
================
2019-05-17 --> 2019-12-17






Introduction
============

The LightKitAdminControllerHubHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminControllerHubHandler</span> extends [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) implements [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBaseControllerHubHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/ControllerHub/LightKitAdminControllerHubHandler/handle.md)(string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightBaseControllerHubHandler::__construct() : void
    - public LightBaseControllerHubHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightBaseControllerHubHandler::doHandle(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

}






Methods
==============

- [LightKitAdminControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/ControllerHub/LightKitAdminControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
- LightBaseControllerHubHandler::setContainer &ndash; Sets the container.
- LightBaseControllerHubHandler::doHandle &ndash; Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.





Location
=============
Ling\Light_Kit_Admin\ControllerHub\LightKitAdminControllerHubHandler<br>
See the source code of [Ling\Light_Kit_Admin\ControllerHub\LightKitAdminControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/ControllerHub/LightKitAdminControllerHubHandler.php)



SeeAlso
==============
Previous class: [UserProfileController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/User/UserProfileController.md)<br>Next class: [LightKitAdminCrudRequestHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Crud/CrudRequestHandler/LightKitAdminCrudRequestHandler.md)<br>
