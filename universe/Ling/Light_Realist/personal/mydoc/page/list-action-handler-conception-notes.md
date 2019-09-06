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

- a js init code: which is the js code responsible for not only fetching the data it needs to execute the action, 
    but also, if there is a communication with a server, to inject back the result of the server into the gui.
- the button: which is just the html of the button    
- the execute part: this is optional and is only used if the "list action handler" needs the help of a php server.
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


This interface features the **execute** method:


- execute ( string id,  array params ): array


For the returned array, we propose to use the response format described in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).




The button part
------------

This part is just about returning the html code for the button.
The **LightRealistListActionHandlerInterface** features the getButton method for that.

- getButton ( string id )


Now sometimes you want to dispose the buttons in a certain manner; for instance you want to group all the buttons related to exporting the data in a button group dropdown.
We use a button disposer object for that, and provide a **LightRealistListActionToolbarRendererInterface** that you can implement, it will create the actual html of the whole tool bar.

It features the following method:

- getToolbar ( array groups ):string


The groups parameter being an array of items.
An item is either a group of buttons or a standalone button.
The structure of an item is the following:

- text: string, the label of the group or item 
- ?action_id: string, the identifier of the action. This applies only to the leaves of the tree (i.e. it does not apply to
        items containing other items).    
- ?icon: string, the css class of the icon (if any)
- ?items: An array of children items (recursively). Only if this item is a container (aka group) for other items. 
- ?enabledBehaviour: string|callable = oneOrMore.
        Only if you use the **list-action-handler-helper.js** (lahh) script (See the list action handler helper section below for
         more details).
        Defines when/how this button should be enabled/disabled.
        
        Basically, every time a checkbox is checked/un-checked, a callable is triggered.
        You can define this callable manually, using a javascript callable with the following signature:
        
        
        - callable ( ricHelper, selectedRics )
        
        With:
            - ricHelper being a ric helper instance (see the ric admin table helper tool in this planet for more details (ric-admin-table-helper.js)
            - selectedRics: array of selected rics, each ric being a ric object (map of column => value).
            
        Alternately, you can use some special strings, which cover the basic use cases for this enabledBehaviour option.
        The available special strings are:
        
        - oneOrMore: this will basically add/remove the disabled html attribute on the item, depending on how many checkboxes
                            are checked. If no checkboxes are checked, then the disabled attribute will be added.
                            If one or more checkboxes are checked, then the disabled attribute will be removed.
                            This is actually the default value.             
        - always: this item will always be enabled (i.e. no disabled html attribute set).
         
    
 
 






The js init code part
------------

This part is about handling the javascript side associated with the button behaviour.

It's returning the js code necessary to transmit and process the data properly.

More precisely, the js code to:

- If necessary, collect the data from the current page, and send it to the server if it helps
- Execute the appropriate (button) action. If a server was used, this includes treating and processing the server response.
- It also handles the button state: whether it's enabled or disabled (typically it's enabled when at least one row is selected,
   and disabled when no rows are selected at all).


The **LightRealistListActionHandlerInterface** features the getJsInitCode method for that, which either returns the js code to execute,
or null if there is no js init code necessary, or if the instance injected the js init code with another mean (i.e. with a tool like [html page copilot](https://github.com/lingtalfi/Light_HtmlPageCopilot) for instance).

Note: I personally prefer to not use the copilot for small js codes like that, and put them inline just below the html button,
as it's easier to debug (we can just inspect the code and see the script below the button)

 
- getJsInitCode ( string id ): string|null




The list action handler js helper
---------------

We provide a **list-action-handler-helper.js** script in this planet, so that you save some time will
implementing your own list actions.





