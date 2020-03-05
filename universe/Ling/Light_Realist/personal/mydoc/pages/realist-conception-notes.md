Realist conception notes
======================
2019-08-28



Overview
===========

The goal of realist is to be the medium between the developer and the (my)sql database as far as fetching rows 
is concerned.


The main idea behind realist is to use a single interface: a [babyYaml](https://github.com/lingtalfi/BabyYaml) file,
so that the developer knows exactly where to look when he wants to change anything related to the list.



There are three sides in realist:

- the model
- the gui


Note: in the implementation the boundary between those two sides is sometimes blurry, so be forgiving.


The model part is described by the [duelist idea](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md).


So basically the babyYaml file contains one or more **request declaration(s)**, and each **request declaration** controls the parameters
for one list.

A **request declaration** is an array of so-called settings.

In addition to the duelist idea, realist provides the following settings:  

- **rendering**: used to control the gui side (see more details in the **Rendering** section below) 
- ...(miscellaneous) 








   
Rendering
===========

The **rendering** setting basically let us control (at least partially) the gui side of the list.

See an example later in this document.

 
 
 

List renderer
-------------

A list renderer is basically the object which displays the list structure, including all gravitating widgets, such as the pagination,
the search widget, etc...

If we use an ajax based rows generator (which we recommend for admin tables), then the inner rows are generated separately
by a specialized object called the "rows renderer".







Rows renderer
--------------

We basically provide an interface for rendering rows: **RealistRowsRendererInterface**.

This interface has the following methods:

- addDynamicColumn ( string colName, mixed position=post ):void
- setColumnType ( string colName, string type, array options=[] ):void
- setRic ( array ric ):void
- render  ( array rows ):string


The goal of this object is to return the html for the rows, which might be very specific to the
gui the application uses (for instance bootstrap 4).

Each column can have a type, which basically dictates how to render that particular column.

Most of the columns have regular text content, but sometimes we can have image that we would like
to render as img tags, or arrays that we would like to display as a list, or other things...



### Types, the column transformers

Types (aka column transformers) allow us to transform the content of individual columns.
We can use type to transform an image url into an actual html img tag, or create links, or trim a too long content, etc.

Types are defined in the **rendering.rows_renderer.types** section, which is an array of type => typeConf.

With type being the name of the **type** (defaults to the value "text"), and **typeConf** being an array with the following structure:

- type: the type identifier, it helps identifying the plugin who will generate the transformation, and also indicate
        the type of transformation to execute. 
        We recommend that the type identifier has the following notation:
            - {pluginName}.{transformType}
        With:
            - {pluginName}: the plugin name            
            - {transformType}: an arbitrary string used by the plugin to know which type of transformation to apply            
- ...(other parameters, which might be used depending on the type of transformation)


In realist, our base renderer provides a few built-in types, including:

- Light_Realist.image, to transform an url into an html image tag            
- Light_Realist.hub_link, to create a link using the [controllerHub](transformType) service           
- Light_Realist.checkbox, to create an [Open Admin Table One](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-helper-implementation-notes.md) compliant checkbox (containing the ric info)

See more in the code source of [the BaseRealistRowRenderer object](https://github.com/lingtalfi/Light_Realist/blob/master/Rendering/BaseRealistRowsRenderer.php).         





### Dynamic columns

Sometimes, we need to decorate the rows.

For instance, in an admin list, we often have an extra "action" column with some action buttons,
and/or we also have a checkbox column, which contains a simple checkbox to select the row.

One way of decorating the rows is to use dynamic columns.
Dynamic columns are columns that are dynamically added to the existing rows.


Two common dynamic columns for admin lists are "checkbox" and "action".


# Checkbox and Action special columns


In the **rows_renderer** settings, we have two special properties:

- checkbox_column
- action_column

Both share similar characteristics:

- they are an array containing the following entries:
    - name: the name of the dynamic column
- if they are defined, they indicate that the dynamic column should be used, otherwise if they are not defined,
        they indicate that the dynamic column shouldn't be used.    


The default name for the checkbox dynamic column is checkbox.
The default name for the action dynamic column is action.

Note: the default name is used as long as you don't define the the checkbox_column.name or action_column.name specifically. 




# About ric implementation

We recommend to use the [ric admin table helper](https://github.com/lingtalfi/JRicAdminTableHelper) js tool to handle
your ric related actions, but you can use any tool really. 
 
 
 
Hidden columns
--------- 
2019-11-12

Hidden columns are columns hidden from the view, but which data is still available.


### Why did I implement hidden columns ?

I needed them when I wanted to create enhanced columns (aka crossed columns).

For instance, instead of displaying just the user_id (which was to my opinion not very useful for the administrator),
I wanted to display the user id AND the user pseudo or email.

So I replaced the basic user_id column with the enhanced user_id_plus column.

The problem in those admin tables, is that then when you need to do some actions on a row selection (for instance
if you want to print a set of selected rows, or delete them, or even add a link based on the ric), you need the ric information
of the row. 
So if the user_id is part of the ric (and it was in my case), replacing the user_id with the user_id_plus column caused the ric
to be lost. 

So my workaround to this problem was to hide the user_id column from the view rather than replacing it.
Yet the user_id information is still in the row, and so the ric being available in the html of the checkbox (at least
with my Bootstrap4AdminTable renderer), it was quite easy to hide columns, and still have the ric information available
for the rest of the gui.  


 
 
 
Cheatsheet for the developer
------------------------
There are two sides to the realist:

- server side
    - to add custom column actions, override BaseRealistRowsRenderer (call setRealistRowsRendererGroup from the service configuration)
    - to add custom multiple rows actions, TODO...
- gui side
    - to setup the renderer, TODO...





List action groups
-----------------
2019-09-06


We suggest using the [list action handler conception notes](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/list-action-handler-conception-notes.md).   



List general actions 
-----------------
2019-09-25


Same as list action groups, except that they are using a **ListGeneralActionHandler** object to handle them.
The array structure used is the [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md). 


### Button markup
 
We recommend that a list general action button has the following markup:

- lgah-button: this css class should be added to the button/link.  
- data-action-id: this html attribute should be set, with the value being the value of the **action_id**.


We provide a **list-general-action-handler-helper.js** tool to help with the implementation.
      
      
### Js code

The callable is the function f, same as for the list action handler, but the arguments are different:


- function f (jTrigger, jContainer, params);

With:

- jTrigger: the jquery element clicked by the user to trigger the action
- jContainer: the jquery element containing this realist gui
- params: the hep params bound to the jTrigger. More about hep parameters here: https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md


      
      
      
Related links
--------------
2019-10-28    


The related links section contains a list of related links.

Each link is an array: 
- text: the label of the link
- url: the url of the link
- ?icon: the css class of the icon if any

Because realist uses [duelist](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md) under the hood, you can use the dynamic injection notation from duelist
to specify your url as routes, as in the example below:
  
```yaml
related_links:
    -
        text: Add new user
        url: REALIST(Light_Realist, route, lka_route-user_add)
        icon: fas fa-plus-circle
```



Title
---------
2019-10-28


A list can have a title.
We can specify the title using the "title" entry.



Miscellaneous
============
2019-10-30


In this section, I present to you the "other" settings, that are not part of the duelist specification and not part of the rendering section.

- csrf_token: bool=true. Whether to protect the list against csrf attacks, using the [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple) service.
            
- plugin: string, the name of the plugin handling this realist request declaration.
        So far, it's used only as a prefix for micro-permission (see the use_micro_permission setting below).
        It might also be used by third party plugins as the handler of micro-permissions in general (for instance can the user delete rows in this table?),
        but that depends on the plugin.
        
- use_micro_permission: bool=true, whether to use the micro permission checking.
        We use the [micro permission notation recommendation for database](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction).
        Since realist just provides access to the data, we check against the following micro-permission:
        
        - {pluginName}.tables.{table}.read
        
        With:
            - pluginName: the plugin string defined in the plugin setting (described just above)
            - table: the name of the table defined in the table setting (part of the duelist spec)
        
        
        
                
            






A full realist requestDeclaration example
====================
2019-09-25 -> 2019-11-13


Below is an example inspired from the [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin.

The comments in it are part of the documentation.


```yaml
default:
    table: lud_user
    ric:
        - id
    base_fields:
        - id
        - identifier
        - pseudo
        - avatar_url
        - extra

    order: []
        col_order: $column $direction
    where: []
        general_search: <
            id like :%expression% or
            identifier like :%expression% or
            pseudo like :%expression% or
            avatar_url like :%expression% or
            extra like :%expression%
        >
        generic_filter: $column $operator :operator_value

        open_parenthesis: (
        close_parenthesis: )
        and: and
        or: or

        generic_sub_filter: $column like :%operator_value%
        in_ids: id in ($ids)

    limit:
        page: $page
        page_length: $page_length

    options:
        wiring: []
        default_limit_page: 1
        default_limit_page_length: 20
        tag_options:
            generic_filter:
                operator_and_value:
                    source: operator
                    target: operator_value



    plugin: Light_Kit_Admin
    use_micro_permission: true
    csrf_token:
        name: realist-request
        value: REALIST(Light_Realist, csrf_token, realist-request)
    rendering:
        title: User list
        list_general_actions:
            -
                action_id: Light_Kit_Admin.realist-generate_random_rows
                text: Generate
                icon: fas fa-spray-can
                csrf_token: true
            -
                action_id: Light_Kit_Admin.realist-save_table
                text: Save table content
                icon: fas fa-download
                csrf_token: true
            -
                action_id: Light_Kit_Admin.realist-load_table
                text: Load table content
                icon: fas fa-upload
                csrf_token: true

        list_action_groups:
            -
                action_id: Light_Kit_Admin.realist-print
                text: Print
                icon: fas fa-print
                csrf_token: true
            -
                action_id: Light_Kit_Admin.realist-delete_rows
                text: Delete
                icon: far fa-trash-alt
                csrf_token: true
            -
                text: Share
                icon: fas fa-share-square
                items:
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_ods
                        icon: far fa-file-alt
                        text: OpenOffice ods
                        csrf_token: true
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_xlsx
                        icon: far fa-file-excel
                        text: Excel xlsx
                        csrf_token: true
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_xls
                        icon: far fa-file-excel
                        text: Excel xls
                        csrf_token: true
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_html
                        icon: far fa-file-code
                        text: Html
                        csrf_token: true
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_csv
                        icon: fas fa-file-csv
                        text: Csv
                        csrf_token: true
                    -
                        action_id: Light_Kit_Admin.realist-rows_to_pdf
                        icon: far fa-file-pdf
                        text: Pdf
                        csrf_token: true


        list_renderer:
            identifier: Light_Kit_Admin
        responsive_table_helper:
            collapsible_column_indexes: admin
        open_admin_table:
            widget_statuses:
                debug_window: true
                global_search: true
                advanced_search: true
                toolbar: true
                table: true
                head: true
                head_sort: true
                checkbox: true
                neck_filters: true
                pagination: true
                number_of_items_per_page: true
                number_of_rows_info: true
            data_types:
                id: number
                identifier: string
                pseudo: string
                avatar_url: string
                extra: string
                actions: action

        # An array of the column labels.
        # Notice that we set the label for the action column, but not the checkbox column.  
        # That's at least how the Bootstrap4AdminTable renderer works (your mileage might vary).  
        column_labels:
            id: "#"
            identifier: Identifier
            pseudo: Pseudo
            avatar_url: Avatar url
            extra: Extra
            actions: Actions

        # An array of column names.
        hidden_columns:
            - user_id
            - permission_group_id


        rows_renderer:
            identifier: Light_Kit_Admin
#                class: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer

            # The rows renderer types (aka column transformers). 
            # See the dedicated section above in this document for more info.        
            types:
                avatar_url:
                    type: image
                    width: 100
                action: 
                    type: Light_Realist.hub_link
                    text: Edit
                    url_params_add_ric: true
                    url_params:
                        controller: Generated/LudUserHasPermissionGroupController
                        m: f
                user_id_plus:
                    type: Light_Realist.hub_link
                    text: null
                    url_params_add_keys:
                        id: user_id
                    url_params:
                        controller: Generated/LudUserController
                        plugin: Light_Kit_Admin
                        m: f

                checkbox: checkbox
            # This key must be present if you use the checkbox dynamic column. 
            checkbox_column: []
#                name: checkbox
            # This key must be present if you use the action dynamic column.
            action_column: []
#                name: action
        related_links:
            -
                text: Add new user
                url: REALIST(Light_Realist, route, lka_route-user_profile, {type: form})
                icon: fas fa-plus-circle





```

