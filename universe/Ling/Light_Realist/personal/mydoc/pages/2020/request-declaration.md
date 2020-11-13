The request declaration
============
2020-08-24 -> 2020-11-13



The **request declaration** is the config array our service use in order to know everything about how to display a list.

The **request declaration** is identified by a **requestId**, which is a small string we can easily transmit via ajax.


The **request declaration** is composed of different **properties**.

You can also add your own.


The already implemented request declaration properties are listed below, using [bdot notation](https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md).
When similar properties are achieving the same results, all alternatives are listed in a "Similar properties" footnote.




- **action_handler.allowed_actions**: array, the allowed action names.
    See more details in the security note of the [action handler section](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/realist-protagonists.md#the-action-handler).
 
 
- **action_handler.class**: string, the action handler class to use.
    No arguments will be passed to the constructor.
    If the class implements the **LightServiceContainerAwareInterface** interface, the container will be injected.
 
 
- **duelist**: an array containing all the properties defined in the [duelist](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/duelist.md) document



- **query_error_show_debug_info**: bool=false.
    This is used by our main method: executeRequestById, which returns list items corresponding to a **request declaration**.
    When an error occurs, it adds developer level debug information to the error message, such as the pdo query and the markers used for instance (if you are using
    a database storage).
    

 
- **rendering.list_general_actions**: array, the [general actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md) 
    in [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/action-items.md#generic-action-item) format for this list.
    
    With this property, you define the **general actions** to be displayed.
    It is used (or not) by the [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md).
    
    
- **rendering.list_item_group_actions**: array, the [list item group actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md) 
    in [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/action-items.md#generic-action-item) format.
    
    With this property, you define the **list item group actions** to be displayed.
    It is used (or not) by the [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/realist-protagonists.md#the-list-renderer).
    
    
- **rendering.list_item_renderer.class**: string, the **list item renderer** class to instantiate.

    Same concept as the  **rendering.list_item_renderer.identifier** property, except that you define a class directly. No arguments will be passed to the constructor.
    If the class implements the **LightServiceContainerAwareInterface** interface, the container will be injected.

    
- **rendering.list_item_renderer.dynamic**: array of the dynamic property names.

    See more about **dynamic properties** in the [list item renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md) page.         
    
        
- **rendering.list_item_renderer.types**: array, the **types** used by the **list item renderer**.

    See more about **types** in the [list item renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md) page.

    This is an array of (list item) property name => **typeConf**.
    
    The **typeConf** is an array with the following structure:
    
    - type: the type identifier, the type of transformation to execute. 
            We recommend that the type identifier has the following notation:
                - {pluginName}.{transformType}
            With:
                - {pluginName}: the name of the plugin which provides this type             
                - {transformType}: an arbitrary string used by the plugin to know which type of transformation to apply            
    - ...(other parameters, which might be used depending on the type of transformation)
    
    In realist, our base renderer (BaseRealistListItemRenderer) comes with a few built-in types, including:
    
    - Light_Realist.image, to transform an url into an html image tag            
    - Light_Realist.hub_link, to create a link using the [controllerHub](https://github.com/lingtalfi/Light_ControllerHub) service           
    - Light_Realist.checkbox, to create an [Open Admin Table One](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/open-admin-table-one.md) compliant checkbox (containing the ric info)       
    
             

    
        
- **rendering.list_renderer.class**: string, the list renderer class to instantiate.

    Same concept as the  **rendering.list_renderer.identifier** property, except that you define a class directly. No arguments will be passed to the constructor.
    If the class implements the **LightServiceContainerAwareInterface** interface, the container will be injected.

    Similar properties: **rendering.list_renderer.identifier**
    
    
- **rendering.list_renderer.identifier**: string, the **list renderer** identifier.

    Defines which [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md) to use.
    
    This is internally used by our **getListRendererByRequestId** method.
    
    This identifier references a registered **list renderer** (i.e. you need to register the **list renderer** first before you can use this property).
    
    Similar properties: **rendering.list_renderer.class** 
     
     
- **rendering.open_admin_table.data_types**: array, the **data types** to use with this **open admin table** list.
    
    This assumes that your list is using the **open admin table** protocol.
    
    It's an array of colName => type.
    
    See the [open admin table data types](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md#the-data-types) 
    section for more details.
    
- **rendering.open_admin_table.widget_statuses**: array, the widget statuses for the **open admin table one**. 

    This assumes that your list is using the **open admin table one** protocol.
    
    It's an array of widgetName => bool (whether to use that widget)
    
    See the [open admin table one](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/open-admin-table-one.md) 
    page for more details.
    
    
- **rendering.properties_to_display**: array of property names.
    
    Define the properties that the [list renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/realist-protagonists.md#the-list-renderer) should display,
    in the order they should be displayed.
    
    If a property is not listed in this array, it shouldn't be displayed.
    
    This directive is used by both the **list renderer** and the [list item renderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-item-renderer.md).
   
    

- **rendering.property_labels**: array of property name => label.

    This is used by some [list renderers](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/realist-protagonists.md#the-list-renderer) which need labels.
    This is for instance the case with admin tables, which typically display the labels as column headers.
    
    


- **rendering.related_links**: array of **relatedLink** items.

    This is specific to a [OpenAdminTableBaseRealistListRenderer](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md) list renderer,
    such as the [Bootstrap4AdminTable](https://github.com/lingtalfi/Bootstrap4AdminTable) for instance.
    
    The related link item structure is described in [the comment of the OpenAdminTableBaseRealistListRenderer's relatedLinks property](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/OpenAdminTableBaseRealistListRenderer.md#properties). 
    
    
- **rendering.responsive_table_helper.collapsible_column_indexes**: mixed, the value of the **collapsibleColumnIndexes** property of the **JResponsiveTableHelper**.

    This assumes that your list is using the [JResponsiveTableHelper](https://github.com/lingtalfi/JResponsiveTableHelper) tool.
    
    See the **collapsibleColumnIndexes** property documentation in the [JResponsiveTableHelper source code](https://github.com/lingtalfi/JResponsiveTableHelper/blob/master/assets/map/www/libs/universe/Ling/JResponsiveTableHelper/responsive-table-helper.js).
    

    
- **rendering.title**: string, the title of the list.
    
    This is usually displayed at the top of the list.

        
        
        
        
Example
----------
2020-09-03


Here is an example of **request declaration**, in **babyYaml** format:


```yaml
duelist:
    table: lun_user_notification un
    developer_variables: @realist->getStandardDeveloperVariables
    ric:
        - id

    base_fields:
        - un.id
        - un.lud_user_id
        - concat(un.feeder, '.', un.type) as origin
    #        - un.feeder
    #        - un.type
        - un.message
    #        - un.status
        - un.date_creation
        - un.date_deletion
        - concat(un.lud_user_id, '. ', lu.pseudo) as lud_user_id_plus

    base_joins:
        - inner join lud_user lu on un.lud_user_id=lu.id

    base_where:
        - un.lud_user_id=${user_id}

    order:
        col_order: $column $direction

    where:
        general_search: <
            un.id like :%expression% or
            concat(un.feeder, '.', un.type) like :%expression% or
            concat(un.lud_user_id, '. ', lu.pseudo) like :%expression% or
    #            un.feeder like :%expression% or
    #            un.type like :%expression% or
            un.message like :%expression% or
    #            un.status like :%expression% or
            un.date_creation like :%expression% or
            un.date_deletion like :%expression%
        >
        generic_filter: $column $operator :operator_value
        generic_sub_filter: $column like :%operator_value%
        open_parenthesis: (
        close_parenthesis: )
        and: and
        or: or
        in_rics: (un.id like :id)

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





query_error_show_debug_info: true

action_handler:
    class: Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler
    allowed_actions:
        - my_action

rendering:
    title: User notification list
    list_general_actions: []
        -
            action_id: realist-generate_random_rows
            text: Generate
            icon: fas fa-spray-can

        -
            action_id: realist-save_table
            text: Save table content
            icon: fas fa-download

        -
            action_id: realist-load_table
            text: Load table content
            icon: fas fa-upload


    list_item_group_actions:
        -
            action_id: realist-print_rows
            text: Print
            icon: fas fa-print

        -
            action_id: realist-delete_rows
            text: Delete
            icon: far fa-trash-alt

        -
            action_id: realist-edit_rows
            text: Edit
            icon: fas fa-edit

        -
            text: Share
            icon: fas fa-share-square
            items:
                -
                    action_id: realist-rows_to_ods
                    text: OpenOffice ods
                    icon: far fa-file-alt

                -
                    action_id: realist-rows_to_xlsx
                    text: Excel xlsx
                    icon: far fa-file-excel

                -
                    action_id: realist-rows_to_xls
                    text: Excel xls
                    icon: far fa-file-excel

                -
                    action_id: realist-rows_to_html
                    text: Html
                    icon: far fa-file-code

                -
                    action_id: realist-rows_to_csv
                    text: Csv
                    icon: fas fa-file-csv

                -
                    action_id: realist-rows_to_pdf
                    text: Pdf
                    icon: far fa-file-pdf




    list_renderer:
        class: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer

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
            lud_user_id: number
            origin: string
            feeder: string
            type: string
            message: string
#                status: number
            date_creation: datetime
            date_deletion: datetime
            lud_user_id_plus: string
            _action: action
            _checkbox: checkbox


    properties_to_display:
        - _checkbox
        - id
        - origin
        - message
        - date_creation
        - _action



    property_labels:
        id: "#"
        lud_user_id: Lud user id
        origin: Origin
        feeder: Feeder
        type: Type
        message: Message
#            status: Status
        date_creation: Date creation
        date_deletion: Date deletion
        lud_user_id_plus: Lud user
        _action: Actions
        _checkbox: Checkbox


    list_item_renderer:
        class: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer
        types:
            avatar_url:
                type: Light_Realist.image
                width: 100

            _action:
                type: Light_Realist.mixer
                separator: " - "
                items:

                    -
                        type: Light_Kit_Admin.list_action
                        text: Delete
                        handler: Light_Kit_Admin_UserNotifications
                        action_id: realist-mark_as_deleted
                        csrf_token: true
                        include_ric: true


            _checkbox: Light_Realist.checkbox
            lud_user_id_plus:
                type: Light_Realist.hub_link
                text: null
                url_params_add_keys:
                    id: lud_user_id

                url_params:
                    plugin: Light_Kit_Admin_UserNotifications
                    controller: Generated/LudUserController
                    m: f

        dynamic:
            - _checkbox
            - _action


    related_links: []

```        