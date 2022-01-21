Ling/Light_It4Tools
================
2021-12-01 --> 2022-01-20




Table of contents
===========

- [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) &ndash; The It4DbParserTool class.
    - [It4DbParserTool::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/__construct.md) &ndash; Builds the It4DbParserTool instance.
    - [It4DbParserTool::setDbName](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/setDbName.md) &ndash; Sets the dbName.
    - [It4DbParserTool::setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/setContainer.md) &ndash; Sets the container.
    - [It4DbParserTool::recreateAll](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/recreateAll.md) &ndash; Will create a directory containing a lot of create files (a file which contains one or more create statements).
    - [It4DbParserTool::exportStructure](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructure.md) &ndash; Writes the database structure to the given file.
    - [It4DbParserTool::exportStructureWithForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructureWithForeignKeys.md) &ndash; Writes the database structure, using foreign keys, to a customizable output.
    - [It4DbParserTool::dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/dispatchFkeys.md) &ndash; Parses the reference foreign key files and creates one file per table which owns at least one foreign key.
    - [It4DbParserTool::getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getRelatedTablesByTables.md) &ndash; !! Warning, this function requires a call to the dispatchFkeys method first, otherwise it won't work.
    - [It4DbParserTool::getTablesByNamespace](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTablesByNamespace.md) &ndash; Returns the tables starting with the given namespace's prefix and followed by an underscore.
    - [It4DbParserTool::getPotentialNamespaces](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getPotentialNamespaces.md) &ndash; Returns the potential namespaces for the database.
    - [It4DbParserTool::clusterize](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/clusterize.md) &ndash; Creates a sql file of type create.
    - [It4DbParserTool::getTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTables.md) &ndash; Returns the available tables.
    - [It4DbParserTool::getForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeys.md) &ndash; The getForeignKeys method
- [LightIt4ToolsException](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Exception/LightIt4ToolsException.md) &ndash; The LightIt4ToolsException class.
- [It4FileParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/File/It4FileParserTool.md) &ndash; The It4FileParserTool class.
    - [It4FileParserTool::readTablesFromCreateFiles](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/File/It4FileParserTool/readTablesFromCreateFiles.md) &ndash; Returns the array of tables, based on the given root dir.
- [It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService.md) &ndash; The It42021LightDatabaseInfoService class.
    - [It42021LightDatabaseInfoService::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/__construct.md) &ndash; Builds the It42021LightDatabaseInfoService instance.
    - [It42021LightDatabaseInfoService::getDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/getDbKeysRootDir.md) &ndash; Returns the dbKeysRootDir of this instance.
    - [It42021LightDatabaseInfoService::setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/setDbKeysRootDir.md) &ndash; Sets the dbKeysRootDir.
    - LightDatabaseInfoService::getTableInfo &ndash; Returns the info array for the given table.
    - LightDatabaseInfoService::getTables &ndash; Returns the array of tables for the given database.
    - LightDatabaseInfoService::getTablesByPrefix &ndash; Returns the array of tables which prefix match the given prefix.
    - LightDatabaseInfoService::hasTable &ndash; Returns whether the given database contains the given table.
    - LightDatabaseInfoService::setCacheDir &ndash; Sets the cacheDir.
    - LightDatabaseInfoService::setContainer &ndash; Sets the container.
- [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) &ndash; The LightIt4ToolsService class.
    - [LightIt4ToolsService::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/__construct.md) &ndash; Builds the LightIt4ToolsService instance.
    - [LightIt4ToolsService::setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setContainer.md) &ndash; Sets the container.
    - [LightIt4ToolsService::setOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setOptions.md) &ndash; Sets the options.
    - [LightIt4ToolsService::getOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOptions.md) &ndash; Returns the options of this instance.
    - [LightIt4ToolsService::getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOption.md) &ndash; Returns the option value corresponding to the given key.
    - [LightIt4ToolsService::getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md) &ndash; Returns the parser tool.
    - [LightIt4ToolsService::getDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseInfoService.md) &ndash; Returns a database info service, prepared for it4 2021 structure (db schema without foreign keys).
- [It42021MysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil.md) &ndash; The It42021MysqlInfoUtil class.
    - [It42021MysqlInfoUtil::setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setDbKeysRootDir.md) &ndash; Sets the dbKeysRootDir.
    - [It42021MysqlInfoUtil::setIt4ToolService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setIt4ToolService.md) &ndash; The setIt4ToolService method
    - [It42021MysqlInfoUtil::getForeignKeysInfo](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getForeignKeysInfo.md) &ndash; Returns an array of  foreignKey => [ referencedDb, referencedTable, referencedColumn ] for the given table.
    - [It42021MysqlInfoUtil::getHasItems](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getHasItems.md) &ndash; Returns an array of "has items".
    - MysqlInfoUtil::__construct &ndash; Builds the MysqlInfoUtil instance.
    - MysqlInfoUtil::setWrapper &ndash; Sets the wrapper.
    - MysqlInfoUtil::changeDatabase &ndash; Changes the current database.
    - MysqlInfoUtil::getDatabase &ndash; Returns the name of the current database.
    - MysqlInfoUtil::getDatabases &ndash; Returns the array of databases.
    - MysqlInfoUtil::getTables &ndash; Returns the tables of the current database.
    - MysqlInfoUtil::getPotentialTablePrefixes &ndash; Returns an array containing the potential table prefixes.
    - MysqlInfoUtil::hasTable &ndash; Returns whether the current database contains the given table.
    - MysqlInfoUtil::getColumnNames &ndash; Get the columns for the given table of the current database.
    - MysqlInfoUtil::getEngine &ndash; Returns the engine used for the given table.
    - MysqlInfoUtil::getCreateStatement &ndash; Returns the create statement for the given table.
    - MysqlInfoUtil::getPrimaryKey &ndash; Returns the array of columns composing the primary key.
    - MysqlInfoUtil::getRic &ndash; Returns the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array for the given table.
    - MysqlInfoUtil::getUniqueIndexColumnsOnly &ndash; Returns an array containing the name of all columns that are part of an unique index.
    - MysqlInfoUtil::getUniqueIndexes &ndash; Returns the array of unique indexes for the given table.
    - MysqlInfoUtil::getUniqueIndexesDetails &ndash; Returns an information array about the unique indexes of the given table.
    - MysqlInfoUtil::getIndexesDetails &ndash; Returns an information array about the regular indexes (i.e.
    - MysqlInfoUtil::getColumnTypes &ndash; Returns an array of columnName => type.
    - MysqlInfoUtil::getColumnNullabilities &ndash; Returns an array of columnName => isNullable (a boolean).
    - MysqlInfoUtil::getAutoIncrementedKey &ndash; Returns the name of the auto-incremented field, or false if there is none.
    - MysqlInfoUtil::getReverseForeignKeyMap &ndash; Returns an array of tableId  => referencedByTableIds for the given databases.
    - MysqlInfoUtil::getReferencedByTables &ndash; Returns the array of tables having a foreign key referencing the given table.
    - MysqlInfoUtil::isHasTable &ndash; Returns whether the given table is a **has** table, based on the table name.
    - MysqlInfoUtil::isManyToManyTable &ndash; Returns whether the given table is considered a manyToMany table.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [DirScanner](https://github.com/lingtalfi/DirScanner)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_DatabaseInfo](https://github.com/lingtalfi/Light_DatabaseInfo)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


