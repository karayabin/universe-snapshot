[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)


LightBaseCrudRequestHandler::execute
================



LightBaseCrudRequestHandler::execute — and throws an exception if a problem occurs.




Description
================


public [LightBaseCrudRequestHandler::execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/execute.md)(string $table, string $action, ?array $params = []) : mixed




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
See the source code for method [LightBaseCrudRequestHandler::execute](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightBaseCrudRequestHandler.php#L51-L77)


See Also
================

The [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/setContainer.md)<br>Next method: [executeCreate](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeCreate.md)<br>

