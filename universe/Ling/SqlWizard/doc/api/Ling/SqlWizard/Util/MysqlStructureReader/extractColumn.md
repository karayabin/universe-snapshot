[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::extractColumn
================



MysqlStructureReader::extractColumn — or throws an exception if it doesn't find one.




Description
================


protected [MysqlStructureReader::extractColumn](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractColumn.md)(string $line) : string




Returns the value protected inside backticks from the given line,
or throws an exception if it doesn't find one.




Parameters
================


- line

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlStructureReader::extractColumn](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L484-L490)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [getDatabaseAndTableFromLine](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/getDatabaseAndTableFromLine.md)<br>Next method: [extractColumns](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractColumns.md)<br>

