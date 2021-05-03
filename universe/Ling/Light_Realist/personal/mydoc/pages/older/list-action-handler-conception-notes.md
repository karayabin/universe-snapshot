List action handler conception notes
=========================
2019-09-05


Above the list (aka html table), we often have some kind of toolbar with some buttons in it.

Those buttons allows us to perform various actions, generally on a pre-made selection of rows, but not only.

So for instance we can have a "print" button, or a "delete selected rows" button, or an "export to pdf" button,
an "export to csv", you get the idea.


In the realist context, the actions of those buttons are referred to as "list actions", and a "list action handler"
is a php object that handles the implementation of such a button in the realist system.



A **list action handler** is composed of three parts:

- a js action: a js callable which handles the action of the button, including fetching/processing the data from a server if required.
            This callable is triggered when the button is clicked.
- the button: which is just the html of the button. This is handled by a renderer. 


- the execute part:  this is optional and is only used if the "list action handler" needs the help of a php server.
        If that's the case, the execute part is the php code that does the job and return the appropriate response.
        
        
        
Rather than implementing this from scratch on your own, we have some tools to help you with the implementation.

Those will be listed here below.              



The php part
---------------

In order to create a php service, one can implement the **LightRealistListActionHandlerInterface**.

Do not confound this interface with the LightRealistActionHandlerInterface, which handles actions for specific rows.

Note: we created another interface to make the distinction between the both types of actions clearer: one being 
specialized in specific rows actions, while the **list action handler** interface acts at a more general level, on all the 
selected rows and/or on the list in general.



The button part
------------

This is handled by a renderer.
We provide a group of toolbar items.
See the toolbar item section later in this document for more information.

    
 
 
### Button markup
 
We recommend that an action button (i.e. not a button container) has the following markup:

- lah-button: this css class should be added to the button/link.  
- data-action-id: this html attribute should be set, with the value being the value of the **action_id**.   






The js action callable
------------

This callable is triggered when the corresponding button is clicked.
The **LightRealistListActionHandlerInterface** features the **decorate** method for that, which adds the js_code property to the list action item.



### But what js code exactly?

It turns out we settled for an eval variant named Function (https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function).
Apparently it's just a more efficient than eval.

We are not afraid of eval, since our php objects provide the content of the function (and so if the content of those functions
were already corrupted in anyway, eval would be the least of our problems, as the server would be already corrupted in the first place). 

And so we are able to let developer use this simple declaration (naming the function "f" is actually required, any other name would fail):

```js
function f (jBtn, rics, jContainer, jTable, params){
    //
}


```

The parameters are:

- jBtn: the jquery object representing the clicked button
- rics: an array of ric (each ric being a map of columnName => value)
- jContainer: the jquery object representing the list container
- jTable: the jquery element representing the main table (containing the data rows)
- params: an array of extra parameters passed via the toolbar item (see the toolbar item section later in this document)








The list action handler js helper
---------------

We provide a **list-action-handler-helper.js** script in this planet, so that you save some time will
implementing your own list actions.
This tool implements all the recommendations of this document. 







The toolbar item
-------------------

A toolbar item represents either a group of buttons or a standalone button.

The structure of such an item is the same as a [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/generic-action-item.md),
except that it can also have "parent" items.
A **parent** item is an item that contain other items (recursion allowed), using the following extra key:

- ?items: An array of children items (recursively). Only if this item is a container (aka group) for other items.

A parent item doesn't have the **action_id** key.



    
    
To help with the js implementation, the realist planet has some dependencies to some js tools that you can use out of the box:

- [JAcpHep](https://github.com/lingtalfi/JAcpHep)
    
    
Note: you still need to include the assets manually, but the aforementioned js tool planet(s) will be imported along with the Light_Realist planet.
    
    
    
    
        









    
         