[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)



The LightDatabaseService class
================
2019-07-22 --> 2021-03-05






Introduction
============

The LightDatabaseService class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseService</span> extends [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) implements [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php) {

- Properties
    - protected array [$options](#property-options) ;
    - private [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) [$_mysqlInfoUtil](#property-_mysqlInfoUtil) ;

- Inherited properties
    - protected [\PDOException](https://www.php.net/manual/en/class.pdoexception.php)|null [LightDatabasePdoWrapper::$pdoException](#property-pdoException) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDatabasePdoWrapper::$container](#property-container) ;
    - protected static int [SimplePdoWrapper::$defaultFetchStyle](#property-defaultFetchStyle) = 2 ;
    - protected [\PDO](https://www.php.net/manual/en/class.pdo.php)|null [SimplePdoWrapper::$connexion](#property-connexion) ;
    - protected string [SimplePdoWrapper::$query](#property-query) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/__construct.md)() : void
    - public [setOptions](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/setOptions.md)(array $options) : void
    - public [getMysqlInfoUtil](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/getMysqlInfoUtil.md)() : [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)
    - public [onExceptionCaught](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/onExceptionCaught.md)(Ling\Light\Events\LightEvent $event) : void
    - protected [queryLog](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/queryLog.md)(string $type, ?$args) : void

- Inherited methods
    - public [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md)(array $settings) : void
    - public [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md)() : [PDOException](https://www.php.net/manual/en/class.pdoexception.php) | null
    - public [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [LightDatabasePdoWrapper::onSuccess](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void
    - public SimplePdoWrapper::setConnexion(PDO $connexion) : void
    - public SimplePdoWrapper::getConnexion() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - public SimplePdoWrapper::setErrorMode($errorMode) : mixed
    - public SimplePdoWrapper::getError() : null | array
    - public SimplePdoWrapper::transaction(callable $transactionCallback, ?Exception &$e = null) : bool
    - public SimplePdoWrapper::insert($table, ?array $fields = [], ?array $options = []) : false | string
    - public SimplePdoWrapper::replace($table, ?array $fields = [], ?array $options = []) : false | string
    - public SimplePdoWrapper::update($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - public SimplePdoWrapper::delete($table, ?$whereConds = null, ?$markers = []) : mixed
    - public SimplePdoWrapper::fetch($query, ?array $markers = [], ?$fetchStyle = null) : false | array
    - public SimplePdoWrapper::fetchAll($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : false | array
    - public SimplePdoWrapper::executeStatement($query) : false | int
    - public static SimplePdoWrapper::addWhereSubStmt($stmt, array &$markers, $whereConds) : void
    - protected SimplePdoWrapper::boot() : [PDO](https://www.php.net/manual/en/class.pdo.php) | null
    - protected SimplePdoWrapper::storeQueryObject($queryObject) : void
    - protected static SimplePdoWrapper::addAssignmentListSubStmt($stmt, array &$markers, array $fields, ?$firstForm = false) : void

}




Properties
=============

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    
    See our [Light_Database conception notes options](https://github.com/lingtalfi/Light_Database/blob/master/doc/pages/conception-notes.md#service-options) for more details.
    
    

- <span id="property-_mysqlInfoUtil"><b>_mysqlInfoUtil</b></span>

    This property holds the _mysqlInfoUtil for this instance.
    
    

- <span id="property-pdoException"><b>pdoException</b></span>

    This property holds the pdoException thrown during the connection,
    or null if such exception was not thrown.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-defaultFetchStyle"><b>defaultFetchStyle</b></span>

    This property holds the default fetch style value for the fetch and fetchAll methods.
    
    

- <span id="property-connexion"><b>connexion</b></span>

    This property holds the \PDO instance.
    
    

- <span id="property-query"><b>query</b></span>

    This property holds the last query executed.
    Note: the concrete class is responsible for updating this value.
    
    



Methods
==============

- [LightDatabaseService::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/__construct.md) &ndash; Builds the LightDatabaseService instance.
- [LightDatabaseService::setOptions](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/setOptions.md) &ndash; Sets the options.
- [LightDatabaseService::getMysqlInfoUtil](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/getMysqlInfoUtil.md) &ndash; Returns a configured MysqlInfoUtil instance.
- [LightDatabaseService::onExceptionCaught](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/onExceptionCaught.md) &ndash; Embellishes the error message in SimplePdoWrapperQueryException exceptions.
- [LightDatabaseService::queryLog](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/queryLog.md) &ndash; Hook for children classes.
- [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md) &ndash; Creates the pdo instance and attaches it to this instance.
- [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md) &ndash; init method.
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
Previous class: [LightDatabasePlanetInstaller](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Light_PlanetInstaller/LightDatabasePlanetInstaller.md)<br>Next class: [LightDatabaseTrait](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Traits/LightDatabaseTrait.md)<br>
