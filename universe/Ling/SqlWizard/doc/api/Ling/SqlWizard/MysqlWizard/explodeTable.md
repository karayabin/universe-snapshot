[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::explodeTable
================



MysqlWizard::explodeTable — 




Description
================


private [MysqlWizard::explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/explodeTable.md)($fullTable) : array




Takes a fullTable identifier and returns an array containing two entries:
     - database_name         (unescaped)
     - table_name            (unescaped)




Parameters
================


- fullTable

    


Return values
================

Returns array.


Exceptions thrown
================

- [InvalidTableNameException](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Exception/InvalidTableNameException.md).&nbsp;

- [NoConnectionException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/NoConnectionException.md).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L586-L661)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [exec](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/exec.md)<br>

