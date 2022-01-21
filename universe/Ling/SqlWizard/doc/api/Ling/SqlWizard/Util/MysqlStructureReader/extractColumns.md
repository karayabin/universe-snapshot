[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::extractColumns
================



MysqlStructureReader::extractColumns — or throws an exception if it doesn't find any.




Description
================


protected [MysqlStructureReader::extractColumns](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractColumns.md)(string $line) : array




Returns the values protected inside backticks from the given line,
or throws an exception if it doesn't find any.




Parameters
================


- line

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlStructureReader::extractColumns](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L502-L508)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [extractColumn](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractColumn.md)<br>Next method: [extractIndexInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractIndexInfo.md)<br>

