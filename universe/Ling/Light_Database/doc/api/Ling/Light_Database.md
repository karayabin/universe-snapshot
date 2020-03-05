Ling/Light_Database
================
2019-07-22 --> 2020-03-03




Table of contents
===========

- [LightDatabaseEventHandlerInterface](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface.md) &ndash; The LightDatabaseEventHandlerInterface interface.
    - [LightDatabaseEventHandlerInterface::handle](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/EventHandler/LightDatabaseEventHandlerInterface/handle.md) &ndash; Reacts to the given event, which name and args are given.
- [LightDatabaseException](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Exception/LightDatabaseException.md) &ndash; The LightDatabaseException class.
- [LightDatabaseHelper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper.md) &ndash; The LightDatabaseHelper class.
    - [LightDatabaseHelper::getTablesByQuery](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper/getTablesByQuery.md) &ndash; Returns the array of tables used in the given sql query.
- [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) &ndash; The LightDatabasePdoWrapper class.
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
    - SimplePdoWrapper::setConnexion &ndash; Sets the pdo connexion.
    - SimplePdoWrapper::getConnexion &ndash; Returns the current pdo connexion.
    - SimplePdoWrapper::setErrorMode &ndash; Sets the error mode.
    - SimplePdoWrapper::getError &ndash; Returns the error info of the last statement executed, or null if there was no error.
    - SimplePdoWrapper::transaction &ndash; Executes a transaction, and returns whether it was successful.
    - SimplePdoWrapper::executeStatement &ndash; Executes an SQL statement and returns the number of affected rows.
    - SimplePdoWrapper::addWhereSubStmt &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
- [LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md) &ndash; The LightDatabaseService class.
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
    - SimplePdoWrapper::setConnexion &ndash; Sets the pdo connexion.
    - SimplePdoWrapper::getConnexion &ndash; Returns the current pdo connexion.
    - SimplePdoWrapper::setErrorMode &ndash; Sets the error mode.
    - SimplePdoWrapper::getError &ndash; Returns the error info of the last statement executed, or null if there was no error.
    - SimplePdoWrapper::transaction &ndash; Executes a transaction, and returns whether it was successful.
    - SimplePdoWrapper::executeStatement &ndash; Executes an SQL statement and returns the number of affected rows.
    - SimplePdoWrapper::addWhereSubStmt &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
- [LightDatabaseTrait](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Traits/LightDatabaseTrait.md) &ndash; The LightDatabaseTrait class


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_Events](https://github.com/lingtalfi/Light_Events)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


