Relational stream
=====================
2016-02-11





Motivation
-------------

In a database, tables have foreign keys.





The basic idea is to select a random key from the foreign table.

But, there is more.

Imagine the following database structure.


```
- programs
----- id
----- the_name


- programs_has_tags
----- programs_id
----- tags_id


- tags
----- id
----- the_name
----- the_type
----- active

```


And now we want to populate the programs_has_tags table.

But, we want to add some weight to the probabilities.
Let's say that we have two possible tags.active values: 0 and 1,
and that we have three possible tags.the_type values: 0, 1 and 2.

We want to be able to say: tags.active=1 should represent 96% of the case,
and for the tags.the_type, we want to specify weights in an intuitive manner, like this:

- tags.the_type.0:  13
- tags.the_type.1:  2
- tags.the_type.2:  2
 
 
In other words, we want to assign weights to any column of the foreign table, in order to influence the random selection 
being done.
 
 
 
Implementation
------------------ 


```
str         getTableKey ( str:table, array:weights=null, str:keyName=id, bool:allowAutoIncrementReset=true )
```

The weight is an array of field => weight values.

The keyName is the name of the key that you want the getTableKey method to return the value of.


allowAutoIncrementReset: this method is likely to be used in a foreach loop.
If weights are not used and the table has auto incremented fields, it is possible to drastically improve performances.
This is what the allowAutoIncrementReset does.
If true, it will reset the auto incremented field of the table; which allows to pick up a random 
line using php, and the sql request doesn't use the slow "select random()" function, but rather 
a "select where id=6" approach.

Now, this is destructive and might not be something you would allow in prod, but most likely if you use 
the BullSheet generator in the first place, you are in dev environment, and you 
don't mind having your auto-incremented fields reset.
  








