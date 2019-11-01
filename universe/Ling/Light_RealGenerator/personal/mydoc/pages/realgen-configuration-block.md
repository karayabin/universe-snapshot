The configuration block
--------------
2019-10-24


A configuration block is an array.

Below is it's babyYaml form, commented, which serves as the reference documentation for any **configuration block**.



```yaml
main:
    # This is optional. Under the hood, the real generator uses the Light_Database plugin to interact with the database,
    # and so the default value will be the one defined by the Light_Database plugin.
    ?database_name: jindemo

    # The plugin name is used in various places, including:
    # - as a prefix of the rendering.list_general_actions.action_id (list)
    # - as a prefix of the rendering.list_action_groups.action_id (list)
    # - as the plugin name in rendering.list_renderer.identifier (list)
    # - as the plugin name in plugin (described in the miscellaneous "section" of the realist conception notes)
    plugin_name: Light_Kit_Admin


    # This section defines the table to generate configuration files for.
    # It's composed of two sections: add and remove.
    tables:
        # In the add section, you specify the tables you want to add.
        # This entry accepts either a string (for just one table) or an array.
        # The special value "*" (asterisk) represent all tables.
        add: *
        # In the remove section, you specify the tables you want to remove (i.e. the tables
        # for which you don't want to generate a configuration file).
        # This entry accepts either a string (for just one table) or an array.
        # The default value is an empty array.
        ?remove: []
            - luda_resource

    # This array let you ignore/skip columns that you want to exclude from both the list and form generated config files.
    # It's an array of table => columnNames, with columnNames being an array of column names.
    ?ignore_columns:
        lud_user:
            - password

    # This section defines the behaviour of the list configuration file generator
    list:

        # The target_dir is the path of the dir where to generate the files
        # It's an absolute path.
        # The tag {app_dir} can be used, and will be replaced with the actual "application root directory".
        target_dir: {app_dir}/config/data/Light_Kit_Admin/Light_Realist/generated


        # Bool=true, whether to add the use_micro_permission setting in the request declaration.
        # See the miscellaneous section of the realist conception notes for more details:
        # https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-conception-notes.md#miscellaneous
        ?use_micro_permission: true

        # Whether to use the action column (added to every row). Defaults to true.
        ?use_action_column: true

        # Whether to use the checkbox column (added to every row). Defaults to true.
        ?use_checkbox_column: true

        # The name of the actions column (only if use_action_column=true). Defaults to "actions".
        # Tip: the default value is set by the LightRealistService->executeRequestById method.
        ?column_action_name: actions

        # The name of the checkbox column (only if use_checkbox_column=true). Defaults to "checkbox".
        # Tip: the default value is set by the LightRealistService->executeRequestById method.
        ?column_checkbox_name: checkbox

        # This array let you ignore/skip columns that you want to exclude from the generated list config file.
        # It's an array of table => columnNames, with columnNames being an array of column names.
        # Note: it merges with the ignore_columns option set at the root level (if set).
        ?ignore_columns:
            lud_user:
                - password
        # This array let you override the default column types.
        # It's an array of table => types, with types being an array of columnName => type.
        # With type being an open admin table data type (https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/open-admin-table-protocol.md#the-data-types).
        # This is used to generate the rendering.open_admin_table.data_types setting in the config file.
        #
        ?open_admin_table_column_types:
            lud_user:
                pseudo: enum
        # This array let you override the default column labels.
        # It's an array of table => labels, with labels being an array of columnName => label.
        #
        ?column_labels:
            lud_user:
                pseudo: The pseudo

        # Overrides the rows_renderer.identifier default value, which defaults to the plugin name.
        ?rows_renderer_identifier: MyPlugin

        # Defines the rows_renderer.class value. If you define this key, it will have precedence
        # over the rows_renderer_identifier option.
        ?rows_renderer_class: My\Class

        # Defines some rows renderer type aliases to re-use in other parts of the configuration (rows_renderer_types_general and
        # rows_renderer_types_specific options can both use those aliases).
        # An alias is whatever you want, depending on your rows renderer instance.
        ?rows_renderer_type_aliases:
            img100:
                type: image
                width: 100
        # Defines rows renderer types based on a general column name.
        # Meaning every time a column has a name listed in this option, it will be inferred the type that you've specified,
        # unless a more specific type has been defined (with the rows_renderer_types_specific option), in which case the more
        # specific type is used.
        # It's an array of columnName => type.
        # The type is whatever you want, depending on your rows renderer instance.
        # Also, the type can refer to an (pre-defined) alias by preceding it with the dollar symbol.
        # Note: aliases are defined with the rows_renderer_types_alias option.
        ?rows_renderer_types_general:
            avatar_url: $img100
            checkbox: checkbox

        # Defines rows renderer types based on a table name and a column name.
        # It's an array of table => types, with types being an array of columnName => type.
        # The type is whatever you want, depending on your rows renderer instance.
        # Also, the type can refer to an (pre-defined) alias by preceding it with the dollar symbol.
        # Note: aliases are defined with the rows_renderer_types_alias option.

        ?rows_renderer_types_specific:
            lud_user:
                avatar_url: $img100


    # This section defines the behaviour of the form configuration file generator
    form:


        # The target_dir is the path of the dir where to generate the files
        # It's an absolute path.
        # The tag {app_dir} can be used, and will be replaced with the actual "application root directory".
        target_dir: {app_dir}/config/data/Light_Kit_Admin/Light_Realform/generated


        # This array let you ignore/skip columns that you want to exclude from the generated form config file.
        # It's an array of table => columnNames, with columnNames being an array of column names.
        # Note: it merges with the ignore_columns option set at the root level (if set).
        ?ignore_columns:
            lud_user:
                - password

        # Overrides the default form handler class (which defaults to a plain Chloroform instance) for all tables,
        # unless a more specific override has been defined with the form_handler_class_specific option (in
        # which case the more specific override is used).
        # It's a string representing the class to use.
        ?form_handler_class_general: My\Class
        # Overrides the default form handler class (which defaults to a plain Chloroform instance) for a given table.
        # It's an array of table => class.
        ?form_handler_class_specific:
            lud_user: My\Specific\Class

        # Overrides completely or partially the fields items.
        # It's an array of table => fieldItems, with fieldItems being an array of fieldName => fieldItem.
        # See the realform documentation for more info about the field item structure:
        # - https://github.com/lingtalfi/Light_Realform/blob/master/doc/pages/realform-config-example.md
        # By default, a required validator is added automatically for every generated field.
        # If you don't want the required validator for a particular field, you need to specify it with the not_required option.
        ?fields:
            lud_user:
                pseudo:
                    label: the Pseudo

        # An array of table => notRequiredFields, with notRequiredFields being an array of the fields for which you don't
        # want a required validator to be set automatically.
        ?not_required:
            lud_user:
                - pseudo







```










