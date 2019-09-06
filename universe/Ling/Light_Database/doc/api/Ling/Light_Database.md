Ling/Light_Database
================
2019-07-22 --> 2019-08-14




Table of contents
===========

- [LightDatabaseException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Exception/LightDatabaseException.md) &ndash; The LightDatabaseException class.
- [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) &ndash; The LightDatabasePdoWrapper class.
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


Dependencies
============
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


