Request types
==============
2019-08-13


In this document, request means sql request.
In this document I list the types of requests I was confronted to.


Here is my classification so far.

To make this classification works, I ask the following questions:

- can the gui (aka external world) interact with the request?
- If the gui interacts with the request, is the core request applying to a fixed set of tables or a dynamic set of tables?



The requests I found so far are the following: 

- simple request
- howl request



Simple request
------------

This request is simple because the gui cannot interact with it.
In other words, the request comes directly from the developer's mind and has its final form as soon as its written down.

We can use it for instance in forms to display the items of a select listing a list of available countries.

Note: if you create an auto-admin system, your system might generate those simple request for you, but I consider 
this an implementation detail not worth mentioning (although I did here, just to avoid confusion).


Howl
--------

Howl is an acronym which stands for:

- H: having
- o: order
- w: where
- l: limit


Howl is a request which allows gui interaction, and which core query has a fixed set of tables.

This means that the gui can interact with the query, but not change the set of involved tables.


Asking myself how possibly could a gui interact with an sql query, I found that it would only interact with the
having, order, where and limit clauses.

It could technically also interact with the selected columns, but a simple js/css trick would do as well, and so I didn't 
count it (just being interested in which external parameters must come from the gui).


I stumbled upon this type of query very soon. 
In fact, I was creating an admin application (Light_Kit_Admin), and this was the first query I encountered: I needed to display the list
of all the users in a page so that the root user could administrate them.

And so I wanted all the "classical" whistles and bells that come with an admin list:

- some search input, a general one, or possibly one per column, or possibly both 
- clicking on each column head would toggle the ordering of the request
- pagination, of course
- ...and more when there is more


Now thinking more about the parameters required provided by the gui, we can see that except for the limit which has a fixed set of two parameters (page and length),
the other parameters are basically a stack of expressions.
And so the parameters provided by a gui to call an howl request look like this:

- having: array of having expressions
- order: array of order expressions
- where: array of where expressions
- limit: 
    - page: the number of the page
    - length: the number of items per page


  



