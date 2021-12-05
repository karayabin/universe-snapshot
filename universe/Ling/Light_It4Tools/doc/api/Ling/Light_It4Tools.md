Ling/Light_It4Tools
================
2021-12-01 --> 2021-12-05




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
- [LightIt4ToolsException](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Exception/LightIt4ToolsException.md) &ndash; The LightIt4ToolsException class.
- [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) &ndash; The LightIt4ToolsService class.
    - [LightIt4ToolsService::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/__construct.md) &ndash; Builds the LightIt4ToolsService instance.
    - [LightIt4ToolsService::setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setContainer.md) &ndash; Sets the container.
    - [LightIt4ToolsService::setOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setOptions.md) &ndash; Sets the options.
    - [LightIt4ToolsService::getOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOptions.md) &ndash; Returns the options of this instance.
    - [LightIt4ToolsService::getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOption.md) &ndash; Returns the option value corresponding to the given key.
    - [LightIt4ToolsService::getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md) &ndash; Returns the parser tool.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_Database](https://github.com/lingtalfi/Light_Database)


