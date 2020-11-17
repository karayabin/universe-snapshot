[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\Service\LightDatabaseService class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md)


LightDatabaseService::queryLog
================



LightDatabaseService::queryLog — Hook for children classes.




Description
================


protected [LightDatabaseService::queryLog](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/queryLog.md)(string $type, ?...$args) : void




Hook for children classes.

It logs the calls to our different methods BEFORE they are executed.


The type can be one of:
- transactionBegin: indicates a call to the pdo->beginTransaction method
- transactionCommit: indicates a call to the pdo->commit method
- transactionEnd: indicates when a transaction ends (after either a commit or a rollback)
- transactionRollback: indicates when a call to the pdo->rollback method
- insert: indicates when a call to our insert method
- replace: indicates when a call to our replace method
- update: indicates when a call to our update method
- delete: indicates when a call to our delete method
- fetch: indicates when a call to our fetch method
- fetchAll: indicates when a call to our fetchAll method
- execute: indicates when a call to our executeStatement method
- exception: indicates that an exception was caught from either a transaction, or a call to one of those methods:
     insert, replace, update, delete, fetch, fetchAll, execute.


The rest of the arguments depends on the type.
Only the following types have arguments (see the source code for more details):

- insert: $table, $query, $markers, $fields, $options
- replace: $table, $query, $markers, $fields, $options
- update: $table, $query, $markers, $fields, $whereConds
- delete: $table, $query, $markers, $whereConds
- fetch: $query, $markers, $fetchStyle
- fetchAll: $markers, $fetchStyle, $fetchArg, $ctorArgs
- execute: $query
- exception: $exception (the Exception instance)




Parameters
================


- type

    

- args

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightDatabaseService::queryLog](https://github.com/lingtalfi/Light_Database/blob/master/Service/LightDatabaseService.php#L97-L155)


See Also
================

The [LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) class.

Previous method: [onExceptionCaught](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/onExceptionCaught.md)<br>

