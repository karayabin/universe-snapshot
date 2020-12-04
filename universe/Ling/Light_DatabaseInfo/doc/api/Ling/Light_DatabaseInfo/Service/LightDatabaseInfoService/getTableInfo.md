[Back to the Ling/Light_DatabaseInfo api](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo.md)<br>
[Back to the Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService class](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService.md)


LightDatabaseInfoService::getTableInfo
================



LightDatabaseInfoService::getTableInfo — Returns the info array for the given table.




Description
================


public [LightDatabaseInfoService::getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md)(string $table, ?string $database = null, ?bool $reload = false) : array




Returns the info array for the given table.
The info array contains the following entries:

- database: the name of the database containing the table
- columns: an array of the column names
- primary: an array of the column names of the primary key (empty if no primary key)
- types: an array of columnName => type
         Type is a string representing the mysql type ( ex: int(11), or varchar(128), ... ).
         List of mysql types here: https://dev.mysql.com/doc/refman/8.0/en/data-types.html
- nullables: array of column names which are nullable
- simpleTypes: an array of columnName => simpleType.
         A simple type is a string amongst:
             - str
             - int
             - date
         See the [TypeHelper::getSimpleTypes](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Helper/TypeHelper/getSimpleTypes.md) method for more info.

- ric: the [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array
- ricStrict: the [ric strict](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) array
- autoIncrementedKey: the name of the auto-incremented column, or false (if there is no auto-incremented column)
- uniqueIndexes: It's an array of indexName => indexes. With indexes being an array of column names ordered by ascending index sequence.
- foreignKeysInfo: It's an array of foreignKey => [ referencedDb, referencedTable, referencedColumn ].
- referencedByTables: the array of tables having a foreign key referencing the given table.
     It's an array of full table names (i.e. $db.$table notation).
- hasItems: an array of "has items".
     See more details in [the has table information conception notes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/conception-notes.md#the-has-table-information).

     Each "has item" has the following structure:

     - owns_the_has: bool, whether the current table owns the **has** table or is owned by it.
     - has_table: string, the name of the **has** table
     - left_table: string, the name of the owner table
     - right_table: string, the name of the owned table
     - left_fk: string, the name of the foreign key column of the **has** table pointing to the left table
     - right_fk: string, the name of the foreign key column of the **has** table pointing to the right table
     - referenced_by_left: string, the name of the column of the **left** table referencing the **has** table's foreign key
     - referenced_by_right: string, the name of the column of the **right** table referencing the **has** table's foreign key
     - left_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **left** table.
          This method will list the following handles:
     - the column of the **left** table referencing the **has** table's foreign key (same value as the **referenced_by_left** property)
     - the unique indexes of the **left** table

     - right_handles: array of potential handles. Each handle is an array representing a set of columns that this method consider should be used as a handle related to the **right** table.
          This method will list the following handles:
          - the column of the **right** table referencing the **has** table's foreign key (same value as the **referenced_by_right** property).
          - a "natural" column that has a common name for a handle, based on a list which the developer can provide, and which defaults to:
              - name
              - label
              - identifier

     - the unique indexes of the **right** table that have only one column (i.e not the unique indexes with multiple columns).
          If the unique index column contains only the aforementioned "natural" column, this particular index is discarded (as to avoid redundancy).



If the reload flag is set to true, the cache will be refreshed before the result is returned.
Otherwise, if reload=false, the cached result will be returned.




Parameters
================


- table

    

- database

    

- reload

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightDatabaseInfoService::getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/Service/LightDatabaseInfoService.php#L108-L161)


See Also
================

The [LightDatabaseInfoService](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/__construct.md)<br>Next method: [getTables](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTables.md)<br>

