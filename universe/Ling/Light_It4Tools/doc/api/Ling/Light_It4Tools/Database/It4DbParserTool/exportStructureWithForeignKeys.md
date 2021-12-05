[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::exportStructureWithForeignKeys
================



It4DbParserTool::exportStructureWithForeignKeys — Writes the database structure, using foreign keys, to a customizable output.




Description
================


public [It4DbParserTool::exportStructureWithForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructureWithForeignKeys.md)(string $referenceForeignKeysDir, ?array $params = []) : void




Writes the database structure, using foreign keys, to a customizable output.

The output can be chosen via the params.
Available params are:

- dstType: string(file|dir), whether to output the statements in one big file (file),
     or in a directory (dir), in which case one file is created under the given dir, and has the name of
     the table with the sql extension.

- dstValue: string, the path to the destination file or folder



$referenceForeignKeysDir is the reference foreign key file.
See the source code for more details.




Parameters
================


- referenceForeignKeysDir

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [It4DbParserTool::exportStructureWithForeignKeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L200-L276)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [exportStructure](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructure.md)<br>Next method: [dispatchFkeys](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/dispatchFkeys.md)<br>

