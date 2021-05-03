Crossed column (aka cross column)
================
2019-11-13



Crossed column is a term I use to describe a row column which value uses information from 
multiple tables (in the same way a sql join uses multiple tables).


Why the need for cross columns?

When you're displaying an admin table, such as the gui of today's phpMyAdmin (2019-11-13),
by default you display the values stored in this table.

The problem is that iF that table has foreign keys, the display of a foreign key is usually
not very friendly, because often foreign keys are just referencing auto-incremented numbers,
and numbers are not as friendly for the average person who just want to administer their website.

In other words, imagine that there are three tables: user, permission, and user_has_permission.
And as you could expect, the user_has_permission contains the following fields:

- user_id
- permission_id

So if you were to display the default admin table for the user_has_permission table,
we would see only numeric values, such as:

- (3,1)
- (3,2)
- (2,3)

Not very sexy, is it?


And so that's when the concept of crossed column comes into play.

The idea of the cross column concept is to display the following values instead:

- (3. John Doe, 1. admin) 
- (3. John Doe, 2. moderator) 
- (2. Alicia Campbell, 3. blogger) 


Much more useful, isn't it?








