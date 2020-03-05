[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\Service\LightCrudService class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService.md)


LightCrudService::execute
================



LightCrudService::execute — Executes the sql request and dispatches an event.




Description
================


public [LightCrudService::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/execute.md)(string $contextIdentifier, string $table, string $action, ?array $params = []) : void




Executes the sql request and dispatches an event.

See the [LightCrudRequestHandlerInterface](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) comments for a more details about the parameters.




Parameters
================


- contextIdentifier

    

- table

    

- action

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightCrudService::execute](https://github.com/lingtalfi/Light_Crud/blob/master/Service/LightCrudService.php#L71-L83)


See Also
================

The [LightCrudService](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService.md) class.

Previous method: [registerHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/registerHandler.md)<br>Next method: [setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/Service/LightCrudService/setContainer.md)<br>

