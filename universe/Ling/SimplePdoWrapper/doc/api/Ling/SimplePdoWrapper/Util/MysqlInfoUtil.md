[Back to the Ling/SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md)



The MysqlInfoUtil class
================
2019-07-22 --> 2022-01-20






Introduction
============

The MysqlInfoUtil class.
Inspired from my older [QuickPdoInfoTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.php).



Class synopsis
==============


class <span class="pl-k">MysqlInfoUtil</span>  {

- Properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [$wrapper](#property-wrapper) ;
    - protected array [$defaultHasKeywords](#property-defaultHasKeywords) ;
    - protected array [$defaultHandleLabels](#property-defaultHandleLabels) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/__construct.md)(?[Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper = null) : void
    - public [setWrapper](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/setWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper) : void
    - public [changeDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/changeDatabase.md)(string $database) : void
    - public [getDatabase](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabase.md)() : string
    - public [getDatabases](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getDatabases.md)(?bool $filterMysql = true) : array
    - public [getTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getTables.md)(?string $prefix = null) : array
    - public [getPotentialTablePrefixes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPotentialTablePrefixes.md)() : array
    - public [hasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/hasTable.md)(string $table) : bool
    - public [getColumnNames](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnNames.md)(string $table) : array
    - public [getEngine](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getEngine.md)(string $table) : string
    - public [getCreateStatement](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getCreateStatement.md)(string $table) : string
    - public [getPrimaryKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getPrimaryKey.md)(string $table, ?bool $returnAllIfEmpty = false, ?bool &$hasPrimaryKey = true) : array
    - public [getRic](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getRic.md)(string $table, ?bool $useStrictRic = false) : array
    - public [getUniqueIndexColumnsOnly](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexColumnsOnly.md)(string $table) : array
    - public [getUniqueIndexes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexes.md)(string $table) : array
    - public [getUniqueIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getUniqueIndexesDetails.md)(string $table) : array
    - public [getIndexesDetails](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getIndexesDetails.md)(string $table, ?array $options = []) : array
    - public [getColumnTypes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnTypes.md)(string $table, ?bool $precision = false) : array
    - public [getColumnNullabilities](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getColumnNullabilities.md)($table) : array
    - public [getAutoIncrementedKey](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getAutoIncrementedKey.md)(string $table) : false | string
    - public [getForeignKeysInfo](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getForeignKeysInfo.md)(string $table) : array
    - public [getReverseForeignKeyMap](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReverseForeignKeyMap.md)(?array $databases = null, ?array $options = []) : array
    - public [getReferencedByTables](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getReferencedByTables.md)(string $table, ?array $databases = null) : array
    - public [getHasItems](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getHasItems.md)(string $table, ?array $options = []) : array
    - public [isHasTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isHasTable.md)(string $table, ?array $options = []) : bool
    - public [isManyToManyTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/isManyToManyTable.md)(string $table) : bool
    - protected [dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md)(string $table) : string
    - protected [splitTableName](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/splitTableName.md)(string $table) : array
    - private [getNaturalHandle](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getNaturalHandle.md)(string $table, ?array $handleLabels = null) : string | false
    - private [error](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-wrapper"><b>wrapper</b></span>

    This property holds the wrapper for this instance.
    
    

- <span id="property-defaultHasKeywords"><b>defaultHasKeywords</b></span>

    This property holds the defaultHasKeywords for this instance.
    
    

- <span id="property-defaultHandleLabels"><b>defaultHandleLabels</b></span>

    This property holds the defaultHandleLabels for this instance.
    
    



Methods
==============

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
- [MysqlInfoUtil::dQuoteTable](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/dQuoteTable.md) &ndash; Returns the double quote protected full version of the given table.
- [MysqlInfoUtil::splitTableName](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/splitTableName.md) &ndash; or just be a single table name.
- [MysqlInfoUtil::getNaturalHandle](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/getNaturalHandle.md) &ndash; Returns the natural handle for the given table, based on the given handleLabels.
- [MysqlInfoUtil::error](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil/error.md) &ndash; Throws an exception.





Location
=============
Ling\SimplePdoWrapper\Util\MysqlInfoUtil<br>
See the source code of [Ling\SimplePdoWrapper\Util\MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/Util/MysqlInfoUtil.php)



SeeAlso
==============
Previous class: [Limit](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Limit.md)<br>Next class: [OrderBy](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/OrderBy.md)<br>
