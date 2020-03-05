[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::query
================



MysqlWizard::query — Calls the php \PDO's query method and returns the resulting \PDOStatement.




Description
================


protected [MysqlWizard::query](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/query.md)($query) : [PDOStatement](https://www.php.net/manual/en/class.pdostatement.php)




Calls the php \PDO's query method and returns the resulting \PDOStatement.




Parameters
================


- query

    


Return values
================

Returns [PDOStatement](https://www.php.net/manual/en/class.pdostatement.php).


Exceptions thrown
================

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;

- [PDOException](https://www.php.net/manual/en/class.pdoexception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::query](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L542-L548)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getCurrentDatabase](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getCurrentDatabase.md)<br>Next method: [exec](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/exec.md)<br>

