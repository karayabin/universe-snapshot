SqlWizard
=========
2019-02-04 -> 2020-02-28



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