[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getDatabases
================



MysqlWizard::getDatabases — Returns the list of database names in alphabetical order.




Description
================


public [MysqlWizard::getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getDatabases.md)(?$filterMysqlDb = true) : array




Returns the list of database names in alphabetical order.




Parameters
================


- filterMysqlDb

    


Return values
================

Returns array.


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L136-L157)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/setConnection.md)<br>Next method: [getTables](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getTables.md)<br>

