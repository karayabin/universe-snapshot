[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)



The It42021MysqlInfoUtil class
================
2021-12-01 --> 2022-01-20






Introduction
============

The It42021MysqlInfoUtil class.



Class synopsis
==============


class <span class="pl-k">It42021MysqlInfoUtil</span> extends [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)  {

- Properties
    - private [Ling\Light_It4Tools\Service\LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) [$it4ToolService](#property-it4ToolService) ;
    - private string [$dbKeysRootDir](#property-dbKeysRootDir) ;

- Inherited properties
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [MysqlInfoUtil::$wrapper](#property-wrapper) ;
    - protected array [MysqlInfoUtil::$defaultHasKeywords](#property-defaultHasKeywords) ;
    - protected array [MysqlInfoUtil::$defaultHandleLabels](#property-defaultHandleLabels) ;

- Methods
    - public [setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setDbKeysRootDir.md)(string $dbKeysRootDir) : void
    - public [setIt4ToolService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setIt4ToolService.md)([Ling\Light_It4Tools\Service\LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) $service) : void
    - public [getForeignKeysInfo](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getForeignKeysInfo.md)(string $table) : array
    - public [getHasItems](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/getHasItems.md)(string $table, ?array $options = []) : array

- Inherited methods
    - public MysqlInfoUtil::__construct(?[Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper = null) : void
    - public MysqlInfoUtil::setWrapper([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $wrapper) : void
    - public MysqlInfoUtil::changeDatabase(string $database) : void
    - public MysqlInfoUtil::getDatabase() : string
    - public MysqlInfoUtil::getDatabases(?bool $filterMysql = true) : array
    - public MysqlInfoUtil::getTables(?string $prefix = null) : array
    - public MysqlInfoUtil::getPotentialTablePrefixes() : array
    - public MysqlInfoUtil::hasTable(string $table) : bool
    - public MysqlInfoUtil::getColumnNames(string $table) : array
    - public MysqlInfoUtil::getEngine(string $table) : string
    - public MysqlInfoUtil::getCreateStatement(string $table) : string
    - public MysqlInfoUtil::getPrimaryKey(string $table, ?bool $returnAllIfEmpty = false, ?bool &$hasPrimaryKey = true) : array
    - public MysqlInfoUtil::getRic(string $table, ?bool $useStrictRic = false) : array
    - public MysqlInfoUtil::getUniqueIndexColumnsOnly(string $table) : array
    - public MysqlInfoUtil::getUniqueIndexes(string $table) : array
    - public MysqlInfoUtil::getUniqueIndexesDetails(string $table) : array
    - public MysqlInfoUtil::getIndexesDetails(string $table, ?array $options = []) : array
    - public MysqlInfoUtil::getColumnTypes(string $table, ?bool $precision = false) : array
    - public MysqlInfoUtil::getColumnNullabilities($table) : array
    - public MysqlInfoUtil::getAutoIncrementedKey(string $table) : false | string
    - public MysqlInfoUtil::getReverseForeignKeyMap(?array $databases = null, ?array $options = []) : array
    - public MysqlInfoUtil::getReferencedByTables(string $table, ?array $databases = null) : array
    - public MysqlInfoUtil::isHasTable(string $table, ?array $options = []) : bool
    - public MysqlInfoUtil::isManyToManyTable(string $table) : bool
    - protected MysqlInfoUtil::dQuoteTable(string $table) : string
    - protected MysqlInfoUtil::splitTableName(string $table) : array

}




Properties
=============

- <span id="property-it4ToolService"><b>it4ToolService</b></span>

    This property holds the it4ToolService for this instance.
    
    

- <span id="property-dbKeysRootDir"><b>dbKeysRootDir</b></span>

    The root dir of the dbKeys system of this planet.
    
    

- <span id="property-wrapper"><b>wrapper</b></span>

    This property holds the wrapper for this instance.
    
    

- <span id="property-defaultHasKeywords"><b>defaultHasKeywords</b></span>

    This property holds the defaultHasKeywords for this instance.
    
    

- <span id="property-defaultHandleLabels"><b>defaultHandleLabels</b></span>

    This property holds the defaultHandleLabels for this instance.
    
    



Methods
==============

- [It42021MysqlInfoUtil::setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setDbKeysRootDir.md) &ndash; Sets the dbKeysRootDir.
- [It42021MysqlInfoUtil::setIt4ToolService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil/setIt4ToolService.md) &ndash; 
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
- MysqlInfoUtil::dQuoteTable &ndash; Returns the double quote protected full version of the given table.
- MysqlInfoUtil::splitTableName &ndash; or just be a single table name.





Location
=============
Ling\Light_It4Tools\SimplePdoWrapper\Util\It42021MysqlInfoUtil<br>
See the source code of [Ling\Light_It4Tools\SimplePdoWrapper\Util\It42021MysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/SimplePdoWrapper/Util/It42021MysqlInfoUtil.php)



SeeAlso
==============
Previous class: [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md)<br>
