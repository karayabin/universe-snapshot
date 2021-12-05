[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::dispatchFkeys
================



It4DbParserTool::dispatchFkeys — Parses the reference foreign key files and creates one file per table which owns at least one foreign key.




Description
================


public [It4DbParserTool::dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/dispatchFkeys.md)(string $fkeysRefFile, string $dstDir) : void




Parses the reference foreign key files and creates one file per table which owns at least one foreign key.

Note: all table names must be composed solely of simple alphanumeric and underscore chars, otherwise
this method won't work as advertised. Same with column names.




Parameters
================


- fkeysRefFile

    

- dstDir

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [It4DbParserTool::dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L288-L366)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [exportStructureWithForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructureWithForeignKeys.md)<br>Next method: [getRelatedTablesByTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getRelatedTablesByTables.md)<br>

