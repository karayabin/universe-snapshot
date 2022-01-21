[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\Util\MysqlStructureReader class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md)


MysqlStructureReader::extractOnDeleteUpdateInfo
================



MysqlStructureReader::extractOnDeleteUpdateInfo — - 0: onDelete (null|string), the keyword associated to the "ON DELETE" constraint.




Description
================


protected [MysqlStructureReader::extractOnDeleteUpdateInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractOnDeleteUpdateInfo.md)(string $s) : array




Returns an array containing the following:

- 0: onDelete (null|string), the keyword associated to the "ON DELETE" constraint.
- 1: onUpdate (null|string), the keyword associated to the "ON UPDATE" constraint.

For both keys, if it's a string, it's one of: RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT.


https://dev.mysql.com/doc/refman/8.0/en/create-table.html#create-table-options




Parameters
================


- s

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [MysqlStructureReader::extractOnDeleteUpdateInfo](https://github.com/lingtalfi/SqlWizard/blob/master/Util/MysqlStructureReader.php#L635-L651)


See Also
================

The [MysqlStructureReader](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader.md) class.

Previous method: [extractRegularColumnInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractRegularColumnInfo.md)<br>Next method: [extractEngine](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Util/MysqlStructureReader/extractEngine.md)<br>

