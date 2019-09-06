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
    
        checkbox_column: # The special checkbox dynamic column settings. The checkbox is  See the "Rows renderer" section below.
                         # It basically prepends a checkbox column to each returned row.  
            name: string=checkbox. The column name in the row. 
            label: string=#. The label to use in the gui.

        action_column: # The special action dynamic column settings. The checkbox is  See the "Rows renderer" section below.
                       # It basically appends an "action" column to each returned row. 
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





   

