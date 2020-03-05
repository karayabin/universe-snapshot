Light_ChloroformExtension conception notes
==============
2019-11-14



The idea of this plugin is to bring extra chloroform fields to the dev fingertips.
The particularity of those fields is that they are use the light framework more or less.


Note: if I could go back in time, I would probably have incorporated the [Light_AjaxFileUploadManager](https://github.com/lingtalfi/Light_AjaxFileUploadManager) plugin
as a light chloroform extension, because it fits the description.
But hey, that's too late.



Below is the description of the fields that you can find in this planet.


Note: a renderer you might be interested in is the [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer), which is perfectly capable of 
displaying all the fields found in our plugin.





TableListField
---------------
2019-11-14


The idea of this field is to provide a list (like an html select) of items coming from a database table.
But the actual rendering depends on the number of items:

- if the number of items to display is less than 200 (configurable number), then a regular html select is used 
- if the number of items to display is more than that threshold, then an auto-complete control is used


That's because if you have too many items, a regular html select starts very being slow: we don't want that.


To make that work, you have to configure the TableListField, so that it can execute both sql queries:

- the count request (aka count sql query),
- the actual request to fetch the list items

Basically what we need to do is to create a sql query that returns two columns: the value and the label, in that order.
 
This is done by creating a configuration item (see the configuration item section below) in your plugin configuration.
Then choose an identifier to reference that configuration item, and eventually inject that identifier in the TableListField instance.

Security note: the identifier will be transmitted over http in case the auto-complete method is chosen.

Convention: because light is an environment using plugins, the identifier always uses this notation:

- {pluginName}.{pluginSpecificIdentifier}

For instance:

- MyPlugin.blabla



From then, either the html select is chosen, in which its displayed by the renderer,
or there are too many rows, in which case an ajax service (provided by this plugin) is called and returns the items
to display in the auto-complete control.


### Configuration item

Your plugin is responsible for providing the configuration item (referenced by the identifier).
In order to do that, your plugin needs to provide an object implementing the **TableListFieldConfigurationHandlerInterface**
interface.
This object basically returns a **configuration item** which structure is the following:

- fields: string representing the fields to fetch, as they are written in the sql query.
            It should yields two columns: value and label. You might use aliases to achieve that.

            For instance:
           
                - id as value, first_name as label
                - id as value, concat(id, ".", first_name) as label 
                
- table: the complete name (i.e. with alias if necessary) of the table used in this request
            For instance:   
            
                - lud_user
                - `lud_user`
                - lud_user u
                
            Notice: if you need backquotes, write them manually (like in the second example above).

- column: the target column, used to select the row. In particular, this is used to get the
            formatted default value when in ajax mode (when there are too many items for a regular select).
            
- search_column; the "column" to search in when the user types a request.
            For instance:
                - concat(id, '. ', name)                                          
                
- ?joins: string representing the joins part of the query.
            For instance:
            
                - inner join lud_user u on u.id=h.user_id
                                
- ?where: string representing the where part of your sql query (if necessary). The where keyword is excluded.
            For instance:
            
                - id>50 and id<5000



### The multiplier mode
2019-12-04


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


     


 








 


















 






 





