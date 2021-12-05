[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getUniqueIndexes
================



MysqlWizard::getUniqueIndexes — Returns an array of index_name => indexes.




Description
================


public [MysqlWizard::getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md)($fullTable) : array




Returns an array of index_name => indexes.

With indexes: an array of column names ordered by ascending index sequence.




Parameters
================


- fullTable

    


Return values
================

Returns array.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L466-L486)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNullabilities.md)<br>Next method: [getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md)<br>

