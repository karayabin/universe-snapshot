[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::getCreateStatementsFromContent
================



MysqlStructureReader::getCreateStatementsFromContent — Parse the given content and returns an array of tableName => createStatement.




Description
================


public [MysqlStructureReader::getCreateStatementsFromContent](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/getCreateStatementsFromContent.md)(string $content) : array




Parse the given content and returns an array of tableName => createStatement.
With:
     - tableName: string, the table name.
     - createStatement: string, the create statement for this table.




Parameters
================


- content

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlStructureReader::getCreateStatementsFromContent](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L409-L424)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [readContent](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/readContent.md)<br>Next method: [getDatabaseAndTableFromLine](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/getDatabaseAndTableFromLine.md)<br>

