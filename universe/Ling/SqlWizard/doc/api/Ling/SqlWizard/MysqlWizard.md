[Back to the Ling/SqlWizard api](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard.md)



The MysqlWizard class
================
2019-07-23 --> 2022-01-20






Introduction
============

The MysqlWizard class is a helper class to work with mysql databases.

It provides various info about the tables, and was designed to serve as the helper tool of choice for creating
any kind of mysql based generator.



Definitions
==============



fullTable
--------------
The name of a table.
It can be either a simple table name if the database is obvious,
or a full name prefixed with the database if necessary.

You are responsible for quoting the table name if necessary (with backticks).

That's because we cannot guess if the table (or db) name contains semantic dots, and so we let you do that job.
(for instance, if the database name is "a", and the table name is "a.cor", then if you pass us the string "a.a.cor",
we wouldn't know which part represents the database and which part represents the table).



Examples:

- my_table
- `my_table`
- my_db.my_table
- `my_db`.`my_table`
- `my_db`.my_table
- my_db.`my_table`






ric
-----------

The row identifying columns.

An array of column names, representing the set of column identifying a any row uniquely.

Generally, this array equals the primary key array.
But if no primary key is defined, then the ric contains all the columns of the table.

Example:
In a table with an auto-incremented field named id which is also the primary key, the ric is the following array:

- 0: id



Class synopsis
==============


class <span class="pl-k">MysqlWizard</span>  {

- Properties
    - private [\PDO](https://www.php.net/manual/en/class.pdo.php) [$connection](#property-connection) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/__construct.md)() : void
    - public [setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/setConnection.md)(PDO $connection) : void
    - public [getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getDatabases.md)(?$filterMysqlDb = true) : array
    - public [getTables](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getTables.md)(?$db = null, ?$prefix = null) : array
    - public [count](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/count.md)(string $fullTable) : int
    - public [getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getAutoIncrementedField.md)($fullTable) : false | string
    - public [getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md)($fullTable, ?$precision = false) : array
    - public [getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md)($fullTable) : array
    - public [getColumnDefaultApiValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultApiValues.md)(string $fullTable, ?array $options = []) : array
    - public [getColumnNames](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNames.md)($fullTable) : array
    - public [getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNullabilities.md)($fullTable) : array
    - public [getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md)($fullTable) : array
    - public [getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md)($fullTable) : array
    - public [getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getPrimaryKey.md)($fullTable) : array | false
    - public [getRic](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getRic.md)($fullTable) : array | false
    - public [getReferencedKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getReferencedKeysInfo.md)($table) : array
    - protected [getCurrentDatabase](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getCurrentDatabase.md)() : string
    - protected [query](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/query.md)($query) : [PDOStatement](https://www.php.net/manual/en/class.pdostatement.php)
    - protected [exec](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/exec.md)($query) : mixed
    - private [explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/explodeTable.md)(string $fullTable) : array

}




Properties
=============

- <span id="property-connection"><b>connection</b></span>

    This property holds the connection (php's PDO instance) to the mysql database.
    
    Note: the error mode will always be set to exception.
    
    



Methods
==============

- [MysqlWizard::__construct](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/__construct.md) &ndash; Builds the MysqlWizard instance.
- [MysqlWizard::setConnection](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/setConnection.md) &ndash; Sets the connection instance (a php \PDO instance).
- [MysqlWizard::getDatabases](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getDatabases.md) &ndash; Returns the list of database names in alphabetical order.
- [MysqlWizard::getTables](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getTables.md) &ndash; Returns the list of table names in alphabetical order for the given database.
- [MysqlWizard::count](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/count.md) &ndash; Returns the number of rows in the given table.
- [MysqlWizard::getAutoIncrementedField](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getAutoIncrementedField.md) &ndash; Returns the name of the auto-incremented field, or false if there is none.
- [MysqlWizard::getColumnDataTypes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDataTypes.md) &ndash; Returns an array of column_name => column_data_type.
- [MysqlWizard::getColumnDefaultValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultValues.md) &ndash; Returns an array of column_name => default_value.
- [MysqlWizard::getColumnDefaultApiValues](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnDefaultApiValues.md) &ndash; Returns some default "api" values for the given $table.
- [MysqlWizard::getColumnNames](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNames.md) &ndash; Returns the list of column names for the given $table.
- [MysqlWizard::getColumnNullabilities](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getColumnNullabilities.md) &ndash; Returns an array of column_name => is_nullable.
- [MysqlWizard::getUniqueIndexes](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getUniqueIndexes.md) &ndash; Returns an array of index_name => indexes.
- [MysqlWizard::getForeignKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getForeignKeysInfo.md) &ndash; ).
- [MysqlWizard::getPrimaryKey](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getPrimaryKey.md) &ndash; Returns the primary key of the given $table.
- [MysqlWizard::getRic](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getRic.md) &ndash; Returns the ric for the given $table.
- [MysqlWizard::getReferencedKeysInfo](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getReferencedKeysInfo.md) &ndash; Return an array of entries referencing the given $table.
- [MysqlWizard::getCurrentDatabase](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/getCurrentDatabase.md) &ndash; Returns the name of the current database being used.
- [MysqlWizard::query](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/query.md) &ndash; Calls the php \PDO's query method and returns the resulting \PDOStatement.
- [MysqlWizard::exec](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/exec.md) &ndash; Calls the php \PDO's exec method and returns the result.
- [MysqlWizard::explodeTable](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/MysqlWizard/explodeTable.md) &ndash; 





Location
=============
Ling\SqlWizard\MysqlWizard<br>
See the source code of [Ling\SqlWizard\MysqlWizard](https://github.com/lingtalfi/SqlWizard/blob/master/MysqlWizard.php)



SeeAlso
==============
Previous class: [SqlWizardException](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Exception/SqlWizardException.md)<br>Next class: [FullTableHelper](https://github.com/lingtalfi/SqlWizard/blob/master/doc/api/Ling/SqlWizard/Tool/FullTableHelper.md)<br>
