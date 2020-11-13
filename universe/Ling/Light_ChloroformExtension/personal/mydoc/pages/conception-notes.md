Light_ChloroformExtension conception notes
==============
2019-11-14 -> 2020-09-25



The idea of this plugin is to bring extra chloroform fields to the dev fingertips.
The particularity of those fields is that they use part of the light framework.


Note: if I could go back in time, I would probably have incorporated the [Light_AjaxFileUploadManager](https://github.com/lingtalfi/Light_AjaxFileUploadManager) plugin
as a light chloroform extension, because it fits the description, but hey that's too late.



Below is the description of the fields that you can find in this planet.


Each Field class can be used as a standalone class (i.e. that you instantiate manually), or you can use a **configuration item**
to configure it from a [babyYaml](https://github.com/lingtalfi/BabyYaml) file. 
This is explained in each field's section.



Note: a renderer you might be interested in is the [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer), which is perfectly capable of 
displaying all the fields found in our plugin.





TableListField
---------------
2019-11-14 -> 2020-09-24


The idea of this field is to provide a list (like a html select) of items coming from a database table.

The table must have a unique identifier (i.e. a [ric](https://github.com/lingtalfi/NotationFan/blob/master/ric.md) with one column only),
so that we can feed the control with that value.




For the rendering, we actually have two options:

- either using a html select (recommended when the number of items you want to display is not very big)
- or using an auto-complete input (recommended when you have too many items to display, since a html select might become slow if you try to put too much data in it)


We also provide an automatic mode (by default), which chooses the type of display depending on a threshold number (default=200).
So for instance, in auto-mode if your list contains 200 items or fewer, a html select will be displayed. If it contains more than 200 items, the auto-complete control will be used.


A thing to bear in mind with the auto-complete system is that it involves an ajax request, and because of that we need to be careful with security.

This is all explained in greater details in the configuration section below.

The big picture, as you can probably guess, with ajax is this:

- the auto-complete field sends a **nuggetId** to our **ajax handler**
    - see the [Light_Nugget conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md) for more details about **nuggetId**.
    - see the [Light_AjaxHandler conception notes](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/conception-notes.md) for more details about **ajax handler**.
- our **ajax handler** then reads the configuration (see the configuration section below for more details), and returns the rows to display, according to the user's provided **search expression**    





In terms of Field instance configuration, we use a **configuration item**, described below.

The location of this configuration item is defined by either of those (Field) properties:

- tableListIdentifier: string, a nuggetId identifying the **configuration file**. See more details about nuggetId in the [Light_Nugget conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md).
    With this technique, your configuration item is written in a dedicated configuration file in **app/config/data/YourPlugin/Light_ChloroformExtension/tablelist/some_id.byml**
    
- tableListDirectiveId: string, the [Light_Realform](https://github.com/lingtalfi/Light_Realform) nuggetDirectiveId identifying the **configuration item**. See more details in the [Light_Nugget conception notes](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md).
    With this technique, your configuration item is written directly in the realform configuration, in **app/config/data/YourPlugin/Light_Realform/form/some_id.byml**.
    See the [configuration file section of the Light_Realform conception notes](https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/2020/conception-notes.md#the-configuration-file) for more details.
    

                





### Configuration item
2020-09-10 -> 2020-09-25


The behaviour of the **table list field** is defined in the configuration.

We use the [nugget](https://github.com/lingtalfi/Light_Nugget) system, as mentioned before.

The configuration looks like this:



- renderAs: string (adapt|select|autocomplete) = adapt.
    Defines how the control should be displayed.
    - if **select** is chosen, a html select should be used.         
    - if **autocomplete** is chosen, an autocomplete input should be used.       
    - if **adapt** is chosen, this depends on the number of items in the list.
    If the number of items is greater than the threshold (see the **threshold** directive),
    then the **autocomplete** system is used, otherwise, the **select** system is used.       


- threshold: int=200, used only when the **renderAs** directive is set to adapt. 
    See the **renderAs** directive for more details.
    


- sql: the sql query to fetch the items that you want.
    Your query must return two columns named **value** and **label**, in that order. For instance: 
   
    - select id as value, first_name as label from user_table
    - select id as value, concat(id, ".", first_name) as label from `user_table`
    
    The following tags are available:
        - {userId}: will be replaced with the current user id, assuming a valid [website user](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
        
        

- security: a [basic security nugget](https://github.com/lingtalfi/TheBar/blob/master/discussions/basic-security-nugget.md)


- column: the name of the column that this control represents.
        It's used to access the default value to display when the form is in update mode.
            
- search_column; the "column" to search in when the user types a request.
            For instance:
                - concat(id, '. ', name)                                          
                



Example of configuration item:

```yaml


sql: select id as value, concat(id, '. ', pseudo) as label from lud_user
column: id
search_column: concat(id, '. ', pseudo)

renderAs: adapt
threshold: 200


security:
    any:
        permission: Light_Kit_Admin.admin
        micro_permission: store.lud_user.read
    all:



```




### The multiplier mode
2019-12-04 -> 2020-09-11



Temporarily removed when I was redesigning the api for the sake of simplicity. I should re-add this later, when
the concrete need for it re-appears. 


The **table list** field can also work in what we call the **multiplier** mode.
The idea of the multiplier mode comes from the [form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md),
where basically the goal is to insert multiple rows at once in a database, for gui efficiency.

So we can tell the **table list** field to be the **multiplier** column by setting its mode to **multiplier**.
 
This is done via the properties.

When in multiplier mode, the table list field value becomes an array, and we need to provide a **where** column too (as a property).

But what's that **where** column and what value should we put in it?


Imagine a concrete example where we have a database schema with 3 tables:

- user
- user_has_permission_group
- permission_group


And right now, we are in the process of editing the **user_has_permission_group** table via a form.
The form has the following fields:

- user_id
- permission_group_id


Both are table list fields.
We want to provide the user with an enhanced gui, and so we turn the **permission_group_id** column into the **multiplier** mode,
so that the user can basically bind multiple permission groups to the same user id in one move.

That's fine and the user is able to insert a few records in the **user_has_permission_group** table, for instance those ones:

- 
    user_id: 5
    permission_group_id: 2
- 
    user_id: 5
    permission_group_id: 6
- 
    user_id: 5
    permission_group_id: 7


Some time later, the same user wants to edit one of the relationship she has created, for instance (5-7).

So, she opens the form in update mode. In update mode, the values (in this case 5-7) are passed to the chloroform manager,
usually via the url, so that they can be used to fetch the corresponding row in the database, and so that we can populate the 
form with the values of the row.

If we didn't use the multiplier mode for any of our columns, we would then just have those default values in update mode:

- user_id: 5
- permission_group_id: 7

But because the **permission_group_id** is in multiplier mode, it's an array of bindings, and so we must now show all the
rows bound to the **user_id** column:


- user_id: 5
- permission_group_id: 
    - 2
    - 6
    - 7
    
    
Therefore, we need to make an extra query to the database.
When the values (5-7) are passed via the url (in update mode), we do this sql query:

- select id from user_has_permission_group where user_id=5

And so, the **where** column in multiplier mode is that pivot column, which is **user_id** in our example.


So in terms of chloroform properties, to configure the table list to work in multiplier mode, we need those two properties:

- mode: multiplier (fixed value)
- multiplier: configuration array to use in case mode=multiplier 
    - table: the name of the **has** table to use (i.e. the has table, in our example: user_has_permission_group)
    - where_column: the name of the pivot column used in update mode to fetch the initial values (i.e. user_id in our example)
    - multiplier_column: the name of the multiplier column used in update mode to fetch the initial values (i.e. permission_group_id in our example)


     


 








 


















 






 





