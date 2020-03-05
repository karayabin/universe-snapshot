[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)


LightBaseCrudRequestHandler::checkMicroPermission
================



LightBaseCrudRequestHandler::checkMicroPermission — and throws an exception if that's not the case.




Description
================


protected [LightBaseCrudRequestHandler::checkMicroPermission](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/checkMicroPermission.md)(string $pluginContextIdentifier, string $table, string $action) : void




Checks whether the current user has the correct micro permission, based on the given parameters,
and throws an exception if that's not the case.




Parameters
================


- pluginContextIdentifier

    

- table

    

- action

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightBaseCrudRequestHandler::checkMicroPermission](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightBaseCrudRequestHandler.php#L265-L279)


See Also
================

The [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) class.

Previous method: [executeDelete](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/executeDelete.md)<br>Next method: [getAllowedTables](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/getAllowedTables.md)<br>

