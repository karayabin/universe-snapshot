OpenAdminTable protocol
==================
2019-08-15



This protocol describes the way a "rows generator" and a "rows renderer" object should behave and communicate in order
to produce an interactive gui admin table.



There are two actors:

- the rows generator, which produces the rows
- the rows renderer, which renders the rows


The rows generator is basically the master, because he knows how the rows are created, while the (rows) renderer is just 
the slave.

The communication between them goes like this:

- step 1: the rows generator configures the renderer
- step 2: the renderer (driven by the user interaction) asks the (rows) generator to update the rows (via ajax)
- step 3: the rows generator treats the renderer's request, and return a json response containing either:
        - the updated rows
        - an error message




In step 1, the configuration of the renderer is done by passing two data structures to the renderer (given by the rows generator):

- the open tags
- the data types




The open tags
--------------


To help with the communication, the rows generator and the renderer both know about a well-defined set of tags known
in this document as the **open tags**.


The following tags are the open tags.
Each entry lists the tag name first, followed by the expected variables that goes along with the tag
(note: the developer might only use a subset of the expected variables if he doesn't need all of them).


Note: a question mark after the variable indicates that it's optional.

- general_search: $expression
- generic_filter: $column $operator $operator_value
- generic_sub_filter: $column $operator $operator_value
- col_order: $column $direction
- limit: $page $page_length?



### general_search

This tag is used for a general search input (if any).
It takes one variable: $expression, the expression to search for.

When passed to the rows generator, the rows generator will know exactly in which fields to search.
This is generally various fields.

For instance, if the expression was "Mary", the request using a general_search tag could be something like that:

- ... where id='Mary' or first_name like '%Mary%' or pseudo like '%Mary%' or avatar_url like '%Mary%' ...

Notice that the OR operator is used by the general_search tag.


# generic_filter

This tag is very open. It can be used in a per-column search for instance, or in an advanced form search, or anywhere
some filtering needs to be done.

It takes three variables:

- $column: the name of the column to filter by 
- $operator: the operator to use. The list of available operators is discussed later in this page 
- $operator_value: the value to compare the column against 


Generic filters are combined with the AND operator in the where clause, as if all generic_filter tags where
coming from the same (advanced search) form.


# generic_sub_filter

This tag was designed as a complement of either the general_search tag or the generic_filter tag.

Like the generic_filter tag, takes three variables:

- $column: the name of the column to filter by 
- $operator: the operator to use. The list of available operators is discussed later in this page 
- $operator_value: the value to compare the column against


The main difference is how it's melt in the sql request.

Basically, the generic_sub_filter will function like the generic_filter.
However if either the generic_filter or the general_search tag is set, the generic_filter will come after in the where clause 
and will be added using the AND operator.

For instance, imagine we have an user table with first_name, last_name and age columns.

A general_search tag alone would lead to a search like this:

- ... where (first_name like '%Mary%' or last_name like '%Mary%' or age='Mary')

We can use the generic_sub_filter to lead to a request like this:

- ... where (...general_search...) AND (last_name like '%Johnson%' AND age=40)

The same principle applies with generic_filter. 
For instance we could have a generic filter giving us this query:

- ... where age<40

And then we could sub filter it using a generic_sub_filter, which would give us something like this:
 
- ... where (...generic_filter...) AND (last_name like '%Johnson%')



 


# col_order

This tag is used for sorting the request. Generally, the renderer would display some clickable sort icon next to the column head items,
and clicking on those icons would reverse the sorting of this column.

Note: multiple sorts can be added at the same time.

Each tag requires two variables:

- $column: the name of the column to sort
- $direction: the direction of the sort, can be one of: "asc" or "desc".



# limit

This tag is used for handling the pagination system. We use two variables: 

- $page: int, the number of the page that we want to display
- $page_length: (if allowed by the generator) int, the number of items per page. 



The knowledge of those tags is implicit in this system.
Which means both the rows generator and the renderer know about it.

It doesn't require any particular action from the developer.



The data types
---------------

Also, the rows generator will be communicating the data types to the renderer, in a form of an array of column => data type.

The idea is to allow the renderer to be more creative with how it displays the gui admin table to the user.

For instance, if the type is of data is a date, the renderer could display a column filter in the form of a date input (rather than a text input).

The available data types are:

- number: a number (int, float, ...)
- string: a string
- enum: a finite set of strings
- date: a date in mysql format
- datetime: a datetime in mysql format
- action: indicates that this is the column holding the action buttons (it usually contains html)
- ... other types can be created (i.e. those are just identifiers)


Note: with the enum type, it's assumed that the rows generator (more or less directly) passes the list of available items
to the renderer, so that it can display it to the user (i.e. the renderer can't guess it by itself).


Note: both the rows generator and the renderer have an implicit of the aforementioned data types
considered standard types.






The available filter operators
-----------------


We use the [susco](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md) list.

Note: both the rows generator and the renderer have an implicit knowledge of them.






Step 2 and 3
-----------

Step 2 and 3 follow the [realist-tag-transfer-protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md).





The OpenAdminTableRendererInterface
------------

For the renderer authors who want to, I provide an OpenAdminTableRendererInterface interface,
so that if you implement it, other users know in a glance that you follow the aforementioned guidelines.   








