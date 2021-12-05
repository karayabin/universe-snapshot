[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::getRelatedTablesByTables
================



It4DbParserTool::getRelatedTablesByTables — !! Warning, this function requires a call to the dispatchFkeys method first, otherwise it won't work.




Description
================


public [It4DbParserTool::getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getRelatedTablesByTables.md)(string $foreignKeysDir, array $tables, ?array $noParseTables = []) : array




!! Warning, this function requires a call to the dispatchFkeys method first, otherwise it won't work.


Returns an array of table names, composed of two sets.
The first set is the given table names.
The second set is the ensemble of table names which are related to the first set (usually by the means of a foreign key).

The two sets are merged together.


Use $noParseTables to pass well known tables with a lot of relationships,
but you don't want to show all the relationships. The noParseTable itself will be included,
but not its relationships.




Parameters
================


- foreignKeysDir

    

- tables

    

- noParseTables

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [It4DbParserTool::getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L391-L399)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/dispatchFkeys.md)<br>Next method: [getTablesByNamespace](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTablesByNamespace.md)<br>

