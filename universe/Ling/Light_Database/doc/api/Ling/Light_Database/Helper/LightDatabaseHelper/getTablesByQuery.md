[Back to the Ling/Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md)<br>
[Back to the Ling\Light_Database\Helper\LightDatabaseHelper class](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper.md)


LightDatabaseHelper::getTablesByQuery
================



LightDatabaseHelper::getTablesByQuery — Returns the array of tables used in the given sql query.




Description
================


public static [LightDatabaseHelper::getTablesByQuery](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper/getTablesByQuery.md)(string $query) : array




Returns the array of tables used in the given sql query.
This only works if the table names (and database names if) don't contain a dot or a space in them.

See my stack overflow answer here for some examples:
https://stackoverflow.com/questions/11010901/how-to-extract-table-names-from-mysql-query-with-php/59403860#59403860




Parameters
================


- query

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightDatabaseHelper::getTablesByQuery](https://github.com/lingtalfi/Light_Database/blob/master/Helper/LightDatabaseHelper.php#L32-L58)


See Also
================

The [LightDatabaseHelper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/Helper/LightDatabaseHelper.md) class.



