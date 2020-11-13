OpenAdminTable protocol
==================
2019-08-15 -> 2020-08-28



The **open admin table** protocol describes the communication between a **rows generator** and a **rows renderer**,
in the context of an interactive gui admin table.



There are two actors:

- the **rows generator**, which produces the rows
- the **rows renderer**, which renders the rows



The communication synopsis looks like:

- step 1: first we configure the **rows renderer**
- step 2: the **rows renderer** (i.e. gui), driven by the user interaction, asks the **rows generator** to update the rows. 
    The communication is done via ajax, and using **open tags** (see below for more details)
    
- step 3: the **rows generator** treats the renderer's request, and return a json response containing either:
        - the updated rows
        - an error message





The rows renderer configuration
----------
2020-08-27

The configuration of the renderer is done by passing the following data structures to the renderer:

- the open tags
- the data types





The open tags
--------------
2019-08-15 -> 2020-08-27


See the [open tags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/open-tags.md) page.




The data types
---------------
2019-08-15 -> 2020-08-28


Also, the **rows generator** will be communicating the data types to the renderer, in a form of an array of column => data type.

The idea is to allow the renderer to be more creative with how it displays the gui admin table to the user.

For instance, if the type is of data is a date, the renderer could display a column filter in the form of a date input (rather than a text input).

The available data types are:

- number: a number (int, float, ...)
- string: a string
- enum: a finite set of strings
- date: a date in mysql format
- datetime: a datetime in mysql format
- action: indicates that this is the column holding the action buttons (it usually contains html)
- checkbox: indicates that this is the column holding the checkboxes in an admin list
- ... other types can be created (i.e. those are just identifiers)


Note: with the enum type, it's assumed that the rows generator (more or less directly) passes the list of available items
to the renderer, so that it can display it to the user (i.e. the renderer can't guess it by itself).


Note: both the **rows generator** and the **rows renderer** use the aforementioned data types considered standard types.






The available filter operators
-----------------
2019-08-15



We use the [susco](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md) list.

Note: both the rows generator and the renderer have an implicit knowledge of them.






Step 2 and 3
-----------
2019-08-15 -> 2020-08-27


Step 2 and step 3 both follow the [realist-tag-transfer-protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md).





The OpenAdminTableRendererInterface
------------
2019-08-15 -> 2020-08-27


For the renderer authors who want to, I provide an OpenAdminTableRendererInterface interface,
so that if you implement it, other users know in a glance that you followed the aforementioned guidelines.   








