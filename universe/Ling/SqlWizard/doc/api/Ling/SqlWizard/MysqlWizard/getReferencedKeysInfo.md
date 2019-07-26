[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getReferencedKeysInfo
================



MysqlWizard::getReferencedKeysInfo — Return an array of entries referencing the given $table.




Description
================


public [MysqlWizard::getReferencedKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getReferencedKeysInfo.md)(?$table) : array




Return an array of entries referencing the given $table.


Each entry has the following structure:
- referencing_schema: string, the referencing database
- referencing_table: string, the referencing table
- referencing_column: string, the referencing column
- referenced_schema: string, the referenced database
- referenced_table: string, the referenced table
- referenced_columns: array of referenced column => referencing column




Parameters
================


- table

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getReferencedKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L461-L506)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getRic](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getRic.md)<br>Next method: [getCurrentDatabase](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getCurrentDatabase.md)<br>

