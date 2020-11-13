SqlWizard
=========
2019-02-04 -> 2020-09-14



The SqlWizard planet contains various tools to work with mysql databases.



The main goal of those tools is designed to help you creating any kind class generator
based on sql tables.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SqlWizard
```

Or just download it and place it where you want otherwise.




Summary
=======

- [SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [MysqlStructureReader example](https://github.com/lingtalfi/SqlWizard/blob/master/doc/pages/mysql-structure-reader-example.md)




History Log
------------------

- 1.13.3 -- 2020-09-14

    - add MysqlSelectQueryParser.combineWhere method
    
- 1.13.2 -- 2020-09-11

    - add MysqlSelectQueryParser.recompileParts method
    
- 1.13.1 -- 2020-09-11

    - add MysqlSelectQueryParser.getFromInfo method
    
- 1.12.0 -- 2020-09-11

    - add MysqlSelectQueryParser class
    
- 1.11.0 -- 2020-07-07

    - update MysqlStructureReader->readFile, throws an exception if the file doesn't exist
    
- 1.10.0 -- 2020-06-16

    - add SqlWizardGeneralTool::decorateStatement and statementDisableFkChecksUqChecks methods
    
- 1.9.0 -- 2020-06-12

    - update MysqlStructureReader->readContent fkeyDetails to accept foreign keys with multiple columns and or referenced columns
    
- 1.8.2 -- 2020-06-11

    - fix MysqlStructureReader->readContent indexes returning only the last index info
    
- 1.8.1 -- 2020-06-11

    - fix MysqlStructureReader->readContent uindDetails returning only the last index info
    
- 1.8.0 -- 2020-06-11

    - fix MysqlStructureReader->readContent and getCreateStatementsFromContent parsing double dash comments
    
- 1.7.0 -- 2020-06-09

    - add MysqlStructureReader->getCreateStatementsFromContent method
    
- 1.6.0 -- 2020-06-09

    - update MysqlStructureReader->readContent, now returns uindDetails, indexes, fkeyDetails and engine information 
    
- 1.5.0 -- 2020-02-28

    - add SqlWizardGeneralTool class
    
- 1.4.0 -- 2020-02-13

    - update MysqlStructureReader::readerArrayToTableInfo method, now returns the referencedByTables and hasItems properties
    
- 1.3.0 -- 2020-02-03

    - add MysqlStructureReader::readerArrayToTableInfo method
    
- 1.2.2 -- 2020-01-31

    - fix MysqlStructureReader->readContent's docTool definition in the comment
    
- 1.2.1 -- 2020-01-31

    - fix link in README.md
    
- 1.2.0 -- 2020-01-31

    - add MysqlStructureReader util
    
- 1.1.0 -- 2019-07-23

    - add MysqlSerializeTool
    
- 1.0.0 -- 2019-02-04

    - initial commit