[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)


LightBaseCrudRequestHandler::executeCreate
================



LightBaseCrudRequestHandler::executeCreate — Executes the crud.create request.




Description
================


protected [LightBaseCrudRequestHandler::executeCreate](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeCreate.md)(string $pluginContextIdentifier, string $table, ?array $params = []) : void




Executes the crud.create request.

The params array has the following structure:

- data: array, the row to insert
- ?multiplier: array, the multiplier array (see [the form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md) for more details)




Parameters
================


- pluginContextIdentifier

    

- table

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightBaseCrudRequestHandler::executeCreate](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightBaseCrudRequestHandler.php#L102-L153)


See Also
================

The [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) class.

Previous method: [execute](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/execute.md)<br>Next method: [executeUpdate](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeUpdate.md)<br>

