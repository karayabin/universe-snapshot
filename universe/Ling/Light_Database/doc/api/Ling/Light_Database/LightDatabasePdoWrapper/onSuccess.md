[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\LightDatabasePdoWrapper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)


LightDatabasePdoWrapper::onSuccess
================



LightDatabasePdoWrapper::onSuccess — A hook for other classes to use.




Description
================


protected [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void




A hook for other classes to use.
This hook is triggered every time one of the following operation is triggered (basically an operation that
changes the state of the database):

- insert
- replace
- update
- delete


Beware that if you use the executeStatement method to perform an insert for instance, this will not trigger
this onSuccess method (i.e. you need to call the insert method directly).

Note: This method was written with the intent to be overridden by the user (i.e you should override this method in a sub-class).



Parameters
================


- type

    

- table

    

- query

    

- arguments

    

- return

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php#L180-L207)


See Also
================

The [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)<br>

