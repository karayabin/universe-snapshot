Action items
=============
2020-08-24 -> 2020-09-03




We call **action item** the array representation of a [list action](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md).

Note that there can be multiple ways to define a **list action** in an array form, the **action item** is just one of them.


Plugin authors can use the **action item** format if they find it useful, but it's never a requirement.

In realist, we have two types of **action items**:


- [generic action item](#generic-action-item)
- [row action item](#row-action-item)


The **generic action item** is generally used to represent both the **general actions**, and the **list item group actions**,
while the **row action item** is used to represent a **list item action**.

See more about actions in the [list action document](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md).


Generic action item
---------
2020-08-25 -> 2020-09-03





A **generic action item** is an array with two forms:

- the original form 
- the expanded form


The **original form** is an array, as stored in the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/request-declaration.md).

The **expanded form** is the result of the [action handler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/realist-protagonists.md#the-action-handler)'s **prepareListAction** method applied to the **original form**. 



In addition to that, a **generic action item** has one of two types:

- a container type 
- a leaf type

The **container type** can hold other **generic action items**, while the **leaf type** cannot.

The difference between them is that the **container type** has an extra **items** property, which holds the **generic action items**,
whereas the **leaf type** has an **action_id** property which identifies it uniquely.



The **generic action item**'s original form looks like this:


- action_id: string, the identifier of the action. See the [action id](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md) for more details.
 
    This applies only to the **leaf type**. (i.e. it does not apply to items containing other items).
    It's mandatory for items of **leaf type**.
        
    The **action_id** is an arbitrary string chosen by the plugin author.
    
    For instance:
    
    - Light_Kit_Admin.realist-save_table
    - abc
    - makeCoffee
        
        
- ?modal: string. A reference to a html modal to display if this action is triggered by the user.
    This reference will be resolved in the expanded form. 
        
        
        
        
        
        
- text: string, the label of the group or item
- ?icon: string, the css class of the icon (if any)
 
- ?enabled_behaviour: string|js callable = oneOrMore.
    Only if you use the **list-action-handler-helper.js** (lahh) script (See the list action handler helper section below for
     more details).
    Defines when/how this button should be enabled/disabled.
    
    Basically, every time a checkbox is checked/un-checked, a callable is triggered.
    You can define this callable manually, using a javascript callable with the following signature:
    
    - callable ( ricHelper, selectedRics): bool
    
    With:
        - ricHelper being a ric helper instance (see the ric admin table helper tool in this planet for more details (ric-admin-table-helper.js)
        - selectedRics: array of selected rics, each ric being a ric object (map of column => value).
    
    The callable should return whether the button is active (true) or inactive (false).            
                
    Alternately, you can use some special strings, which cover the basic use cases for this enabledBehaviour option.
    The available special strings are:
    
    - oneOrMore: this will basically add/remove the disabled html attribute on the item, depending on how many checkboxes
                        are checked. If no checkboxes are checked, then the disabled attribute will be added.
                        If one or more checkboxes are checked, then the disabled attribute will be removed.
                        This is actually the default value.             
    - always: this item will always be enabled (i.e. no disabled html attribute set).
- ?js_code: string. A reference to a js code to execute if this action is triggered by the user.
    This reference will be resolved in the expanded form.  
                                  
       
    
- ?params: array. An array of extra parameters. Those will be passed to the js code.    
        We use the [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md) idea
        to transmit the parameters.
  








The **generic action item**'s expanded form is the same as the **original form**, except for the following:


- ?modal: string. The html modal content to display if this action is triggered by the user.
- ?js_code: string. 
                                  
    The js code that creates the button behaviour.
    
    We expect the declaration of a function f (that's it), which will be treated by a javascript handler such as the list-action-handler-helper.js script.
    
    Our design decision here is that we write the js functions on the php side
    so that we have a better control over their organization.
            
     
     
     

Row action item
---------
2020-09-03


See the **rendering.list_item_renderer.dynamic** directive of the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/request-declaration.md) for more info.     





