Ric
=========
2019-09-12


Ric is a concept I created for my own needs.

Turns out I keep re-using it across different tools.

So, here is the official definition.




Ric is an acronym, it stands for row identifying columns.
It's basically an array of the columns which identify a row uniquely.

Usually, the ric is equivalent to the columns of the primary key of the table if it has a one.

If the table doesn't have a primary key, then the ric becomes the array of unique indexes that takes care
of the same function.

Eventually, if the table doesn't have a primary key nor does it have unique indexes, then the ric becomes all the columns of the table.


Alternately, the developer can always override the ric manually, if he so desires.


Note: the ric is not related to the concept of auto-incremented key.

