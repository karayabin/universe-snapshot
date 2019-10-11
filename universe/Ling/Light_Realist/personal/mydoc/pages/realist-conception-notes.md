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








   
Rendering
===========

The **rendering** setting basically let us control (at least partially) the gui side of the list.

It looks like this (all properties are optional):


```yaml
rendering:

    # this section configures the list renderer. See the list renderer section below for more info.
    list_renderer:
        identifier: string
    
    # the list general actions. See the "List general actions" sections for more details 
    list_general_actions:
        -
            action_id: Light_Kit_Admin-generate
            text: Generate
            icon: fas fa-print
          csrf_token:
                name: Light_Kit_Admin-list_action-generate
                value: REALIST(Light_Realist, csrf_token, Light_Kit_Admin-list_action-generate)
            params:
                url: REALIST(Light_Realist, route, lah_route-ajax_handler)
                ajax_handler_id: Light_Kit_Admin
                ajax_action_id: Light_Kit_Admin-generate_random_rows
                request_id: Light_Kit_Admin:lud_user
            right: Light_Kit_Admin.admin
        
    # The list action groups, see the list action groups section below for more details
    list_action_groups:
        -
            action_id: Light_Realist-delete_rows
            text: Delete
            icon: far fa-trash-alt
        -
            text: Share
            icon: fas fa-share-square
            items:
                -
                    action_id: Light_Realist-rows_to_csv
                    icon: far fa-envelope
                    text: Csv


    
    # the column labels is a piece of information that can be used by any renderer. 
    column_labels: array of column => label

    open_admin_table: # control parameters related to the open admin table (see the open admin table protocol for
                      # more information: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md)
        use_global_search: bool=true. Whether to use the global search widget (aka general_search). 
        use_advanced_search: bool=true. Whether to use the advanced search widget.
        use_number_of_rows: bool=true. Whether to use the number of rows widget.  
        use_checkbox: bool=true. Whether to use the checkbox widget.
        use_neck_filters: bool=true. Whether to use the neck filters widget.
        use_debug_window: bool=false. Whether to use the debug window widget.

  
    # If you use the responsive table helper tool, you can configure some of its properties
    # directly from the realist configuration (if your concrete renderer can handle it).
    # https://github.com/lingtalfi/JResponsiveTableHelper
    # In fact, since this tool is so useful, we've included it in the Light_Realist distribution,
    # so that it's already there when you import the Light_Realist planet.
    responsive_table_helper:
        collapsible_column_indexes: [] # it could be also a string, see the documentation for more details.
                

    rows_renderer: # defines how the rows will be rendered (more info in the rows renderer section later in this document)
        identifier: string=default. This is an alias for class.
                You can use this instead of the class property.               
        class: string. The RowsRendererInterface class to use (or alternately use the identifier property). This is optional, and the application might provide a default value.
                In which case this would just be used to override the renderer when needed.
        types:
            $columnName: string|array. It it's a string, it's the type. It can also be a dynamic column (like "action" for instance) 
                If it's an array, it must contain the following properties:
                - type: string. The type of the column.
                - ...(the options to use, depending on the type)
            - ...(add your custom types here)
    
        checkbox_column: # The special "checkbox" dynamic column settings. See the "Rows renderer" section below.
                         # It basically prepends a checkbox column to each returned row.  
                         # Remove this key entirely (or comment it) to not use this system  
            name: string=checkbox. The column name in the row. 
            label: string=#. The label to use in the gui.

        action_column: # The special "action" dynamic column settings. See the "Rows renderer" section below.
                       # It basically appends an "action" column to each returned row. 
                         # Remove this key entirely (or comment it) to not use this system 
            name: string=action. The column name in the row.
            label: string=Actions. The label to use in the gui.

        
         
```
 
 
 
 

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

- addDynamicColumn ( string colName, string label, mixed position=post ):void
- setColumnType ( string colName, string type, array options=[] ):void
- setRic ( array ric ):void
- render  ( array rows ):string


The goal of this object is to return the html for the rows, which might be very specific to the
gui the application uses (for instance bootstrap 4).

Each column can have a type, which basically dictates how to render that particular column.

Most of the columns have regular text content, but sometimes we can have image that we would like
to render as img tags, or arrays that we would like to display as a list, or other things...

### Dynamic columns

Sometimes, we need to decorate the rows.

For instance, in an admin list, we often have an extra "action" column with some action buttons,
and/or we also have a checkbox column, which contains a simple checkbox to select the row.

One way of decorating the rows is to use dynamic columns.
Dynamic columns are columns that are dynamically added to the existing rows.


Two common dynamic columns for admin lists are "checkbox" and "action".


# Checkbox and Action special columns

And so realist being a practical tool, we've added them as options directly into the **rendering.rows_renderer** setting.

Note: the default (column) names for "checkbox" and "action" special columns are "checkbox" and "action", which might
interfere with your own columns in the sql query. When this happens, we recommend that you use sql aliases to rename
your columns rather than changing the name of the dynamic column in the **request declaration**.

That's because in the background, the **BaseRealistRowsRenderer** object provides a special action for the "checkbox" type.
So if you change the "checkbox" name, the **BaseRealistRowsRenderer** object won't be triggering the checkbox rendering
automatically.


Also note that if you are using the **open_admin_table** setting, you have to manually ensure that the 
**rendering.open_admin_table.use_checkbox** option and the **rendering.rows_renderer.checkbox_column** are synced together,
otherwise you might experience weird things...  


# About ric implementation

We recommend to use the [ric admin table helper](https://github.com/lingtalfi/JRicAdminTableHelper) js tool to handle
your ric related actions, but you can use any tool really. 
 
 
 
 
 
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


      



A full realist requestDeclaration example
====================
2019-09-25 -> 2019-10-11


Taken from the Light_Kit_Admin plugin (still under construction at the moment when I write those lines):


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



    csrf_token:
        name: realist-request
        value: REALIST(Light_Realist, csrf_token, realist-request)
    rendering:
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
        column_labels:
            id: "#"
            identifier: Identifier
            pseudo: Pseudo
            avatar_url: Avatar url
            extra: Extra
            actions: Actions
        rows_renderer:
            identifier: Light_Kit_Admin
#                class: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistRowsRenderer
            types:
                avatar_url:
                    type: image
                    width: 100
                action:
                    type: lka_generic_ric_form_link
                    text: Edit
                    route: lka_route-user_profile

                checkbox: checkbox
            checkbox_column: []
            action_column: []



```

