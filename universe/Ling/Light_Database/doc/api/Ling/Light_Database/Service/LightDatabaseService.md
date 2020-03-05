[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)



The LightDatabaseService class
================
2019-07-22 --> 2020-03-03






Introduction
============

The LightDatabaseService class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseService</span> extends [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) implements [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php) {

- Inherited properties
    - protected [\PDOException](https://www.php.net/manual/en/class.pdoexception.php)|null [LightDatabasePdoWrapper::$pdoException](#property-pdoException) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDatabasePdoWrapper::$container](#property-container) ;
    - protected [Ling\Light_Database\EventHandler\LightDatabaseEventHandlerInterface[]](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) [LightDatabasePdoWrapper::$eventHandlers](#property-eventHandlers) ;
    - public static bool [SimplePdoWrapper::$isSystemCall](#property-isSystemCall) = false ;
    - protected static int [SimplePdoWrapper::$defaultFetchStyle](#property-defaultFetchStyle) = 2 ;
    - protected [\PDO](https://www.php.net/manual/en/class.pdo.php)|null [SimplePdoWrapper::$connexion](#property-connexion) ;
    - protected string [SimplePdoWrapper::$query](#property-query) ;

- Inherited methods
    - public [LightDatabasePdoWrapper::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md)() : void
    - public [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)(array $settings) : void
    - public [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)() : [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null
    - public [LightDatabasePdoWrapper::insert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/insert.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [LightDatabasePdoWrapper::replace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/replace.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [LightDatabasePdoWrapper::update](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/update.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - public [LightDatabasePdoWrapper::delete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/delete.md)($table, ?$whereConds = null, ?$markers = []) : mixed
    - public [LightDatabasePdoWrapper::fetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : false | array
    - public [LightDatabasePdoWrapper::fetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : false | array
    - public [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [LightDatabasePdoWrapper::registerEventHandler](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/registerEventHandler.md)([Ling\Light_Database\EventHandler\LightDatabaseEventHandlerInterface](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) $handler) : void
    - protected [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void
    - protected [LightDatabasePdoWrapper::dispatch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/dispatch.md)(string $eventName, ?...$args) : void
    - protected [LightDatabasePdoWrapper::peakSystemCall](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/peakSystemCall.md)() : bool
    - public SimplePdoWrapper::setConnexion([\PDO](https://www.php.net/manual/en/class.pdo.php) $connexion) : void
    - public SimplePdoWrapper::getConnexion() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - public SimplePdoWrapper::setErrorMode($errorMode) : mixed
    - public SimplePdoWrapper::getError() : null | array
    - public SimplePdoWrapper::transaction(callable $transactionCallback, ?[\Exception](http://php.net/manual/en/class.exception.php) &$e = null) : bool
    - public SimplePdoWrapper::executeStatement($query) : false | int
    - public static SimplePdoWrapper::addWhereSubStmt(&$stmt, array &$markers, $whereConds) : void
    - protected SimplePdoWrapper::boot() : [PDO](https://www.php.net/manual/en/class.pdo.php) | null
    - protected SimplePdoWrapper::storeQueryObject($queryObject) : void
    - protected static SimplePdoWrapper::addAssignmentListSubStmt(&$stmt, array &$markers, array $fields, ?$firstForm = false) : void

}






Methods
==============

- [LightDatabasePdoWrapper::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md) &ndash; Builds the LightDatabasePdoWrapper instance.
- [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md) &ndash; Creates the pdo instance and attaches it to this instance.
- [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md) &ndash; init method.
- [LightDatabasePdoWrapper::insert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/insert.md) &ndash; Executes the insert statement and returns the lastInsertId.
- [LightDatabasePdoWrapper::replace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/replace.md) &ndash; Executes the replace statement and returns the lastInsertId.
- [LightDatabasePdoWrapper::update](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/update.md) &ndash; Executes the update statement and returns whether the statement was executed successfully.
- [LightDatabasePdoWrapper::delete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/delete.md) &ndash; Executes the delete statement and returns the number of deleted rows.
- [LightDatabasePdoWrapper::fetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetch.md) &ndash; Executes the prepared statement and returns the fetched row, or false in case of failure.
- [LightDatabasePdoWrapper::fetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/fetchAll.md) &ndash; Executes the prepared statement and return an array containing all of the result set rows.
- [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md) &ndash; Sets the container.
- [LightDatabasePdoWrapper::registerEventHandler](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/registerEventHandler.md) &ndash; Registers a event handler.
- [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md) &ndash; A hook for other classes to use.
- [LightDatabasePdoWrapper::dispatch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/dispatch.md) &ndash; Dispatches the event which name is given with the given args.
- [LightDatabasePdoWrapper::peakSystemCall](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/peakSystemCall.md) &ndash; Returns whether the current call was a system call, and turns the system call flag back down.
- SimplePdoWrapper::setConnexion &ndash; Sets the pdo connexion.
- SimplePdoWrapper::getConnexion &ndash; Returns the current pdo connexion.
- SimplePdoWrapper::setErrorMode &ndash; Sets the error mode.
- SimplePdoWrapper::getError &ndash; Returns the error info of the last statement executed, or null if there was no error.
- SimplePdoWrapper::transaction &ndash; Executes a transaction, and returns whether it was successful.
- SimplePdoWrapper::executeStatement &ndash; Executes an SQL statement and returns the number of affected rows.
- SimplePdoWrapper::addWhereSubStmt &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
- SimplePdoWrapper::boot &ndash; You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).
- SimplePdoWrapper::storeQueryObject &ndash; Stores the query object so that we can get the errors out of it.
- SimplePdoWrapper::addAssignmentListSubStmt &ndash; for INSERT or UPDATE like statements.





Location
=============
Ling\Light_Database\Service\LightDatabaseService<br>
See the source code of [Ling\Light_Database\Service\LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/Service/LightDatabaseService.php)



SeeAlso
==============
Previous class: [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md)<br>Next class: [LightDatabaseTrait](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Traits/LightDatabaseTrait.md)<br>
