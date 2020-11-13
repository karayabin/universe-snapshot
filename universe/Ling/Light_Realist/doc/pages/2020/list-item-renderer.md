The list item renderer
================
2020-08-28




The **list item renderer** is responsible for rendering the items of a list.

It's typically used in an ajax script, as the user interacts with the list (for instance sorts the list items by price). 



Typically, **list items** come from a database, in which case we also call them rows, but they could come from any array as well.

A **list item** is composed of **properties**.
It's an array of key/value pairs, the key being the property, and the value being the property's value.




The **list item renderer** can do things such as:
 
- transforming a property value, for instance truncating a very long text, or replacing image links with an actual image
- adding properties dynamically to the **list items**, for instance adding an action property in admin lists  



We provide an interface: **RealistListItemRendererInterface**.

This interface has the following methods:

- addDynamicProperty ( string property, mixed position=post ):void
- setPropertyType ( string property, string type, array options=[] ):void
- setPropertiesToDisplay ( array propertyNames):void
- setRic ( array ric ):void
- render  ( array rows ):string


The goal of this object is to return the list items' html, which might be very specific to the
gui the application uses (for instance bootstrap 4).



Types, the property transformers
----------
2019-08-28 -> 2020-08-27


**Types** (aka property transformers) allow us to transform the content of individual properties.

We can use **type** to transform an image url into an actual html img tag, or create links, or trim a too long content, etc.

**Types** are defined with the **rendering.list_item_renderer.types** property of the 
[request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/request-declaration.md).
 
 




Dynamic properties
----------
2019-08-28 -> 2020-08-28


Dynamic properties are **list item properties** that we add dynamically to the existing ones.


Typically, we fetch the **list item properties** from a database, an in the case of an admin list,
we often need an extra "action" column with some action buttons,
and some kind of checkbox column, which contains a simple checkbox to select the row.

We can add those "action" and "checkbox" properties dynamically.


When you add a dynamic property, you also need to define a **type** for it (see the [Types, property transformer](#types-the-property-transformers)
section for more info).


To add dynamic properties, we can use the **rendering.list_item_renderer.dynamic** directive of the [request declaration](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/request-declaration.md).



It's very common for admin lists to add two dynamic properties: one for the checkbox, and one for the actions.
By convention, they are named **_checkbox** and **_action** respectively.





About setPropertiesToDisplay
-------------
2019-08-28 -> 2020-08-28


This method defines which properties should be displayed. 

There is a difference between the properties you use, and the one you display though.

For instance, a common thing to do with admin list is to provide some row related actions, such as "delete this row".
For such actions, you need the id of the row.
So in this case an action property (for instance) will need to access the id of the row.
 
Ok, but what if you decide for some reason to hide the "id" property from the view?

Well, your action property should still work correctly, that's our opinion on that.
  
In other words, the list items properties that come from your storage (usually a database), and the ones that you display
 are two separate things, although both are accessible via the **list item renderer**.

The **setPropertiesToDisplay** method will define, as the name suggest, which properties are displayed.


   





 




