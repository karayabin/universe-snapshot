[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::extractRegularColumnInfo
================



MysqlStructureReader::extractRegularColumnInfo — Returns false if the line is not recognized as a column definition.




Description
================


protected [MysqlStructureReader::extractRegularColumnInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractRegularColumnInfo.md)(string $line) : array | false




Parse the given line and returns an array containing the following info:

- 0: column name
- 1: column type (including information in parenthesis if any), in lowercase
- 2: is null (bool)
- 3: is auto-incremented (bool)

Returns false if the line is not recognized as a column definition.




Parameters
================


- line

    


Return values
================

Returns array | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlStructureReader::extractRegularColumnInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L581-L615)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [extractIndexInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractIndexInfo.md)<br>Next method: [extractOnDeleteUpdateInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractOnDeleteUpdateInfo.md)<br>

