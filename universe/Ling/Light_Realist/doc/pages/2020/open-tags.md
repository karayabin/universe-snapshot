Open tags
============
2020-08-27


"As the user interacts with the list, the list content updates."



Open tags are designed to be sent via ajax from a **rows renderer**, which is the list gui, to a **rows generator**, which fetches the list
content from a storage such as a database.



The main idea with **open tags** is to control the sql request generating the list. 


Here are the available **open tags**:


- general_search: $expression
- generic_filter: $column $operator $operator_value
- generic_sub_filter: $column $operator $operator_value
- col_order: $column $direction
- limit: $page $page_length?

- open_parenthesis: (
- close_parenthesis: )
- and: and
- or: or



### general_search
2019-08-15 -> 2020-08-27



This tag is used for a general search input (if any).
It takes one variable: $expression, the expression to search for.

When passed to the **rows generator**, the **rows generator** will know exactly in which fields to search.
This is generally a combination of various fields.

For instance, if the expression was "Mary", the request using a general_search tag could be something like that:

- ... where id='Mary' or first_name like '%Mary%' or pseudo like '%Mary%' or avatar_url like '%Mary%' ...

Notice that the OR operator is used by the general_search tag.


# generic_filter
2019-08-15 -> 2020-08-27



This tag is mainly used in an advanced form search.

It takes three variables:

- $column: the name of the column to filter by 
- $operator: the operator to use. The list of available operators is discussed later in this page 
- $operator_value: the value to compare the column against 

For an advanced search, we generally combine different items with the AND keyword, producing something like:

- WHERE id >= 78 AND identifier like '%pine%' 

However, we can also use the OR and parenthesis tags to produce something like:

- WHERE id >= 78 AND ( identifier like '%pine%' OR identifier like '%hot%' )

 


 



# generic_sub_filter
2019-08-15 -> 2020-08-27

This tag was designed as a complement of either the **general_search** tag, or the **generic_filter** tag.

Like the **generic_filter** tag, it takes three variables:

- $column: the name of the column to filter by 
- $operator: the operator to use. The list of available operators is discussed later in this page 
- $operator_value: the value to compare the column against


The main difference is how it's merged in the sql request.

Basically, the **generic_sub_filter** will function like the **generic_filter**.
However, if either the **generic_filter**, or the **general_search** tag is set, the **generic_filter** will come after in the where clause 
and will be added using the AND operator.

For instance, imagine we have a "user" table with first_name, last_name and age columns.

A general_search tag alone would lead to a search like this:

- ... where (first_name like '%Mary%' or last_name like '%Mary%' or age='Mary')

We can use the generic_sub_filter to lead to a request like this:

- ... where (...general_search...) AND (last_name like '%Johnson%' AND age=40)

The same principle applies with **generic_filter**. 
For instance, we could have a **generic filter** giving us this query:

- ... where age<40

Then we could sub filter it using a generic_sub_filter, which would give us something like this:
 
- ... where (...generic_filter...) AND (last_name like '%Johnson%')



 


# col_order
2019-08-15

This tag is used for sorting the request. Generally, the renderer would display some clickable sort icon next to the column head items,
and clicking on those icons would reverse the sorting of this column.

Note: multiple sorts can be added at the same time.

Each tag requires two variables:

- $column: the name of the column to sort
- $direction: the direction of the sort, can be one of: "asc" or "desc".



# limit
2019-08-15


This tag is used for handling the pagination system. We use two variables: 

- $page: int, the number of the page that we want to display
- $page_length: (if allowed by the generator) int, the number of items per page. 



The knowledge of those tags is implicit in this system.
Which means both the rows generator and the renderer know about it.

It doesn't require any particular action from the developer.

