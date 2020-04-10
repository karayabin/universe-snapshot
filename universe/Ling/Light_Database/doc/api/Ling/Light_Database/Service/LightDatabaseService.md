[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)



The LightDatabaseService class
================
2019-07-22 --> 2020-03-10






Introduction
============

The LightDatabaseService class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseService</span> extends [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) implements [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php) {

- Inherited properties
    - protected [\PDOException](https://www.php.net/manual/en/class.pdoexception.php)|null [LightDatabasePdoWrapper::$pdoException](#property-pdoException) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDatabasePdoWrapper::$container](#property-container) ;
    - protected static int [SimplePdoWrapper::$defaultFetchStyle](#property-defaultFetchStyle) = 2 ;
    - protected [\PDO](https://www.php.net/manual/en/class.pdo.php)|null [SimplePdoWrapper::$connexion](#property-connexion) ;
    - protected string [SimplePdoWrapper::$query](#property-query) ;

- Inherited methods
    - public [LightDatabasePdoWrapper::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md)() : void
    - public [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)(array $settings) : void
    - public [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)() : [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null
    - public [LightDatabasePdoWrapper::pinsert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pinsert.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [LightDatabasePdoWrapper::preplace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/preplace.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [LightDatabasePdoWrapper::pupdate](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pupdate.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - public [LightDatabasePdoWrapper::pdelete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pdelete.md)($table, ?$whereConds = null, ?$markers = []) : false | int
    - public [LightDatabasePdoWrapper::pfetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : array | false
    - public [LightDatabasePdoWrapper::pfetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : array | false
    - public [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void
    - public SimplePdoWrapper::setConnexion([\PDO](https://www.php.net/manual/en/class.pdo.php) $connexion) : void
    - public SimplePdoWrapper::getConnexion() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - public SimplePdoWrapper::setErrorMode($errorMode) : mixed
    - public SimplePdoWrapper::getError() : null | array
    - public SimplePdoWrapper::transaction(callable $transactionCallback, ?[\Exception](http://php.net/manual/en/class.exception.php) &$e = null) : bool
    - public SimplePdoWrapper::insert($table, ?array $fields = [], ?array $options = []) : false | string
    - public SimplePdoWrapper::replace($table, ?array $fields = [], ?array $options = []) : false | string
    - public SimplePdoWrapper::update($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - public SimplePdoWrapper::delete($table, ?$whereConds = null, ?$markers = []) : mixed
    - public SimplePdoWrapper::fetch($query, ?array $markers = [], ?$fetchStyle = null) : false | array
    - public SimplePdoWrapper::fetchAll($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : false | array
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
- [LightDatabasePdoWrapper::pinsert](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pinsert.md) &ndash; Same as insert method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::preplace](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/preplace.md) &ndash; Same as replace method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::pupdate](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pupdate.md) &ndash; Same as update method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::pdelete](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pdelete.md) &ndash; Same as delete method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::pfetch](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetch.md) &ndash; Same as fetch method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::pfetchAll](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/pfetchAll.md) &ndash; Same as fetchAll method, but triggers [the user row restriction checking](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/pages/conception-notes.md) before hand (if available).
- [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md) &ndash; Sets the container.
- [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md) &ndash; A hook for other classes to use.
- SimplePdoWrapper::setConnexion &ndash; Sets the pdo connexion.
- SimplePdoWrapper::getConnexion &ndash; Returns the current pdo connexion.
- SimplePdoWrapper::setErrorMode &ndash; Sets the error mode.
- SimplePdoWrapper::getError &ndash; Returns the error info of the last statement executed, or null if there was no error.
- SimplePdoWrapper::transaction &ndash; Executes a transaction, and returns whether it was successful.
- SimplePdoWrapper::insert &ndash; Executes the insert statement and returns the lastInsertId.
- SimplePdoWrapper::replace &ndash; Executes the replace statement and returns the lastInsertId.
- SimplePdoWrapper::update &ndash; Executes the update statement and returns whether the statement was executed successfully.
- SimplePdoWrapper::delete &ndash; Executes the delete statement and returns the number of deleted rows.
- SimplePdoWrapper::fetch &ndash; Executes the prepared statement and returns the fetched row, or false in case of failure.
- SimplePdoWrapper::fetchAll &ndash; Executes the prepared statement and return an array containing all of the result set rows.
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
