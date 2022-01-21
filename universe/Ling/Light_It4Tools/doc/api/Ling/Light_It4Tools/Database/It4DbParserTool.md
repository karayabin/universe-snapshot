[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)



The It4DbParserTool class
================
2021-12-01 --> 2022-01-20






Introduction
============

The It4DbParserTool class.



Class synopsis
==============


class <span class="pl-k">It4DbParserTool</span>  {

- Properties
    - private [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - private string|null [$dbName](#property-dbName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/__construct.md)() : void
    - public [setDbName](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/setDbName.md)(string $dbName) : void
    - public [setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [recreateAll](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/recreateAll.md)(string $foreignKeysFile, string $rootDir) : void
    - public [exportStructure](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructure.md)(string $f) : void
    - public [exportStructureWithForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructureWithForeignKeys.md)(string $referenceForeignKeysDir, ?array $params = []) : void
    - public [dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/dispatchFkeys.md)(string $fkeysRefFile, string $dstDir) : void
    - public [getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getRelatedTablesByTables.md)(string $foreignKeysDir, array $tables, ?array $noParseTables = []) : array
    - public [getTablesByNamespace](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTablesByNamespace.md)(string $namespace) : array
    - public [getPotentialNamespaces](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getPotentialNamespaces.md)() : array
    - public [clusterize](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/clusterize.md)(string $createDir, array $tables, string $dstFile, ?array &$notFound = []) : void
    - public [getTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTables.md)() : array
    - public [getForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeys.md)(string $rootDir, string $table) : array
    - protected [getDatabaseService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getDatabaseService.md)() : [LightDatabaseService](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Service/LightDatabaseService.md)
    - private [parseRelatedTablesByTable](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/parseRelatedTablesByTable.md)(string $foreignKeysDir, string $table, ?array &$alreadyKnownTables = [], ?array $noParseTables = []) : void
    - private [getForeignKeysDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeysDir.md)(string $rootDir) : string

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-dbName"><b>dbName</b></span>

    The db name to use.
    If null, the current db will be used.
    
    



Methods
==============

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
- [It4DbParserTool::getForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeys.md) &ndash; 
- [It4DbParserTool::getDatabaseService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getDatabaseService.md) &ndash; Returns the light database service.
- [It4DbParserTool::parseRelatedTablesByTable](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/parseRelatedTablesByTable.md) &ndash; Accumulates the tables related via a foreign key to the given table.
- [It4DbParserTool::getForeignKeysDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeysDir.md) &ndash; Returns the foreign key dir.





Location
=============
Ling\Light_It4Tools\Database\It4DbParserTool<br>
See the source code of [Ling\Light_It4Tools\Database\It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php)



SeeAlso
==============
Next class: [LightIt4ToolsException](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Exception/LightIt4ToolsException.md)<br>
