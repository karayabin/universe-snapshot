[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightCrudRequestHandlerInterface class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md)


LightCrudRequestHandlerInterface::execute
================



LightCrudRequestHandlerInterface::execute — and throws an exception if a problem occurs.




Description
================


abstract public [LightCrudRequestHandlerInterface::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface/execute.md)(string $table, string $action, ?array $params = []) : mixed




Executes the sql request identified by the given arguments,
and throws an exception if a problem occurs.

The params depend on the action, we suggest the following:


- create:
     - data: array of key/value pairs
- update:
     - data: array of key/value pairs
     - updateRic: array of key/value pairs representing the ric
- delete:
     - ric: array of key/value pairs representing the ric of the row to delete
- deleteMultiple:
     - rics: array of ric items, each of which being an array of key/value pairs representing the ric of a row to delete

- ...other params might be added by plugin authors when necessary.




Parameters
================


- table

    

- action

    

- params

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightCrudRequestHandlerInterface::execute](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightCrudRequestHandlerInterface.php#L39-L39)


See Also
================

The [LightCrudRequestHandlerInterface](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightCrudRequestHandlerInterface.md) class.



