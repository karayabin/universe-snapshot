[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The SimplePdoWrapperInterface class
================
2019-07-22 --> 2022-01-20






Introduction
============

The SimplePdoWrapperInterface is the interface for all SimplePdoWrapper instances.


It is composed of the following methods:

-------query methods:
- insert
- replace
- update
- delete
- fetchAll
- fetch
- executeStatement
- transaction

-------other methods:
- getConnection
- getError
- getQuery
- setErrorMode




Error handling
-----------------

All the methods in the "query methods" section (see structure above) behave the same when error handling is concerned:

- If the pdo connection is not defined, a NoPdoConnectionException is thrown.
- If the query fails, a native php **\PDOException** exception is thrown if the error mode is set to exception,
     or false is returned otherwise.
     In both cases, the error info array is accessible via the getError method.
- For all "query methods" using a table argument (insert, replace, update, delete), the table argument must be
     escaped properly by the caller (client).
     For instance, all possible values are possible table values:
         - my_table
         - `my_table`
         - my_db.my_table
         - `my_db`.`my_table`
         - my_db.`my.table`
         - ...



Class synopsis
==============


abstract class <span class="pl-k">SimplePdoWrapperInterface</span>  {

- Methods
    - abstract public [insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/insert.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - abstract public [replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/replace.md)($table, ?array $fields = [], ?array $options = []) : false | string
    - abstract public [update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/update.md)($table, array $fields, ?$whereConds = null, ?array $markers = []) : bool
    - abstract public [delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/delete.md)($table, ?$whereConds = null, ?$markers = []) : mixed
    - abstract public [fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetch.md)($query, ?array $markers = [], ?$fetchStyle = null) : array | string | false
    - abstract public [fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetchAll.md)($query, ?array $markers = [], ?$fetchStyle = null, ?$fetchArg = null, ?array $ctorArgs = []) : array
    - abstract public [executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/executeStatement.md)($query) : false | int
    - abstract public [transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/transaction.md)(callable $transactionCallback, ?Exception &$e = null) : bool
    - abstract public [setConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setConnexion.md)(PDO $connexion) : void
    - abstract public [getConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/getConnexion.md)() : [PDO](https://www.php.net/manual/en/class.pdo.php)
    - abstract public [setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setErrorMode.md)($errorMode) : mixed
    - abstract public [getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/getError.md)() : null | array

}






Methods
==============

- [SimplePdoWrapperInterface::insert](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/insert.md) &ndash; Executes the insert statement and returns the lastInsertId.
- [SimplePdoWrapperInterface::replace](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/replace.md) &ndash; Executes the replace statement and returns the lastInsertId.
- [SimplePdoWrapperInterface::update](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/update.md) &ndash; Executes the update statement and returns whether the statement was executed successfully.
- [SimplePdoWrapperInterface::delete](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/delete.md) &ndash; Executes the delete statement and returns the number of deleted rows.
- [SimplePdoWrapperInterface::fetch](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetch.md) &ndash; Executes the prepared statement and returns the fetched row, or false in case of failure.
- [SimplePdoWrapperInterface::fetchAll](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/fetchAll.md) &ndash; Executes the prepared statement and return an array containing all of the result set rows.
- [SimplePdoWrapperInterface::executeStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/executeStatement.md) &ndash; Executes an SQL statement and returns the number of affected rows.
- [SimplePdoWrapperInterface::transaction](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/transaction.md) &ndash; Executes a transaction, and returns whether it was successful.
- [SimplePdoWrapperInterface::setConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setConnexion.md) &ndash; Sets the pdo connexion.
- [SimplePdoWrapperInterface::getConnexion](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/getConnexion.md) &ndash; Returns the current pdo connexion.
- [SimplePdoWrapperInterface::setErrorMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/setErrorMode.md) &ndash; Sets the error mode.
- [SimplePdoWrapperInterface::getError](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface/getError.md) &ndash; Returns the error info of the last statement executed, or null if there was no error.





Location
=============
Ling\SimplePdoWrapper\SimplePdoWrapperInterface<br>
See the source code of [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/SimplePdoWrapperInterface.php)



SeeAlso
==============
Previous class: [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md)<br>Next class: [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md)<br>
