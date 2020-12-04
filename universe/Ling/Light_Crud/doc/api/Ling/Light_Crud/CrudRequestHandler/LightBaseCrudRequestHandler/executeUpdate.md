[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)


LightBaseCrudRequestHandler::executeUpdate
================



LightBaseCrudRequestHandler::executeUpdate — Executes the crud.update request.




Description
================


protected [LightBaseCrudRequestHandler::executeUpdate](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeUpdate.md)(string $table, ?array $params = []) : void




Executes the crud.update request.


The params array has the following structure:

- data: array, the row to update
- updateRic: array, the key/value pairs array representing the [ric strict](https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-strict-ric) columns and values of the row to update. It basically defines the where part of the sql query.




Parameters
================


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
See the source code for method [LightBaseCrudRequestHandler::executeUpdate](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightBaseCrudRequestHandler.php#L162-L195)


See Also
================

The [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) class.

Previous method: [executeCreate](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeCreate.md)<br>Next method: [executeDelete](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeDelete.md)<br>

