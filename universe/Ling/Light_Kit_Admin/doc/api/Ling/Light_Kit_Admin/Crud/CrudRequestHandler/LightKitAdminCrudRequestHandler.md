[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The LightKitAdminCrudRequestHandler class
================
2019-05-17 --> 2019-12-17






Introduction
============

The LightKitAdminCrudRequestHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminCrudRequestHandler</span> extends [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightCrudRequestHandlerInterface](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) {

- Inherited properties
    - protected string [LightBaseCrudRequestHandler::$pluginName](#property-pluginName) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBaseCrudRequestHandler::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Crud/CrudRequestHandler/LightKitAdminCrudRequestHandler/__construct.md)() : void

- Inherited methods
    - public LightBaseCrudRequestHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightBaseCrudRequestHandler::execute(string $pluginContextIdentifier, string $table, string $action, ?array $params = []) : mixed
    - protected LightBaseCrudRequestHandler::executeCreate(string $pluginContextIdentifier, string $table, ?array $params = []) : void
    - protected LightBaseCrudRequestHandler::executeUpdate(string $pluginContextIdentifier, string $table, ?array $params = []) : void
    - protected LightBaseCrudRequestHandler::executeDelete(string $pluginContextIdentifier, string $table, ?array $params = [], ?bool $isMultiple = false) : void
    - protected LightBaseCrudRequestHandler::checkMicroPermission(string $pluginContextIdentifier, string $table, string $action) : void
    - protected LightBaseCrudRequestHandler::getAllowedTables() : array
    - protected LightBaseCrudRequestHandler::error(string $msg) : void

}






Methods
==============

- [LightKitAdminCrudRequestHandler::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Crud/CrudRequestHandler/LightKitAdminCrudRequestHandler/__construct.md) &ndash; Builds the LightBaseCrudRequestHandler instance.
- LightBaseCrudRequestHandler::setContainer &ndash; Sets the light service container interface.
- LightBaseCrudRequestHandler::execute &ndash; and throws an exception if a problem occurs.
- LightBaseCrudRequestHandler::executeCreate &ndash; Executes the crud.create request.
- LightBaseCrudRequestHandler::executeUpdate &ndash; Executes the crud.update request.
- LightBaseCrudRequestHandler::executeDelete &ndash; Executes the crud.delete request.
- LightBaseCrudRequestHandler::checkMicroPermission &ndash; and throws an exception if that's not the case.
- LightBaseCrudRequestHandler::getAllowedTables &ndash; Returns the array of allowed tables.
- LightBaseCrudRequestHandler::error &ndash; Throws an error message.





Location
=============
Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler<br>
See the source code of [Ling\Light_Kit_Admin\Crud\CrudRequestHandler\LightKitAdminCrudRequestHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Crud/CrudRequestHandler/LightKitAdminCrudRequestHandler.php)



SeeAlso
==============
Previous class: [LightKitAdminControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/ControllerHub/LightKitAdminControllerHubHandler.md)<br>Next class: [MessagesDataExtractor](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/MessagesDataExtractor.md)<br>
