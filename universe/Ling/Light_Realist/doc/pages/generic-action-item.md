Generic action item
===================
2019-09-26


This is just a term to represent either:

- [a toolbar item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md#the-toolbar-item) 
- [a list general action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md#list-general-actions)




A generic action item is an array with the following structure:


- text: string, the label of the group or item 
- ?action_id: string, the identifier of the action. This applies only to the leaves of the tree (i.e. it does not apply to
        items containing other items).    
        The **action_id** has the following format:
        
        - {pluginName}.{actionName}
        
        For instance:
        
        - Light_Kit_Admin.realist-save_table
        
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
- ?js_code: string
            The js code that creates the button behaviour.
            
            We expect the declaration of a function f (that's it), which will be treated by a javascript handler such as the list-action-handler-helper.js script.
            
            Our design decision here is that we write the js functions on the php side
            so that we have a better control over their organization.
            
              
- ?csrf_token: array|null|true: if set, indicates that a csrf protection is desired for that action. The array form is like this:
    - name: the name of the token    
    - value: the value of the token    
    
    We recommend passing the token value as the **csrf_token** [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md) attribute (i.e. data-param-csrf_token),
    because we use the **hep** notation in general, and **csrf_token** is a convention we use to pass the csrf token value via ajax.
    
    You can also use the special value **true**, which, if interpreted correctly, will be turned into the corresponding **array** form
    by some interpreter. This is a syntactic sugar added for the developer's convenience.
     
     
       
    
- ?params: array. An array of extra parameters. Those will be passed to the js code.    
        We use the [hep](https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md) idea
        to transmit the parameters.
- ?right: string. The [permission](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)
            required to access the service (if any).          
- ?micro_permission: string. The [micro-permission](https://github.com/lingtalfi/Light_MicroPermission/)
            required to access the service (if any).          
- ?modal: string. If the toolbar item requires some modal, we can add it with the html of the modal here.  