SqlWizard
=========
2019-02-04 -> 2022-01-20



The SqlWizard planet contains various tools to work with mysql databases.



The main goal of those tools is designed to help you creating any kind class generator
based on sql tables.




This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SqlWizard
```

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

- 1.13.22 -- 2022-01-20

    - add MysqlWizard->getColumnDefaultApiValues types: longtext, mediumtext, float, time
  
- 1.13.21 -- 2021-07-06

    - fix MysqlStructureReader->readContent, update regexes so that it handles whitespaces properly
  
- 1.13.20 -- 2021-07-02

    - fix MysqlStructureReader->readerArrayToTableInfo not handling when pk is null
  
- 1.13.19 -- 2021-07-02

    - add MysqlWizard->count method
  
- 1.13.18 -- 2021-07-02

    - add FullTableHelper class
  
- 1.13.17 -- 2021-06-29

    - update MysqlWizard->getColumnDefaultApiValues now includes autoIncremented field by default (changed again)
  
- 1.13.16 -- 2021-06-29

    - fix MysqlWizard->getColumnDefaultApiValues functional typo
  
- 1.13.15 -- 2021-06-29

    - update MysqlWizard->getColumnDefaultApiValues, add options now autoIncremented field is not returned by default
  
- 1.13.14 -- 2021-06-28

    - update MysqlWizard->getColumnDefaultApiValues now returns columns in natural order
  
- 1.13.13 -- 2021-06-28

    - fix MysqlStructureReader returning random db names
  
- 1.13.12 -- 2021-06-28

    - fix MysqlWizard->getColumnDefaultApiValues functional typo
  
- 1.13.11 -- 2021-06-28

    - update MysqlWizard->getColumnDefaultApiValues, autoIncremented fields now have null default value
  
- 1.13.10 -- 2021-06-28

    - add MysqlWizard->getColumnDefaultApiValues method
  
- 1.13.9 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.13.8 -- 2021-03-05

    - update README.md, add install alternative

- 1.13.7 -- 2021-01-22

    - add MysqlStructureReaderTool class
  
- 1.13.6 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.13.5 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.13.4 -- 2020-11-27

    - update MysqlStructureReader::readerArrayToTableInfo, now returns nullables property
    
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