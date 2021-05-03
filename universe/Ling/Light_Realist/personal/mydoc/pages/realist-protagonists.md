Realist protagonists
============
2020-08-25 -> 2020-08-28




- [the realist service](#the-realist-service)
- [the list renderer](#the-list-renderer)
- [the list item renderer](#the-list-item-renderer)
- [the action handler](#the-action-handler)
    - [More details about the "prepareListAction" method](#more-details-about-the-preparelistaction-method)
- [the ajax handler](#the-ajax-handler)
    - [the realist-request action](#the-realist-request-action)




The realist service
------------
2020-08-25


Class: LightRealistService.

This is the main object. It's the glue between the different protagonists.
It has various methods, such as:


- executeRequestById, the main method used to fetch the list items, usually called via ajax by the renderer
- getConfigurationArrayByRequestId, returns the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md) corresponding to the given request id




The list renderer
----------
2020-08-25

Interface: RealistListRendererInterface.


The **list renderer** is responsible for displaying the skeleton of the list, which is everything related to the list except for the **list items**,
which are fetched via ajax and produced by the [list item renderer](#the-list-item-renderer).

The **list renderer** will display things such as the list title, a pagination system, an advanced search widget, the html table container (if your list is displayed that way), etc...

What it displays depends on your [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md).


The **list renderer** main methods are:

- render: renders the list
- renderTitle: renders the list title
- renderListGeneralActions: renders the [list general actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md), usually in a hamburger menu


Every time you need to render a list, this is your goto object.



The list item renderer
----------
2020-08-25 -> 2020-08-27


Interface: RealistListItemRendererInterface.

The **list item renderer** is responsible for rendering the **list items** of a list.


See the [list item renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-item-renderer.md) page.




 

The action handler
----------
2020-08-25


Interface: ListActionHandlerInterface.

For each [list action](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md), we need to answer the following questions:

- do we display the action trigger? (i.e. does the user have the right to do so)
- how do we display it?
- what do we do when that action is triggered?


To answer all those questions, we provide the **ListActionHandlerInterface** interface.


**ListActionHandlerInterface**:

- doWeShowTrigger ( string actionId, string requestId ): bool
- prepareListAction ( string actionId, string requestId, array &listAction ): void
- execute ( string actionId, array params = [] ): array



It's important to understand that although the interface contains 3 methods, those are called at different
times.

The **doWeShowTrigger** and **prepareListAction** methods are called by the [list renderer](#the-list-renderer) during the main script execution (i.e. the main thread).
The **execute** method on the other hand is called on the ajax thread, and is called by the [ajax handler](#the-ajax-handler).





### More details about the "prepareListAction" method
2020-08-25


The **prepareListAction** is called by the [list renderer](#the-list-renderer), just before rendering the [list actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md).


You might wonder why do we need a **prepareListAction** method.


Remember that the realist philosophy is that we can configure everything from the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md)?

Well, sometimes you cannot store all the information you want in the **request declaration** (or at least it wouldn't be practical).

For instance, some javascript code to confirm that the user really wants to delete the rows, that would really be ugly if written directly in the **request declaration**.


So instead, we write references to that long code in the **request declaration**, and those references are then transformed by the **prepareListAction** to their final form (js code, html code, you name it...).     

Basically, the **prepareListAction** method's goal is to transform the **list actions** defined in the request declaration in a format ready to be used by the **list renderer**.

An example of a **list action** format that allows javascript and html references is the [generic action item format](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/action-items.md#generic-action-item).


### A word about security and the action handler
2020-08-25 -> 2020-08-28


Plugin authors should be well aware that **action handlers** receive their parameters via ajax.

This means that a malicious user can always send their own parameters.

In other words, never trust the parameters that you receive from your **action handlers**.

So for instance, if you create a "delete row" action, with two parameters: rowId and tableName, just make sure whichever rowId and tableName
is passed this won't compromise the security of the application. For instance, you could check that the tableName is allowed by your plugin, 
and make sure the user has the right to execute a "delete" action on this table. 

You can use plugins such as the [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission/) for instance to ensure users have the right to execute the action they want to execute.


Also, it's quite common for developers to create an **action handler** that actually requires some part of the configuration stored in the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md).
An intuitive thing to do is to pass the **requestId** as an action handler parameter, but again the malicious user could change that and pass you unrelated **actionId** and **requestId**.

There are multiple workarounds for this particular situation:

- first, re-consider if you really need the request declaration; maybe you just need one element of that configuration that you can pass a standalone parameter (which you still need to check)  
- second, the safest way to avoid this is probably to bind the **actionId** and the **requestId** together, in other words: your **actionId** should contain the **requestId**
- third, merging the **actionId** with the **requestId** is safe, but also quite impractical as it gives the developer some long actionId to work with, so there is this third workaround:
    our service can check that an **actionId** is available for a given **requestId** (use the **isAvailableActionByRequestId** method of our service).
    This method works like this: it parses your **request declaration** (based on the given requestId), and searches for the declared actions.
    Since the **request declaration** directives might evolve, this technique might evolve as well, but for now it parses the action ids 
    from the following directives:
    - **rendering.list_general_actions**
    - **rendering.list_item_group_actions** 
    
    Since that doesn't cover the [list item actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-actions.md),
    we also have this directive: **action_handler.allowed_actions**, in which you can manually specify the allowed actions for this **request declaration**.
    We've this third mechanism, you've at least the guarantee that the binding between the given **actionId** and the given **requestId** is allowed.
    
    So to recap, the malicious user could still fiddle around by providing an **actionId** with an "unexpected" **requestId**,
    but, assuming all your actions are well secured (using micro permission for instance), he wouldn't be able to 
    actually override a permission that a user isn't granted.
    
    Plus, with this "allow action" mechanism, the malicious user's action window is reduced even more.      
    
    
Hopefully this helps.     
          
    
    
  

  







The ajax handler
----------
2020-08-25



Our service provides its own ajax handler, based on [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler), which offers the following actions (which you can call:

- realist-request



### The realist-request action
2020-08-25


The **realist-request** action fetches the **list items**, and renders them.

It's designed to be used along with a **list renderer**, where the **list renderer** calls the **realist-request** action (via ajax)
to get the **list items** it needs and to inject them in the list.

The communication protocol used between the **list renderer**, and the **realist-request** action is defined in the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/request-declaration.md).


Examples of communication protocol includes:

- [duelist](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/duelist.md)



Note: it is our plan and duty to expand the number of protocols handled by the **realist-request** action, so that every web application use case
is handled.  







