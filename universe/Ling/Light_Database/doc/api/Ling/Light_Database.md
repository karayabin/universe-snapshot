Ling/Light_Database
================
2019-07-22 --> 2020-11-20




Table of contents
===========

- [LightDatabaseException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Exception/LightDatabaseException.md) &ndash; The LightDatabaseException class.
- [LightDatabaseHelper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper.md) &ndash; The LightDatabaseHelper class.
    - [LightDatabaseHelper::getTablesByQuery](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper/getTablesByQuery.md) &ndash; Returns the array of tables used in the given sql query.
- [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) &ndash; The LightDatabasePdoWrapper class.
    - [LightDatabasePdoWrapper::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/__construct.md) &ndash; Builds the LightDatabasePdoWrapper instance.
    - [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md) &ndash; Creates the pdo instance and attaches it to this instance.
    - [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md) &ndash; init method.
    - [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md) &ndash; Sets the container.
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
- [LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) &ndash; The LightDatabaseService class.
    - [LightDatabaseService::__construct](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/__construct.md) &ndash; Builds the LightDatabaseService instance.
    - [LightDatabaseService::setOptions](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/setOptions.md) &ndash; Sets the options.
    - [LightDatabaseService::getMysqlInfoUtil](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/getMysqlInfoUtil.md) &ndash; Returns a configured MysqlInfoUtil instance.
    - [LightDatabaseService::onExceptionCaught](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService/onExceptionCaught.md) &ndash; Embellishes the error message in SimplePdoWrapperQueryException exceptions.
    - [LightDatabasePdoWrapper::init](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/init.md) &ndash; Creates the pdo instance and attaches it to this instance.
    - [LightDatabasePdoWrapper::getConnectionException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/getConnectionException.md) &ndash; init method.
    - [LightDatabasePdoWrapper::setContainer](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper/setContainer.md) &ndash; Sets the container.
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
- [LightDatabaseTrait](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Traits/LightDatabaseTrait.md) &ndash; The LightDatabaseTrait class


Dependencies
============
- [CheapLogger](https://github.com/lingtalfi/CheapLogger)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [Light_Logger](https://github.com/lingtalfi/Light_Logger)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)
- [ArrayToString](https://github.com/lingtalfi/ArrayToString)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)


