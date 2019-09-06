[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)



The LightDatabasePdoWrapper class
================
2019-07-22 --> 2019-08-14






Introduction
============

The LightDatabasePdoWrapper class.



Class synopsis
==============


class <span class="pl-k">LightDatabasePdoWrapper</span> extends [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php) implements [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php) {

- Properties
    - protected [\PDOException](https://www.php.net/manual/en/class.pdoexception.php)|null [$pdoException](#property-pdoException) ;

- Inherited properties
    - protected static int [SimplePdoWrapper::$defaultFetchStyle](#property-defaultFetchStyle) = 2 ;
    - protected [\PDO](https://www.php.net/manual/en/class.pdo.php)|null [SimplePdoWrapper::$connexion](#property-connexion) ;
    - protected string [SimplePdoWrapper::$query](#property-query) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md)() : void
    - public [init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)(array $settings) : void
    - public [getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)() : [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null

- Inherited methods
    - public SimplePdoWrapper::setConnexion([\PDO](https://www.php.net/manual/en/class.pdo.php) $connexion) : void
    - public SimplePdoWrapper::getConnexion() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - public SimplePdoWrapper::setErrorMode(?$errorMode) : mixed
    - public SimplePdoWrapper::getError() : null | array
    - public SimplePdoWrapper::transaction(callable $transactionCallback, [\Exception](http://php.net/manual/en/class.exception.php) &$e = null) : bool
    - public SimplePdoWrapper::insert(?$table, array $fields = [], array $options = []) : false | string
    - public SimplePdoWrapper::replace(?$table, array $fields = [], array $options = []) : false | string
    - public SimplePdoWrapper::update(?$table, array $fields, $whereConds = null, array $markers = []) : bool
    - public SimplePdoWrapper::delete(?$table, $whereConds = null, $markers = []) : mixed
    - public SimplePdoWrapper::fetch(?$query, array $markers = [], $fetchStyle = null) : false | array
    - public SimplePdoWrapper::fetchAll(?$query, array $markers = [], $fetchStyle = null, $fetchArg = null, array $ctorArgs = []) : false | array
    - public SimplePdoWrapper::executeStatement(?$query) : false | int
    - protected SimplePdoWrapper::boot() : [PDO](https://www.php.net/manual/en/class.pdo.php) | null
    - protected SimplePdoWrapper::storeQueryObject(?$queryObject) : void
    - protected static SimplePdoWrapper::addWhereSubStmt(?&$stmt, array &$markers, ?$whereConds) : void
    - protected static SimplePdoWrapper::addAssignmentListSubStmt(?&$stmt, array &$markers, array $fields, $firstForm = false) : void

}




Properties
=============

- <span id="property-pdoException"><b>pdoException</b></span>

    This property holds the pdoException thrown during the connection,
    or null if such exception was not thrown.
    
    

- <span id="property-defaultFetchStyle"><b>defaultFetchStyle</b></span>

    This property holds the default fetch style value for the fetch and fetchAll methods.
    
    

- <span id="property-connexion"><b>connexion</b></span>

    This property holds the \PDO instance.
    
    

- <span id="property-query"><b>query</b></span>

    This property holds the last query executed.
    Note: the concrete class is responsible for updating this value.
    
    



Methods
==============

- [LightDatabasePdoWrapper::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md) &ndash; Builds the LightDatabasePdoWrapper instance.
- [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md) &ndash; Creates the pdo instance and attaches it to this instance.
- [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md) &ndash; init method.
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
- SimplePdoWrapper::boot &ndash; You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).
- SimplePdoWrapper::storeQueryObject &ndash; Stores the query object so that we can get the errors out of it.
- SimplePdoWrapper::addWhereSubStmt &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
- SimplePdoWrapper::addAssignmentListSubStmt &ndash; for INSERT or UPDATE like statements.





Location
=============
Ling\Light_Database\LightDatabasePdoWrapper<br>
See the source code of [Ling\Light_Database\LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/LightDatabasePdoWrapper.php)



SeeAlso
==============
Previous class: [LightDatabaseException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Exception/LightDatabaseException.md)<br>
