[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)<br>
[Back to the Ling\SqlWizard\MysqlWizard class](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md)


MysqlWizard::getColumnDefaultApiValues
================



MysqlWizard::getColumnDefaultApiValues — Returns some default "api" values for the given $table.




Description
================


public [MysqlWizard::getColumnDefaultApiValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultApiValues.md)(string $fullTable, ?array $options = []) : array




Returns some default "api" values for the given $table.



By "api", I mean that the returned values are designed to be used as
default values in an orm system for instance.

This is based on my own experience and designed for my own needs, which means
not all mysql data types might be handled.


Those values are based on the mysql data type, using the following rules (in order):

- nullable -> null
- autoIncrement -> null
- str -> ""
- datetime -> (current datetime)
- date -> (current date)
- int types -> "0"
- decimal types -> "0.0" (this could be changed in the future if required)
- enum -> the first value of the enum



Available options are:

- omitAutoIncrement: bool=false. If true, the autoIncremented field (if exist) will not be in the returned array.




Parameters
================


- fullTable

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MysqlWizard::getColumnDefaultApiValues](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php#L331-L414)


See Also
================

The [MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard.md) class.

Previous method: [getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md)<br>Next method: [getColumnNames](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNames.md)<br>

