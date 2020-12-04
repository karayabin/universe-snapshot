[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::extractIndexInfo
================



MysqlStructureReader::extractIndexInfo — or throws an exception if it doesn't find any.




Description
================


protected [MysqlStructureReader::extractIndexInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractIndexInfo.md)(string $line) : array




Returns the unique index information from the given line,
or throws an exception if it doesn't find any.

The returned array contains the following information:

- name: string, the name of the unique index
- keys: array, each item being an array:
     - colName: the name of the column
     - ascDesc: ASC|DESC|null, the direction keyword associated to this index key




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
See the source code for method [MysqlStructureReader::extractIndexInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L513-L548)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [extractColumns](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractColumns.md)<br>Next method: [extractRegularColumnInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractRegularColumnInfo.md)<br>

