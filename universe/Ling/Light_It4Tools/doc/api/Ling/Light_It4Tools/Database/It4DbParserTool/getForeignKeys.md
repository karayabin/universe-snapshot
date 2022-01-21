[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::getForeignKeys
================



It4DbParserTool::getForeignKeys — 




Description
================


public [It4DbParserTool::getForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getForeignKeys.md)(string $rootDir, string $table) : array




Returns an array of foreignKeyName => info, where info is an array:
- 0: the foreign key table
- 1: the foreign key field
- 2: a comment assigned to that foreign key, or null if no comment was there




Parameters
================


- rootDir

    

- table

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [It4DbParserTool::getForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L507-L516)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [getTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTables.md)<br>Next method: [getDatabaseService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getDatabaseService.md)<br>

