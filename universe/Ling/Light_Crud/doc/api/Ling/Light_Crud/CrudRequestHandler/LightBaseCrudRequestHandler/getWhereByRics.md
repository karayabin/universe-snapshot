[Back to the Ling/Light_Crud api](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud.md)<br>
[Back to the Ling\Light_Crud\CrudRequestHandler\LightBaseCrudRequestHandler class](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md)


LightBaseCrudRequestHandler::getWhereByRics
================



LightBaseCrudRequestHandler::getWhereByRics — rics.




Description
================


protected [LightBaseCrudRequestHandler::getWhereByRics](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/getWhereByRics.md)(array $ricColumns, array $userRics, array &$markers) : string




Returns the where part of an sql query (where keyword excluded) based on the given
rics.
Also feeds the pdo markers array.

It returns a string that looks like this for instance (parenthesis are part of the returned string)):

- (
     (user_id like '1' AND permission_group_id like '5')
     OR (user_id like '3' AND permission_group_id like '4')
     ...
  )


The given rics is an array of ric column names,
whereas the given userRics is an array of items, each of which representing a row and
being an array of (ric) column to value.




Parameters
================


- ricColumns

    

- userRics

    

- markers

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightBaseCrudRequestHandler::getWhereByRics](https://github.com/lingtalfi/Light_Crud/blob/master/CrudRequestHandler/LightBaseCrudRequestHandler.php#L335-L366)


See Also
================

The [LightBaseCrudRequestHandler](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler.md) class.

Previous method: [getAllowedTables](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/getAllowedTables.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Crud/blob/master/doc/api/Ling/Light_Crud/CrudRequestHandler/LightBaseCrudRequestHandler/error.md)<br>

