Light_ChloroformExtension conception notes
==============
2019-11-14 -> 2020-11-19



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
2019-11-14 -> 2020-11-19


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

- ?multiplier: array. If you use the [multiplier mode](#the-multiplier-mode), then you need to configure this item.
    The configuration of the multiplier array is explained in the multiplier mode section.                 





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
        permission: Ling.Light_Kit_Admin.admin
        micro_permission: store.lud_user.read
    all:



```




### The multiplier mode
2019-12-04 -> 2020-11-19

The **TableListField** control implements the [form multiplier trick](https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md),
In order to configure a field to be **multiplied** (see the form multiplier trick doc for more details), you need to add the multiplier property on the field you want to be **multiplied**.

The multiplier configuration array looks like this:

- multiplier:
    mode: string (has|own|off = off). Defines which mode to use. "off" means that we don't use the multiplier.
    ?pivot: string, the name of the pivot column. This is only required if you're using the **has** mode.
    
    





     


 








 


















 






 





