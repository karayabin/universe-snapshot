Ling/SimplePdoWrapper
================
2019-07-22 --> 2021-08-05




Table of contents
===========

- [InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/InvalidTableNameException.md) &ndash; The InvalidTableNameException class is thrown when a syntax error occurs with the table name.
- [MysqlInfoUtilException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/MysqlInfoUtilException.md) &ndash; The MysqlInfoUtilException class.
- [NoPdoConnectionException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/NoPdoConnectionException.md) &ndash; a connection (php PDO object) to work with.
- [SimplePdoWrapperException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperException.md) &ndash; The SimplePdoWrapperException class is the base exception class for all SimplePdoWrapper exceptions.
- [SimplePdoWrapperQueryException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException.md) &ndash; The SimplePdoWrapperQueryException class.
    - [SimplePdoWrapperQueryException::getQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getQuery.md) &ndash; Returns the query of this instance.
    - [SimplePdoWrapperQueryException::setQuery](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setQuery.md) &ndash; Sets the query.
    - [SimplePdoWrapperQueryException::setMessage](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMessage.md) &ndash; Sets the message for this exception.
    - [SimplePdoWrapperQueryException::getMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/getMarkers.md) &ndash; Returns the markers of this instance.
    - [SimplePdoWrapperQueryException::setMarkers](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/SimplePdoWrapperQueryException/setMarkers.md) &ndash; Sets the markers.
- [FetchAllComponentsHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Helper/FetchAllComponentsHelper.md) &ndash; The FetchAllComponentsHelper class.
    - [FetchAllComponentsHelper::mergeWhereByComponents](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Helper/FetchAllComponentsHelper/mergeWhereByComponents.md) &ndash; Parses the given components array, and if one of them is a Where component, merges it with the given Where instance.
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
    - [SimplePdoWrapper::addWhereSubStmt](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapper/addWhereSubStmt.md) &ndash; defined in the comments of the SimplePdoWrapperInterface->update method.
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
- [Columns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns.md) &ndash; The Columns class.
    - [Columns::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/__construct.md) &ndash; Builds the Columns instance.
    - [Columns::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/inst.md) &ndash; Creates a new instance and returns it.
    - [Columns::set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/set.md) &ndash; Sets the columns, and returns itself for chaining.
    - [Columns::singleColumn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/singleColumn.md) &ndash; Sets the mode to singleColumn, and returns itself for chaining.
    - [Columns::getColumns](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getColumns.md) &ndash; Returns the columns of this instance.
    - [Columns::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/apply.md) &ndash; Appends the relevant sql to the given query, and returns itself for chaining.
    - [Columns::getMode](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Columns/getMode.md) &ndash; Returns the mode of this instance.
- [Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit.md) &ndash; The Limit class.
    - [Limit::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/__construct.md) &ndash; Builds the Limit instance.
    - [Limit::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/inst.md) &ndash; Creates a new instance and returns it.
    - [Limit::set](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/set.md) &ndash; Sets the offset and rowcount, and returns itself for chaining.
    - [Limit::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/apply.md) &ndash; Appends the relevant sql to the given query.
    - [Limit::getOffset](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getOffset.md) &ndash; Returns the offset of this instance.
    - [Limit::getRowCount](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit/getRowCount.md) &ndash; Returns the rowCount of this instance.
- [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md) &ndash; The MysqlInfoUtil class.
    - [MysqlInfoUtil::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/__construct.md) &ndash; Builds the MysqlInfoUtil instance.
    - [MysqlInfoUtil::setWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/setWrapper.md) &ndash; Sets the wrapper.
    - [MysqlInfoUtil::changeDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/changeDatabase.md) &ndash; Changes the current database.
    - [MysqlInfoUtil::getDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabase.md) &ndash; Returns the name of the current database.
    - [MysqlInfoUtil::getDatabases](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabases.md) &ndash; Returns the array of databases.
    - [MysqlInfoUtil::getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md) &ndash; Returns the tables of the current database.
    - [MysqlInfoUtil::getPotentialTablePrefixes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPotentialTablePrefixes.md) &ndash; Returns an array containing the potential table prefixes.
    - [MysqlInfoUtil::hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md) &ndash; Returns whether the current database contains the given table.
    - [MysqlInfoUtil::getColumnNames](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnNames.md) &ndash; Get the columns for the given table of the current database.
    - [MysqlInfoUtil::getEngine](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getEngine.md) &ndash; Returns the engine used for the given table.
    - [MysqlInfoUtil::getCreateStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getCreateStatement.md) &ndash; Returns the create statement for the given table.
    - [MysqlInfoUtil::getPrimaryKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPrimaryKey.md) &ndash; Returns the array of columns composing the primary key.
    - [MysqlInfoUtil::getRic](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getRic.md) &ndash; Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array for the given table.
    - [MysqlInfoUtil::getUniqueIndexColumnsOnly](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexColumnsOnly.md) &ndash; Returns an array containing the name of all columns that are part of an unique index.
    - [MysqlInfoUtil::getUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexes.md) &ndash; Returns the array of unique indexes for the given table.
    - [MysqlInfoUtil::getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md) &ndash; Returns an information array about the unique indexes of the given table.
    - [MysqlInfoUtil::getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getIndexesDetails.md) &ndash; Returns an information array about the regular indexes (i.e.
    - [MysqlInfoUtil::getColumnTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnTypes.md) &ndash; Returns an array of columnName => type.
    - [MysqlInfoUtil::getColumnNullabilities](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnNullabilities.md) &ndash; Returns an array of columnName => isNullable (a boolean).
    - [MysqlInfoUtil::getAutoIncrementedKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getAutoIncrementedKey.md) &ndash; Returns the name of the auto-incremented field, or false if there is none.
    - [MysqlInfoUtil::getForeignKeysInfo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getForeignKeysInfo.md) &ndash; Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.
    - [MysqlInfoUtil::getReverseForeignKeyMap](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReverseForeignKeyMap.md) &ndash; Returns an array of tableId  => referencedByTableIds for the given databases.
    - [MysqlInfoUtil::getReferencedByTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReferencedByTables.md) &ndash; Returns the array of tables having a foreign key referencing the given table.
    - [MysqlInfoUtil::getHasItems](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getHasItems.md) &ndash; Returns an array of "has items".
    - [MysqlInfoUtil::isHasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isHasTable.md) &ndash; Returns whether the given table is a **has** table, based on the table name.
    - [MysqlInfoUtil::isManyToManyTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isManyToManyTable.md) &ndash; Returns whether the given table is considered a manyToMany table.
- [OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy.md) &ndash; The OrderBy class.
    - [OrderBy::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/__construct.md) &ndash; Builds the OrderBy instance.
    - [OrderBy::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/inst.md) &ndash; Creates a new instance and returns it.
    - [OrderBy::add](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/add.md) &ndash; Adds a column/direction info to this instance, and returns itself for chaining.
    - [OrderBy::addExpression](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/addExpression.md) &ndash; Adds an orderBy expression, and returns itself for chaining.
    - [OrderBy::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/apply.md) &ndash; Appends the relevant sql to the given query.
    - [OrderBy::getColDirs](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy/getColDirs.md) &ndash; Returns the colDirs of this instance.
- [RicHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper.md) &ndash; The RicHelper class.
    - [RicHelper::getWhereByRics](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getWhereByRics.md) &ndash; Returns the where part of an sql query (where keyword excluded) based on the given rics.
    - [RicHelper::getRicByPkAndColumnsAndUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/RicHelper/getRicByPkAndColumnsAndUniqueIndexes.md) &ndash; Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array from the given arguments.
- [SimplePdoGenericHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimplePdoGenericHelper.md) &ndash; The SimplePdoGenericHelper class.
    - [SimplePdoGenericHelper::getUniqueIdentifier](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimplePdoGenericHelper/getUniqueIdentifier.md) &ndash; Returns a unique identifier.
- [SimplePdoSpecialExpressionHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimplePdoSpecialExpressionHelper.md) &ndash; The SimplePdoSpecialExpressionHelper class.
    - [SimplePdoSpecialExpressionHelper::unserializeGroupConcatSeparator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimplePdoSpecialExpressionHelper/unserializeGroupConcatSeparator.md) &ndash; Returns the unserialized version of the given serialized string.
- [SimpleTypeHelper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper.md) &ndash; The SimpleTypeHelper class.
    - [SimpleTypeHelper::getSimpleTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/SimpleTypeHelper/getSimpleTypes.md) &ndash; Returns an array of column name => simple type from the given sql types.
- [Where](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md) &ndash; The Where class.
    - [Where::__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/__construct.md) &ndash; Builds the Where instance.
    - [Where::inst](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/inst.md) &ndash; Creates a new instance and returns it.
    - [Where::key](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/key.md) &ndash; Sets the current key and return this instance for chaining.
    - [Where::merge](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/merge.md) &ndash; Merges the given Where component into the current one.
    - [Where::equals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/equals.md) &ndash; Proxy to the operator method, with a predefined operator of "=".
    - [Where::greaterThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThan.md) &ndash; Proxy to the operator method, with a predefined operator of ">".
    - [Where::greaterThanOrEqualTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/greaterThanOrEqualTo.md) &ndash; Proxy to the operator method, with a predefined operator of ">=".
    - [Where::lessThan](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThan.md) &ndash; Proxy to the operator method, with a predefined operator of "<".
    - [Where::lessThanOrEqualsTo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/lessThanOrEqualsTo.md) &ndash; Proxy to the operator method, with a predefined operator of "<=".
    - [Where::notEquals](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEquals.md) &ndash; Proxy to the operator method, with a predefined operator of "!=".
    - [Where::likeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likeStrict.md) &ndash; Proxy to the operator method, with a predefined operator of "like".
    - [Where::like](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/like.md) &ndash; Proxy to the operator method, with a predefined operator of "%like%".
    - [Where::contains](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/contains.md) &ndash; Alias of the like method.
    - [Where::likePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePre.md) &ndash; Proxy to the operator method, with a predefined operator of "%like".
    - [Where::endsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/endsWith.md) &ndash; Alias of the likePre method.
    - [Where::likePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/likePost.md) &ndash; Proxy to the operator method, with a predefined operator of "like%".
    - [Where::startsWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/startsWith.md) &ndash; Alias of the likePost method.
    - [Where::notLikeStrict](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikeStrict.md) &ndash; Proxy to the operator method, with a predefined operator of "not_like".
    - [Where::notLike](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLike.md) &ndash; Proxy to the operator method, with a predefined operator of "%not_like%".
    - [Where::notContaining](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notContaining.md) &ndash; Alias of the notLike method.
    - [Where::notLikePre](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePre.md) &ndash; Proxy to the operator method, with a predefined operator of "%not_like".
    - [Where::notEndingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notEndingWith.md) &ndash; Alias of the notLikePre method.
    - [Where::notLikePost](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notLikePost.md) &ndash; Proxy to the operator method, with a predefined operator of "not_like%".
    - [Where::notStartingWith](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notStartingWith.md) &ndash; Alias of the notLikePost method.
    - [Where::in](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/in.md) &ndash; Proxy to the operator method, with a predefined operator of "in".
    - [Where::notIn](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notIn.md) &ndash; Proxy to the operator method, with a predefined operator of "not_in".
    - [Where::between](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/between.md) &ndash; Proxy to the operator method, with a predefined operator of "between".
    - [Where::notBetween](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/notBetween.md) &ndash; Proxy to the operator method, with a predefined operator of "not_between".
    - [Where::isNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNull.md) &ndash; Proxy to the operator method, with a predefined operator of "null".
    - [Where::isNotNull](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/isNotNull.md) &ndash; Proxy to the operator method, with a predefined operator of "is_not_null".
    - [Where::operator](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/operator.md) &ndash; and returns this instance for chaining.
    - [Where::or](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/or.md) &ndash; Adds an "or" keyword in the query.
    - [Where::and](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/and.md) &ndash; Adds an "and" keyword in the query.
    - [Where::openingParenthesis](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/openingParenthesis.md) &ndash; Adds an opening parenthesis in the query.
    - [Where::op](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/op.md) &ndash; Alias for the openingParenthesis method.
    - [Where::closingParenthesis](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/closingParenthesis.md) &ndash; Adds a closing parenthesis in the query.
    - [Where::cp](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/cp.md) &ndash; Alias for the closingParenthesis method.
    - [Where::apply](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/apply.md) &ndash; and appends it to the given query, and update the given markers accordingly.
    - [Where::getConditions](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where/getConditions.md) &ndash; Returns the conditions list.


Dependencies
============
- [Bat](https://github.com/lingtalfi/Bat)


