List actions
==============
2020-08-24 -> 2020-08-27





 
A list can provide some triggers, which the user can interact with.

Each trigger might execute some code, which might alter the state of the list (i.e. the items of the list).

When a trigger executes some code, we always execute that code via ajax, using an [action handler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-action-handler).


Examples of triggers include:

- ordering the list by price ascending
- filtering the lists items, showing only those which product name contains the word "hello"
- deleting the selected rows
- printing the list
- creating the pdf version of the list


In **realist**, a **list action** is a visual trigger, that can potentially execute some code.

Each list action is associated with an **action id**, which uniquely identifies an action, and is used internally to reference them.


**List actions** are organized based on  which area their triggers is visually displayed.
We differentiate the following types of **list action**:

- **general actions**
- **list item group actions**
- **list item actions**


General actions are actions related to the list in general. They aren't specific to a set of list items.

Instead, they apply to the whole list at once.

They are generally displayed above the list, in a hamburger menu.

Examples: make a backup of the whole list in sql format, or generate rows for that list.



**List item** actions, and **list item group** actions are useful in the case where you want to display what we call an "admin list" in the realist lingo.


An admin list is a list which gives to the user the ability to execute some actions, based on a set of **list items** that he/she chooses.
Usually the user can tick a checkbox in front of the list item to select it. 


**List item group** actions apply to a selected set of rows. The user first selects (one or) multiple rows via the gui, then he/she
can apply some actions to them. Usually, **list item group actions**'s triggers are displayed at the top or at the bottom of the list, 
and are disabled by default, until the user selects one or more rows. 

Examples: print selected rows, delete selected rows, edit selected rows.


**List item** actions are the lowest level of actions. They are generally displayed inside the list item itself, and affect only this list item.

Examples: delete this row, edit this row.


When an action requires some code to be executed, the execution of the code is done via ajax by the [action handler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-action-handler).









The rendering of a list action in the list
---------
2020-08-24

Now that we've talked about what the **list actions** are and what they do, you might wonder how to display them.

The [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-list-renderer)
is responsible for display both:

- the **general actions**
- the **list item group actions**


On the other hand, the [list item renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-protagonists.md#the-list-item-renderer) is responsible for displaying the **list item actions**.


Because the philosophy of realist is to be able to configure everything from the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md),
the basic idea is that we define the list actions in an array format in the **request declaration**, and let the **list renderer** interpret them.

An example of array representation of a list action is the [action-items](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md) format.

















