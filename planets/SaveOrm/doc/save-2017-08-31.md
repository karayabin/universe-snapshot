Save
======
2017-08-31


Transaction
==============
The save method might imply recording/updating data in multiple tables.
The ObjectManager.save method uses transactions to ensure that the save call
is atomic: it either fails or succeeds, but then the consequences are predictable. 
 




Validation
====================

When it comes to saving, we often think of validation.

There are two types of validation that we need to distinguish:

- model constraints
- application level validation


Model constraints (foreign key must be valid, a primary key is missing, ...) are required, 
because otherwise the model doesn't update correctly: we cannot save records in the database, 
or update a record in the database.



Application level validation is a business layer that the application applies to the objects.


As for now, since nothing is created yet, we will only focus on model constraints.


Model constraints
--------------------

Here are the following constraints we need to take care of:

- foreign keys must be defined



When a constraint fails, the database cannot be updated.
We throw a SaveException if the save method fails.





### Foreign keys must be defined

How do you know if a foreign key is defined?
If it's not null, it's defined.

This means you need to know which field is a foreign key or not, and what is its current value.
This also means we know on which fields to iterate.


This leads us to the next section: the object common properties.



Object common properties
=========================

In our way from modelizing to recording into the database, we will need a lot of information.
The benefit of generating classes is that we can get primordial information hardcoded in our object.

Here are the properties we will need for every object:


- table: the name of the table to interact with
- prefix: the prefix for this table
- properties: the name of the columns of the corresponding table (to save a record in the database)
            Note: an object corresponds exactly to a table (i.e. each table has one and one only object).
- foreignKeys: array of foreign key column => \[referenced table, referenced column]
- autoIncremented: null|str, the name of the auto-incremented column if any
- primaryKey: array representing the primary key 
- uniqueIndexes: array of unique indexes, helps SaveOrm determining whether to perform an update or an insert 
- ?ric: array representing the ric fields (only for tables without primary keys, see the "Create or update?" section below) 
- ?bindings: array of guest links  
        The concept of link is defined in the **save-orm.md** document.
                    - link: <table> (<.> <column>)?
- ?childrenTables: array of items, each item contains the following:
                        - 0: right table
                        - 1: middle.leftForeignKey
                        - 2: middle.rightForeignKey
- !!nullableKeys: array of nullable columns 
- !!uniqueIndexes: todo


We don't want to put too much weight on the Object, so we will externalize this data to the object manager.
See the "object-manager.md" document for more info.



```php
$o = Event::create()
    ->setShopId(6)
    ->setName("abc")
    ->setStartDate("2017-08-31")
    ->setEndDate("2017-08-31")
    ->setLocationId(6)
;


//  
ObjectManager::create()->save($o);

```
 
                



Create or update?
=======================

Then comes the phase where we need to record the object into the database.
The first question that arises is: is it a create or an update operation?

Here is how we determine that.
We basically try anything to make it an update, and ultimately fail to an insert.


- if there is an auto-incremented column: 
    - if the value already exist it's update,    
- elseif there is a primary key:
    - it's an update if we can find a record with the primary key's current values,
- elseif there are unique indexes:
    - it's an update if we can find a record with any of the indexes,
- elseif there is a ric (manually defined)
    - it's an update if the ric values dig a record 
- else
    - if no auto-incremented column, no primary key, no unique indexes and no ric is defined, 
        try one last time with all fields, or fail to an insert
    - if either the auto-incremented column or the primary key or at least one unique index or the ric is defined,
        fail to an insert                
        
        
Example of generator config file:
```php
$conf = [
    table1 => [
        ric => [
            label,
            email,
        ],
    ],
];
```        

The generator will read this and create the ric property to the common properties


        
Note: we will use the [QuickPdo planet](https://github.com/lingtalfi/Quickpdo) under the hood,
since I'm used to it and it's a useful wrapper (I believe) around the pdo library.



Return of the save method
============================

So what does the save method return?

I believe it doesn't depend on whether it's a create or update operation, but rather
on which type of columns where used to interact with the table:

- if the table contains an auto-incremented field, the return is the value of the auto-incremented field
- else if the table contains a primary key, the return is an array of primary key => value
- else if the table contains a ric, the return is an array of ric key => value
- else the table contains an array of all key => value


Now, a question arises when other tables are involved.
For instance if our table is bound to another via a binding relationship,
when we save our object the bound objects are saved with it, as we will see in the next section.

It's legitimate to have the need to access the bound object's save results.

To access those, the ObjectManager provides saveResults property, and each result is associated with
the name of the table as the key, including the main table.

Example with a host object Event and a guest object EventLang.
The corresponding tables are: ekev_event and ekev_event_lang.

The saveResults property will contain the following (assuming the bound
object was defined and saved):

- ekev_event: (results of EventObject.save)
- ekev_event_lang: (results of EventLangObject.save)



The save method injection
============================

After a successful save method call, the state of the object might change.

Imagine you do the following:

```php
$o = EventObject::create()->setName("name");
$o->save();

a($o->getId()); // what do you expect here?
```

What do you think the getId method should return?

Obviously not null, but rather the newly created id.


The save method "injection" system is the name for the portion of code
that handles just that.


The change of state happens in the following cases:

- save of type create on a table with an auto-incremented column



Note: it doesn't happen with the update case, because the values
are already updated in the object state BEFORE the save method is called.




Adding the binding relationship layer
===========================

What happens when we save a host object?

Example with a host object Event and a guest object EventLang.

If the eventLang property is set (not null), we call the save method on the guest object.

However, since the guest object has a foreign key on the host (by definition), we first save the host, and then
all the guests.

This way, just before saving the guest, we can call the EventLang.setEventId method and pass
the newly created ekev_event id value.



                    

Adding the sibling relationship layer
===========================

There is nothing special I want to say about the implementation of
sibling relationship.



Adding the children relationship layer
===========================

For the children relationship, we place our code AFTER the left table 
(which is the main table) has been saved.

Then we need to save the "right" table first, and the middle last
since it needs resolved foreign keys from the left and right tables.

The first thing we want to do is iterate over the children relationship
objects, and for that we need the name of the right tables.

We will use the childrenTables auto-generated common property for that.















