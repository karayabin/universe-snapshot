Morphic generator brainstorm 3
===========================
2018-02-20



This is a supposedly improved version of the brainstorm 2.

This is a recreate from scratch, with clearer concepts in mind.





Our goal is to generate form/lists for a given database, thus generating a primary but functional gui admin (aka backoffice).

We will use the morphic system, and we will be driven by the ekom module (our client is...).

My focus in this brainstorm is on generating:


- controller
- list config file
- form config file


The forms and lists that we want to generate have some special characteristics that we need to understand before diving in.



First of all, we display the form above the list when needed.
I believe this helps the gui operator to have a clearer vision of what she is doing: adding an item and having the satisfaction
to see it appear in the list below.


Then we have the more interesting concept of tables relationship.
The one that we will be generating (or at least try to) is the has relationship (parent/children relationship).


In terms of gui, it means that whenever you have a parent table, the form will show buttons at the bottom,
linking to the children tables. 
Again, the goal is to help the gui operator being more efficient.

In order to orchestrate all this, here is my plan (note that brainstorm2 led to a almost functional version,
but the second level nesting was having problem, the ekev_event linking to ekev_event_has_course linking to ekev_event_has_course_has_participant
page was failing for some reason, and the logic was not simple, so I want a simpler logic now...)


- ?form
    when form is in _GET, it means that the form should appear on the gui (be it in update mode or insert mode).
    Reminder: the form has only two modes: insert and update.
    We know that we are in update mode only if the ric of the table are present in _GET.
    
    The first problem is being taken care of already :)
    
- relationship
    from brainstorm2 we import some nomenclature terms:
        - pivotLinks: the buttons at the end of the form that link to a child object's page
        - context: we will see about that later
        
    we want to handle all parent/child relationships, so that when you are on the parent form,
    you can click the pivot links and go the related (children) pages.
    The children can be parent of other pages themselves, and so the gui operator should be able
    to navigate all related tables using only pivot links.
    
    Implementation wise, we use the concept of context, which we will define in a moment.
    We pass the context via _GET, and it is then propagated by the morphic tools
    (in particular, there is the area of code related to passing the context via ajax; this is handled
    by the morphic list, it's not our concern, but just be aware of this if you ever want to change things
    in the future).
    
    So again, the context variables are passed via _GET.
    
    
    
To recap, here is how our system work:

- if form is in _GET, this means that the form should be displayed
- if the ric is in _GET, this means that the form is in update mode (otherwise it is in insert mode)
- if the context is in _GET, then the page's objects (list and form) will use it.
        For a list, this means that the source query will be driven by the context.
                select x from a where context_var=$context_value   
        For a form, a control of type choice will be provided.
        In insert mode or in update mode, the context var(s) is/are fixed: they cannot be chosen by the user.
        
        
        
Let's take some fictive examples to see how this set of simple rules work:

Example 1
--------------
Let's imagine two tables:


```txt
ek_shop
-----------------
- id             
- host   

ek_manufacturer
-----------------
- id        
- shop_id        
- name   

```


About the shop
- uri: /shop
    - the shop list is displayed
- uri: /shop?form
    - the shop form in insert mode is displayed, and below is the shop list being displayed
- uri: /shop?form&id=5
    - the shop form in update mode is displayed (updating shop#id=5)
    
Now about the manufacturer    
- uri: /manufacturer?shop_id=5
    - the manufacturers for shop_id=5 list is displayed
- uri: /manufacturer?form&shop_id=5
    - the manufacturer form is displayed in insert mode. Below, the manufacturers for shop_id=5 list is displayed
- uri: /manufacturer?form&shop_id=5&id=3
    - the manufacturer form is displayed in update mode (updating manufacturer#id=3). Below, the manufacturers for shop_id=5 list is displayed
    
    
    
    
Example 2
--------------
Let's imagine two tables:


```txt
ek_user
-----------------
- id             
- pseudo  

ek_user_has_product
-----------------
- user_id: fk to ek_user
- product_id: fk to ek_product        
- order

```


About the user
- uri: /user
    - the user list is displayed
- uri: /user?form
    - the user form in insert mode is displayed, and below is the user list being displayed
- uri: /user?form&id=5
    - the user form in update mode is displayed (updating user#id=5)
    
Now about the user_has_product
- uri: /user_has_product?user_id=5
    - the user_has_product for user_id=5 list is displayed  (notice that the user_id is the context)
- uri: /user_has_product?form&user_id=5
    - the user_has_product form is displayed in insert mode. The user_has_product for user_id=5 list is displayed
- uri: /user_has_product?form&user_id=5&product_id=3
    - the user_has_product form is displayed in update mode (updating #user_id=5&product_id=3). 
        The user_has_product for user_id=5 list is displayed below.
        Notice that the user_id key belongs both to the ric (for the form update) and the context.
   
     


From b2 to b3, changes to:

- /myphp/leaderfit/leaderfit/class-controllers/Ekom/Back/Pattern/EkomBackSimpleFormListController.php

 



The context
---------------
Now we shall be able to define the context.

For a given child table, the context is the part of a ric which identifies the parent table.






    
                    
     

