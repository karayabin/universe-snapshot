[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Database\It4DbParserTool class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)


It4DbParserTool::recreateAll
================



It4DbParserTool::recreateAll — Will create a directory containing a lot of create files (a file which contains one or more create statements).




Description
================


public [It4DbParserTool::recreateAll](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/recreateAll.md)(string $foreignKeysFile, string $rootDir) : void




Will create a directory containing a lot of create files (a file which contains one or more create statements).
Create files can be viewed by tools such as dbSchema, to provide the user with visual diagrams.

To create this directory, you need to provide the foreignKeysFile first.


From there, the given rootDir will be created, and its structure will be the following:

- $rootDir/
----- opera_demoparis-fkeys-structure: a file containing the create statements necessary to recreate the demoparis database, using foreign keys when appropriate
----- opera_demoparis-structure.sql: a file containing the create statements necessary to recreate the demoparis database, without foreign keys (original design)
----- fkeys/: contains one .byml file per table, each file describes the foreign keys for a particular table
----- create/: contains all the create files
--------- single/: contains one file per table, each file containing the create statement for the table
--------- single-related/: contains one file per table, each file containing the create statements for the table plus all the related tables (related via foreign keys, recursively)
--------- namespaces/: contains one file per namespace (i.e. unique table prefix, the prefix being the first part of the table name before the first underscore),
                 each file containing the create statements for every table having the same namespace.
--------- namespaces-related/: contains one file per namespace (i.e. see above), each file contains the create statements for every table under that namespace, plus
                 all the related tables recursively (related via foreign keys)




Parameters
================


- foreignKeysFile

    

- rootDir

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [It4DbParserTool::recreateAll](https://github.com/lingtalfi/Light_It4Tools/blob/master/Database/It4DbParserTool.php#L90-L147)


See Also
================

The [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/setContainer.md)<br>Next method: [exportStructure](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool/exportStructure.md)<br>

