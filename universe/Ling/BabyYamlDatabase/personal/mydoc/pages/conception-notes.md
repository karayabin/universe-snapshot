BabyYaml database, conception notes
====================
2019-09-13



The idea of this planet is to use a babyYaml file as a database.

Amongst the benefits of that approach, we have:

- it's easy for a developer to just update the entries of the database (just by editing the file)


The words "row" and "item" are used interchangeably in this conception.
The word "key" refers to a map of key => value, which identifies an item, or possibly multiple items.
See more details for the key in the "key" section later in this document.



We will provide the following methods:

- insert ( string table, array row )

- getItemByKey ( string table, array key )
        
- getItemsByKey ( string table, array key )
                 
- updateItemByKey ( string table, array key, array values )

- deleteItemByKey ( string table, array key )




A table will be simply an entry in the babyYaml configuration.
 
The root key is the [bdot](https://github.com/lingtalfi/Bat/blob/master/doc/bdot-notation.md) path
representing the portion of our config which holds the root array, composed of the following entries:

- tables
- config
  
  
The **tables** entry is an array containing all our tables along with their data (we will write dynamically in this portion).

The **config** entry is an array containing various configuration information about this system.
 
In particular, it contains a key named **constraints**, which is an array of table => constraintItem.

Each constraintItem is an array with the following keys:

- ric: the ric columns
- ?auto_incremented_key: the name of the auto-incremented key if any


The [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) and the auto incremented key will be used by
the **insert** method, to perform some structure sanitizing checks on the given row.
 
 
 
Constraints checks
-------------
 
The constraints check are applied equally (unless otherwise specified) in both the insert method and the update emethod.

 
If the row you're trying to insert/update is empty, an InconsistentRow exception is thrown.  
 
If the **ric** is provided, an InconsistentRow exception is thrown if the row you're trying to insert doesn't contain
all the ric columns, except if that column is also the auto-incremented column.


If the **ric** is defined (in the configuration), a DuplicateRow exception is thrown if a row in the table already has
the same ric values than the row you're trying to insert.

This doesn't apply for an update operation if the row you're updating doesn't change it's ric values.


For the developer's convenience, a table with auto-incremented key is always sorted by the auto-incremented key asc.


Type sensitivity
-----------
The babyYaml database is type sensitive, so an int is an int, and a string is a string, and so the string "6"
is different than then integer 6.

This matters with the **insert** operation, for inconsistent row checking: the row that you want to insert
must have the right types (string or int) for each column, especially the ones corresponding to the 
ric and the auto-incremented key, otherwise inconsistencies might appear.



The key notation
-------------

The key is a map, of key => value.
It serves the purpose of identifying one or more rows in a given array of rows.

A rows match only if all entries of the key matches.

As for now, I just needed to compare using the "strictly equals" operator, and so that's the default
operator being used.

In other words, if your key is:

- id => 6


This means that you're looking for rows which id strictly equals six.

In other words, the operator used for comparison is "===".

Now I believe that in some future, I'll need more complex comparison operators, such as ">" for instance.
My idea for implementing them is to use an array as the value of the map, the first item
of that array being the operator, and the next items being the values of that operator.

So for instance, with this key:

- id => 
    - 0: <
    - 1: 6
    
we would get the rows which "id" column value is less than 6.

Now for the operators list, I suggest [susco](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md).    
    
