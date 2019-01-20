Hybrid list prototype
========================
2017-11-07



Intro
=============
A list is an array containing rows.
It's created by executing the following steps in order:

- list          (creating the initial list)
- filter    
- sort
- paginate


Usually, we can rely on (my)sql to do all those steps.


```txt

select *            <--- creating the initial list
from table          <--- creating the initial list
(inner join...)     <--- creating the initial list

where x=y           <--- filtering the list
ordered by z asc    <--- sorting the list
limit 20, 10        <--- paginating the list

```


This is the recommended method since mysql is very fast at doing those kind of things.

Unfortunately, sometimes things get more dynamical.
For instance, the sort might depend on a data that is not/cannot be stored in the database.
Same for filters.

When this case occur, we need to rely on php to manually do the filtering, sorting and paginating operations.
The resulting items will be the same, but php will be slower.

In other words, we can use one system or another (sql or php).

But we can also start with sql and finish with php (as to get the best speed out of sql, and doing
the dynamic steps with php).
Where we put the php cursor is our choice.


- we could create the initial list using sql (select * from...), and then do the rest (filtering, sorting and paginating) with php
- we could include the filtering with sql (select * from table where...), and then do the rest  (sorting and paginating) with php.
        In this case we could even do more filtering with php if required.
- we could include the filtering and sorting with sql (select * from table where... order by), at which point
    I believe we should be able to switch to an all-sql system (select * from table where... order by x limit...)
    
    
So our real options are:

- do all with php     
- creating the list with sql, rest with php  
- creating the filtered list with sql, rest with php (potentially including more filtering)    
- do all with sql


So, although we have multiple options, the problem for the developer remains the same: displaying a list.

The Hybrid list system aims at providing ONE tool to help the developer creating the list he/she wants.

 

Implementation
==================

In order to do that, we use some observations and some concepts.

First, let's notice that the filters and sorters are input that come from the user (the developer will probably access them
via $_POST or $_GET).

And so, the objects we will create will "listen/react" to those incoming parameters.

The main object: the HybridList, will branch the parameters to the right listeners. 

Also, sort and filter are not handled the same way by the HybridList object.
Assuming list parameters come from $_GET, sort will consume only one property in $_GET: sort (by default),
which value is an arbitrary identifier; while filter consumes an arbitrary number of properties in $_GET.


The HybridList will let you do anything that it technically allows.
Beware that if you're not careful enough, this might lead to confusing situations.

For instance, it makes no sense (or show me how) to use order and limit in your
sql request if you know that you will filter using php.
This is not error from the HybridList's perspective, but it just means you don't understand
how to use it (unless that particular makes sense for some reason that I don't know of).
So, watch out!



 


RequestShaper
-------------------
RequestShaper is a tool for the sql side.

A shaper reacts to a list parameter.

Each parameter can only be handled by at most ONE shaper at a time.
(i.e. if two shapers are accidentally assigned to the same list parameter, only the last one
will be executed).
However, the same shaper can handle multiple list parameters (because I see no
reason why it shouldn't).



The RequestShaper, when triggered by the HybridList, will:

- add sql statements to the SqlRequest object, which later will be computed into an actual sql request


ListShaper
-------------------
On the dynamic side, we know that we will use php.

We can reuse the RequestShaper principle, which is quite handy and flexible.
The only thing that changes is the name: ListShaper is the new name for those kind of shapers,
which allow us to have two layers of shapers (it becomes then possible to use both sql filtering AND
php filtering for instance).




Returning information
----------------------------
The HybridList will have a execute method which will return an information array.

Keep in mind that HybridList is probably just a building block of a greater system that you will use in your 
application.

The information array contains the following data:

- items: the rows
- sliceNumber: the number of the slice representing the items (aka the current page number)
- sliceLength: the number of items per slice
- totalNumberOfItems: the total number of items
- offset: the offset of the returned slice's first element (compared to the whole items array)



General synopsis
-------------------

Here is a schema to help me/you remember how it works.

```txt
    list params ( $_GET )
        |
        |
        \/
    HybridList
        - RequestGenerator
            - add static shapers (react to a list param and shape the sql request)       
            - add dynamic shapers (react to a list param and shape the items)
```






Implementation tips and tricks
------------------------

ListShaperInterface.execute's callback takes an "info" array as reference as third parameter.
That's because if you implement a page system with php you need to update the array returned by the HybridList.

Note: 
if you ask yourself how to create a ListShaperInterface instance that would be called every time, (so
that you could use it as an "array fixer" of sort), consider setting the default list parameters.  



The different properties that the HybridList returns are: 

- items
- sliceNumber
- sliceLength
- totalNumberOfItems
- offset

Ignoring the items for this section:

From the mysql side,
 
totalNumberOfItems becomes available after the list is created,
then sliceNumber, sliceLength and offset only become available when/if the sql
request contains the limit clause.








