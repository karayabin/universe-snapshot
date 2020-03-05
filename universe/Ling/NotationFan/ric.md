Ric
=========
2019-09-12 -> 2019-11-04


Ric is a concept I created for my own needs.

Turns out I keep re-using it across different tools.

So, here is the official definition.




Ric is an acronym, it stands for row identifying columns.
It's basically an array of the column names which identify a row uniquely.


There are two types of ric:

- strict ric
- extended ric 


Without more precision, the ric always refers to the **extended ric** version.


The strict ric 
---------------

Perhaps the easiest way to think about the strict ric is the minimum set of column names required to update a row in a table.

The ric is equivalent to the columns of the primary key of the table if it has a one,
or all the column names otherwise.



The extended ric
---------------

The extended ric is like the strict ric, but if the table doesn't have a primary key, then the ric becomes the array of unique indexes that takes care
of the same function (if the table has some unique indexes).

Eventually, if the table doesn't have a primary key nor does it have unique indexes, then the ric becomes all the columns of the table.


