[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The SimplePdoWrapper class
================
2019-07-22 --> 2021-08-05






Introduction
============

The SimplePdoWrapper is a base class implementing the non-driver-specific methods of the SimplePdoWrapperInterface interface.



Class synopsis
==============


class <span class="pl-k">SimplePdoWrapper</span> implements [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) {

- Properties
    - protected static int [$defaultFetchStyle](#property-defaultFetchStyle) = 2 ;
    - protected [\PDO](https://www.php.net/manual/en/class.pdo.php)|null [$connexion](#property-connexion) ;
    - protected string [$query](#property-query) ;
    - private [\PDO](https://www.php.net/manual/en/class.pdo.php)|[\PDOStatement](https://www.php.net/manual/en/class.pdostatement.php) [$queryObject](#property-queryObject) ;
    - private bool [$transactionActive](#property-transactionActive) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/__construct.md)() : void
    - public [setConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/setConnexion.md)(PDO $connexion) : void
    - public [getConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getConnexion.md)() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - public [setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/setErrorMode.md)($errorMode) : mixed
    - public [getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getError.md)() : null | array
    - public [transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/transaction.md)(callable $transactionCallback, ?Exception &$e = null) : bool
    - public [insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/insert.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/replace.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - public [update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/update.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - public [delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/delete.md)($table, ?$whereConds = null, ?$markers = []) : mixed
    - public [fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : array | string | false
    - public [fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : array
    - public [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/executeStatement.md)($query) : false | int
    - public static [addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addWhereSubStmt.md)(&$stmt, array &$markers, $whereConds, ?array $options = []) : void
    - protected [boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/boot.md)() : [PDO](https://www.php.net/manual/en/class.pdo.php) | null
    - protected [storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/storeQueryObject.md)($queryObject) : void
    - protected [onSuccess](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/onSuccess.md)(string $type, string $table, string $query, array $arguments, ?$return = true) : void
    - protected static [addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addAssignmentListSubStmt.md)(&$stmt, array &$markers, array $fields, ?$firstForm = false) : void
    - protected [queryLog](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/queryLog.md)(string $type, ...$args) : void
    - private [handleException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/handleException.md)(Exception $e, ?array $markers = []) : void

}




Properties
=============

- <span id="property-defaultFetchStyle"><b>defaultFetchStyle</b></span>

    This property holds the default fetch style value for the fetch and fetchAll methods.
    
    

- <span id="property-connexion"><b>connexion</b></span>

    This property holds the \PDO instance.
    
    

- <span id="property-query"><b>query</b></span>

    This property holds the last query executed.
    Note: the concrete class is responsible for updating this value.
    
    

- <span id="property-queryObject"><b>queryObject</b></span>

    This property holds the queryObject, which is used to return the error info to the user when
    a "query method" (see class description) is executed.
    
    

- <span id="property-transactionActive"><b>transactionActive</b></span>

    This property holds whether a transaction is active for this instance.
    
    



Methods
==============

- [SimplePdoWrapper::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/__construct.md) &ndash; Builds the concrete instance.
- [SimplePdoWrapper::setConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/setConnexion.md) &ndash; Sets the pdo connexion.
- [SimplePdoWrapper::getConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getConnexion.md) &ndash; Returns the current pdo connexion.
- [SimplePdoWrapper::setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/setErrorMode.md) &ndash; Sets the error mode.
- [SimplePdoWrapper::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/getError.md) &ndash; Returns the error info of the last statement executed, or null if there was no error.
- [SimplePdoWrapper::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/transaction.md) &ndash; Executes a transaction, and returns whether it was successful.
- [SimplePdoWrapper::insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/insert.md) &ndash; Executes the insert statement and returns the lastInsertId.
- [SimplePdoWrapper::replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/replace.md) &ndash; Executes the replace statement and returns the lastInsertId.
- [SimplePdoWrapper::update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/update.md) &ndash; Executes the update statement and returns whether the statement was executed successfully.
- [SimplePdoWrapper::delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/delete.md) &ndash; Executes the delete statement and returns the number of deleted rows.
- [SimplePdoWrapper::fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetch.md) &ndash; Executes the prepared statement and returns the fetched row, or false in case of failure.
- [SimplePdoWrapper::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/fetchAll.md) &ndash; Executes the prepared statement and return an array containing all of the result set rows.
- [SimplePdoWrapper::executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/executeStatement.md) &ndash; Executes an SQL statement and returns the number of affected rows.
- [SimplePdoWrapper::addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addWhereSubStmt.md) &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
- [SimplePdoWrapper::boot](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/boot.md) &ndash; You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).
- [SimplePdoWrapper::storeQueryObject](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/storeQueryObject.md) &ndash; Stores the query object so that we can get the errors out of it.
- [SimplePdoWrapper::onSuccess](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/onSuccess.md) &ndash; A hook for other classes to use.
- [SimplePdoWrapper::addAssignmentListSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addAssignmentListSubStmt.md) &ndash; for INSERT or UPDATE like statements.
- [SimplePdoWrapper::queryLog](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/queryLog.md) &ndash; Hook for children classes.
- [SimplePdoWrapper::handleException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/handleException.md) &ndash; Will rethrow a custom exception based on the one given.





Location
=============
Ling\SimplePdoWrapper\SimplePdoWrapper<br>
See the source code of [Ling\SimplePdoWrapper\SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapper.php)



SeeAlso
==============
Previous class: [FetchAllComponentsHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Helper/FetchAllComponentsHelper.md)<br>Next class: [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md)<br>
