[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::clusterize
================



It4DbParserTool::clusterize — Creates a sql file of type create.




Description
================


public [It4DbParserTool::clusterize](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/clusterize.md)(string $createDir, array $tables, string $dstFile, ?array &$notFound = []) : void




Creates a sql file of type create.
This file combines the create statements of each of the given table.
The createDir should be created using the exportStructureWithForeignKeys method.

The goal of this method is to provide a file for MySqlWorkBench to display as a schema.
In WorkBench, create a new model, then do File > Import > Reverse Engineer Mysql script...

The notFound array is filled with the table for which no create file was found.
Each entry is an array containing:
- 0: the table name
- 1: the createFile path




Parameters
================


- createDir

    

- tables

    

- dstFile

    

- notFound

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [It4DbParserTool::clusterize](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L464-L479)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [getPotentialNamespaces](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getPotentialNamespaces.md)<br>Next method: [getTables](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/getTables.md)<br>

