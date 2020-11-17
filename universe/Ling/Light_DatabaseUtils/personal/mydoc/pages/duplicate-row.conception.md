Duplicate row, conception notes
=========
2020-11-13 -> 2020-11-16



My intent in this document is to define a duplication system, so that the [lka](https://github.com/lingtalfi/Light_Kit_Admin) user can duplicate rows.


I will let my thoughts express themselves freely, and so the result will be chronological.
Warning: it might not make sense to read sections separately.






So, the user clicks the duplicate action on a row.





The table we want to duplicate might not have **unique keys**, and might not have **dependencies**, where **unique keys** and **dependencies**
are the potential trouble makers.

If we want to duplicate a row from a simple table without unique keys and dependencies, it looks like this:

- lek_product
    - id: ai, pk
    - name: varchar 64


```yaml
rows:
    - 
        id: 6 
        name: table de chambre 
```

So we duplicate row with id=6, we just copy the values, except for the ai field, and we end up with this:


```yaml
rows:
    - 
        id: 6 
        name: table de chambre
    - 
        id: 7 
        name: table de chambre 
```



Unique keys
---------
2020-11-13


Now the first problem comes with unique keys. Imagine this table:


- lek_product
    - id: ai, pk
    - name: uq, varchar 64
    - date_insert: datetime
    

Now if we want to duplicate, we need to change the **name** property, to avoid the constraint error by sql.
Simple enough, we just use some heuristics to update the name, for instance by adding an auto-incremented number at the end of the
name, until it gives a name that's not in the table yet.

So for instance, given those initial rows:



```yaml
rows:
    - 
        id: 6 
        name: table de chambre 
        date_insert: 2020-11-13 11:11:41 
```

If we were to duplicate the product with id=6, then we would have something like this:

```yaml
rows:
    - 
        id: 7
        name: table de chambre2
        date_insert: 2020-11-13 11:11:41 
```



Dependencies
---------
2020-11-13

The second problem comes with row dependencies.


Imagine the following tables:

- luda_resource
    - id: ai, pk
    - name: uq, varchar 64
    
- luda_resource_file
    - id: ai, pk
    - luda_resource_id: fk
    - path: varchar 64

- luda_tag
    - id: ai, pk
    - name: uq, varchar 64
    
- luda_resource_has_tag
    - luda_resource_id: fk, pk1
    - luda_tag_id: fk, pk1



A resource is the abstract concept of a file owned by a user.
A resource file is a concrete variation of this file on the filesystem.
A resource can have multiple files (thumb.png, medium.png, big.png for instance) attached to it.
Tags are self-explanatory.



Now we want to duplicate a resource row.
For a human it makes sense that when you duplicate a resource, everything attached to it is duplicated too.
This includes the resource files, and the tags.


Deep duplication vs simple duplication
------------
2020-11-13

However, I suppose this should be a choice.
Therefore, I suggest that we have not one, but two duplicate buttons:

- duplicate
- duplicate deep

Where **duplicate** only duplicates the row without its dependencies, and **duplicate deep** update the rows and everything that's attached to it.

The **duplicate** (simple) action mechanism has already been covered, so we're left with the **duplicate deep** action.



Deep duplication
-----------
2020-11-13 -> 2020-11-16



The basic idea of deep duplication is that we consider the table as an entity, and we duplicate not only the row
in the main table, but also all the rows that the entity owns in different tables.

This includes:

- the rows in table that have a foreign key to the main table
- the rows that are owned via a "many to many" table (i.e. if the main table is the owner)




Imagine those rows:

```yaml

luda_resource:
    - 
        id: 1
        name: avatar
luda_resource_file:
    - 
        id: 56
        luda_resource_id: 1 
        path: images/avatar.png
    - 
        id: 57
        luda_resource_id: 1 
        path: images/avatar-80x80.png
luda_tag:
    - 
        id: 400
        name: blue
    - 
        id: 401
        name: green
luda_resource_has_tag:
    - 
        luda_resource_id: 1         
        luda_tag: 400
    - 
        luda_resource_id: 1         
        luda_tag: 401         
```

Wo we see that the resource with id=1 has two files attached to it (avatar and avatar-80x80), and, also two tags attached to it (green and blue).
  
So now we're told to duplicate the resource with id=1, with all its dependencies.

We are given the table name and the id (luda_resource, and 1).

So we can start by fetching the reverse fks for **luda_resource**, simply enough we would obtain the dependent tables:

- luda_resource_file
- luda_resource_has_tag

From there, we can fetch the rows that match the given resource id, and basically apply the duplicate algo recursively to all those tables.

So, we should end up with something like this:


```yaml

luda_resource:
    - 
        id: 1
        name: avatar
    - 
        id: 2
        name: avatar2
luda_resource_file:
    - 
        id: 56
        luda_resource_id: 1 
        path: images/avatar.png
    - 
        id: 57
        luda_resource_id: 1 
        path: images/avatar-80x80.png
    - 
        id: 58
        luda_resource_id: 2 
        path: images/avatar.png
    - 
        id: 59
        luda_resource_id: 2 
        path: images/avatar-80x80.png
luda_tag:
    - 
        id: 400
        name: blue
    - 
        id: 401
        name: green
luda_resource_has_tag:
    - 
        luda_resource_id: 1         
        luda_tag: 400
    - 
        luda_resource_id: 1         
        luda_tag: 401       
    - 
        luda_resource_id: 2         
        luda_tag: 400
    - 
        luda_resource_id: 2         
        luda_tag: 401         
```


That's almost good, except that we forgot one thing, to duplicate the resource files on the filesystem.

For a human, if you are going to **duplicate deep** a row, it only makes sense if it's really duplicated in the app.

So our database row duplication is a first step, but it's not the whole thing.

The database row duplication is a good default step.

I suggest that the developer should be able to override/augment that default step.





No duplicate action for many to many tables
----------
2020-11-16


I realized that it made no human sense to duplicate a row from a manyToMany table.
Therefore, the duplicate action shall not be available for those tables.


A table is considered manyToMany when all the cols of its primary key are foreign keys.











