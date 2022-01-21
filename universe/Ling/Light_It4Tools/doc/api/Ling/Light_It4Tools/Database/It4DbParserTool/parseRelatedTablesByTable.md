[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::parseRelatedTablesByTable
================



It4DbParserTool::parseRelatedTablesByTable — Accumulates the tables related via a foreign key to the given table.




Description
================


private [It4DbParserTool::parseRelatedTablesByTable](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/parseRelatedTablesByTable.md)(string $foreignKeysDir, string $table, ?array &$alreadyKnownTables = [], ?array $noParseTables = []) : void




Accumulates the tables related via a foreign key to the given table.




Parameters
================


- foreignKeysDir

    

- table

    

- alreadyKnownTables

    

- noParseTables

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [It4DbParserTool::parseRelatedTablesByTable](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L547-L566)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [getDatabaseService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getDatabaseService.md)<br>Next method: [getForeignKeysDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeysDir.md)<br>

