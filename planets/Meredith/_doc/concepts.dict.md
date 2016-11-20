Meredith concepts dictionnary
==============================
2016-01-16




This document explains Meredith specific concepts.
Let's start with a quick reminder of how meredith works:


Meredith is a crud system.
There is a meredith client and a meredith server.
The client can ask for 5 interactions with the server:

- insert a new item
- update an existing item
- remove one or more items
- get information about one specific item
- get information about a whole bunch of items






cosmetic change
------------------
2016-01-16

A cosmetic change is a change in the sql request that enhance its visual output.


Imagine you have a table products and a table categories.
A product belong to a category, and we use a foreign key to bind both tables.


### Base request 

To display all products, we can do:

```mysql
select id, categories_id, the_name from products;
+----+---------------+---------------+
| id | categories_id | the_name      |
+----+---------------+---------------+
|  1 |             1 | komin > video |
|  2 |             2 | zikos         |
|  3 |             1 | tabernak      |
+----+---------------+---------------+
```

But the numbers in the categories_id column are ugly, unreadable for the human client.



### Enhanced request 

We can enhance our previous request by modifying the sql request:


```mysql
select p.id, concat(categories_id, ". ", ca.the_name) as categories_id, p.the_name from products p inner join categories ca on ca.id=p.categories_id;
+----+---------------+---------------+
| id | categories_id | the_name      |
+----+---------------+---------------+
|  1 | 1. Rire       | komin > video |
|  2 | 2. Music      | zikos         |
|  3 | 1. Rire       | tabernak      |
+----+---------------+---------------+
```

Ok, now that's much better.
We just did a cosmetic change. 

 






foreign field
-----------------------------------
2016-01-18

In the insert/update automated workflow: a foreign field is a field that doesn't belong to the referenceTable.




formId
-------------
2016-01-16

The meredith client always passes a formId parameter, so that the meredith server knows what table(s) to act on.



idf
-----------------------------------
2016-01-18

Identifying fields. The name of the fields (columns) necessary to identify any row in a given table (notice that 
an idf can only target one table).
It might be the very common id column, or an array of columns.




insert/update automated workflow
-----------------------------------
2016-01-18

This is the default meredith workflow to handle insert/update requests.
It basically does two things:

- insert/update data in the **referenceTable**
- fires the onSuccessAfter callback in case of success 
        This design allow the meredith developer to interact with multiple tables (for instance add tags 
        to a foreign table),
        although only the reference table is "automatically" handled by meredith.






referenceTable
-----------------
2016-01-16

The **reference table** is the main table that the meredith server acts upon in the **insert/update automated workflow**.
 
When the meredith client requests the meredith server, the server has to know which table(s) it should act upon.
In most cases, the meredith server will only interact with one table, which is known as the **reference table**.



By default, it assumes that the **reference table** IS the **formId** passed by the client.
However, if the application maintainer decides so, she can map any formId to any table.  
Two reasons I see for doing that are:

- hiding the table names from the client side (security paranoia)
- using table subviews: for instance a table with a lot of information, split into 3 forms, each form updates a certain part of the table


