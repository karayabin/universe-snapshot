Ling/SqlWizard
================
2019-07-23 --> 2020-02-28




Table of contents
===========

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md) &ndash; The NoConnectionException class.
- [SqlWizardException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/SqlWizardException.md) &ndash; The SqlWizardException class.
- [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) &ndash; The MysqlWizard class is a helper class to work with mysql databases.
    - [MysqlWizard::__construct](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/__construct.md) &ndash; Builds the MysqlWizard instance.
    - [MysqlWizard::setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/setConnection.md) &ndash; Sets the connection instance (a php \PDO instance).
    - [MysqlWizard::getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getDatabases.md) &ndash; Returns the list of database names in alphabetical order.
    - [MysqlWizard::getTables](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getTables.md) &ndash; Returns the list of table names in alphabetical order for the given database.
    - [MysqlWizard::getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getAutoIncrementedField.md) &ndash; Returns the name of the auto-incremented field, or false if there is none.
    - [MysqlWizard::getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md) &ndash; Returns an array of column_name => column_data_type.
    - [MysqlWizard::getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md) &ndash; Returns an array of column_name => default_value.
    - [MysqlWizard::getColumnNames](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNames.md) &ndash; Returns the list of column names for the given $table.
    - [MysqlWizard::getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNullabilities.md) &ndash; Returns an array of column_name => is_nullable.
    - [MysqlWizard::getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md) &ndash; Returns an array of index_name => indexes.
    - [MysqlWizard::getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md) &ndash; ).
    - [MysqlWizard::getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getPrimaryKey.md) &ndash; Returns the primary key of the given $table.
    - [MysqlWizard::getRic](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getRic.md) &ndash; Returns the ric for the given $table.
    - [MysqlWizard::getReferencedKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getReferencedKeysInfo.md) &ndash; Return an array of entries referencing the given $table.
- [MysqlSerializeTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool.md) &ndash; The MysqlSerializeTool class.
    - [MysqlSerializeTool::serialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/serialize.md) &ndash; Serializes the $keys found in the given array in place.
    - [MysqlSerializeTool::unserialize](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/MysqlSerializeTool/unserialize.md) &ndash; Un-serializes the $keys found in the given array in place.
- [SqlWizardGeneralTool](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool.md) &ndash; The SqlWizardGeneralTool class.
    - [SqlWizardGeneralTool::getTablePrefix](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/SqlWizardGeneralTool/getTablePrefix.md) &ndash; The getTablePrefix method
- [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) &ndash; The MysqlStructureReader class.
    - [MysqlStructureReader::readerArrayToTableInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readerArrayToTableInfo.md) &ndash; which structure is defined in the [Light_DatabaseInfo->getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) method.
    - [MysqlStructureReader::readFile](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readFile.md) &ndash; Same as the readContent method, but takes a file as argument.
    - [MysqlStructureReader::readContent](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readContent.md) &ndash; Reads the given content and returns an array containing **table info items**, each of which having the following structure.


Dependencies
============
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


