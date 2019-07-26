[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::setConnection
================



MysqlWizard::setConnection — Sets the connection instance (a php \PDO instance).




Description
================


public [MysqlWizard::setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/setConnection.md)([\PDO](https://www.php.net/manual/en/class.pdo.php) $connection) : void




Sets the connection instance (a php \PDO instance).

Important note: this class will always set the error mode to exception,
using the setAttribute method.



     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




Parameters
================


- connection

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [MysqlWizard::setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L106-L110)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [__construct](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/__construct.md)<br>Next method: [getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getDatabases.md)<br>

