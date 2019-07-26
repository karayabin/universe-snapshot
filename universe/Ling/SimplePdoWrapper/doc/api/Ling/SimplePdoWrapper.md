Ling/SimplePdoWrapper
================
2019-07-22 --> 2019-07-22




Table of contents
===========

- [InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/InvalidTableNameException.md) &ndash; The InvalidTableNameException class is thrown when a syntax error occurs with the table name.
- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md) &ndash; a connection (php PDO object) to work with.
- [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md) &ndash; The SimplePdoWrapperException class is the base exception class for all SimplePdoWrapper exceptions.
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper.md) &ndash; The SimplePdoWrapper is a base class implementing the non-driver-specific methods of the SimplePdoWrapperInterface interface.
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
- [SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) &ndash; The SimplePdoWrapperInterface is the interface for all SimplePdoWrapper instances.
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
- [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) &ndash; The MysqlInfoUtil class.
    - [MysqlInfoUtil::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/__construct.md) &ndash; Builds the MysqlInfoUtil instance.
    - [MysqlInfoUtil::setWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/setWrapper.md) &ndash; Sets the wrapper.
    - [MysqlInfoUtil::changeDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/changeDatabase.md) &ndash; Changes the current database.
    - [MysqlInfoUtil::getDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabase.md) &ndash; Returns the name of the current database.
    - [MysqlInfoUtil::getDatabases](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabases.md) &ndash; Returns the array of databases.
    - [MysqlInfoUtil::getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md) &ndash; Returns the tables of the current database.
    - [MysqlInfoUtil::hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md) &ndash; Returns whether the current database contains the given table.




