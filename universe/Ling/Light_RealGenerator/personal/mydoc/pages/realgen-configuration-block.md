The configuration block
--------------
2019-10-24 -> 2021-06-17


A configuration block is an array.

Below is it's babyYaml form, commented, which serves as the reference documentation for any **configuration block**.



```yaml

# Use this to define your custom variables that you can re-use later in this same configuration.
# To use a variable you've defined here, use the !{variableName} notation
variables: 
    plugin: Light_Kit_Admin
    galaxyName: Ling


# This is optional. Under the hood, the real generator uses the Light_Database plugin to interact with the database,
# and so the default value will be the one defined by the Light_Database plugin.
?database_name: jindemo

# The plugin name is used in various places, including:
# - as a prefix of the rendering.list_general_actions.action_id (list)
# - as a prefix of the rendering.list_action_groups.action_id (list)
# - as the plugin name in rendering.list_renderer.identifier (list)
# - as the plugin name in plugin (described in the miscellaneous "section" of the realist conception notes)
# - as the micro permission plugin name for the on_success_handler (form) of type database
plugin_name: !{plugin}

# The path to a create file, see the use_create_file directive for more info
# The {app_dir} tag will be replaced with the absolute path to the application directory.
create_file: /path/to/the/create_file.sql

# Whether or not to use the "create file" defined with the create_file directive.
# If true, the generators will use the info from the create file to do their things.
# If false, the generators will use the info from the actual database instead.
# Learn more about create file here: https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md
# default value is false
use_create_file: true


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

# This section defines the table prefixes.
# A prefix is an arbitrary string in front of the table name, and followed by an underscore.
# It's like a namespace for tables if you will.
# The prefixes, or the table name without prefix are information that might be used by other parts of this generator.
table_prefixes:
    - luda

# Array. Optional. Defaults to the example below. Defines a has table detection mechanism that can be used by the other
# sections of this file.
has_tables:
    # Array. Optional. Defaults to an array containing one entry with value="has".
    # This array defines which values trigger the detection of a has table.
    # The detection of a has table is triggered if the expression composed of the keyword surrounded with underscores
    # is contained in the table name.
    keywords:
        - has


# This array let you ignore/skip columns that you want to exclude from both the list and form generated config files.
# It's an array of table => columnNames, with columnNames being an array of column names.
?ignore_columns:
    lud_user:
        - password

# Bool=true. Whether to generate lists
use_list: true

# Bool=true. Whether to generate forms
use_form: true


# This section defines the behaviour of the list configuration file generator
# The term generic tags, used in some of the definitions below, refers to the following array:
# - {label}, the human name derived from the table name (using internal heuristics)
# - {Label}, same as label, but with first letter uppercase
# - {table}, the table name
# - {TableClass}, the table name in pascal case (i.e. class name case).
#       More info about pascal case here: https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#pascalcase
list:



    # The target_dir is the path of the dir where to generate the files
    # It's an absolute path.
    # The tag {app_dir} can be used, and will be replaced with the actual "application root directory".
    target_dir: {app_dir}/config/data/!{galaxyName}.!{plugin}/Ling.Light_Realist/list/generated


    # the base name of the files to generate
    # the default value is {table}.byml
    # the available tags are:
    # - {table}: the name of the table used to generate this list nugget
    target_basename: {table}.byml




    # The title of the list, defaults to:
    # - {label} list
    # The generic tags (see the list description comment) can be used to replace some part of the title by
    # dynamic values.
    ?title: {label} list

    # When executing the stmt request and there is an error: whether to show the query/markers information along with the
    # error message (true), or just display the error message (false, by default)
    ?query_error_show_debug_info: false


    # Whether to use the cross columns on foreign keys
    # See more about cross columns in https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/crossed-column.md
    ?use_cross_columns: true

    # An array of common representative column names.
    # Only used if use_cross_columns=true.
    # The default value is an array containing the following:
    # - name
    # - label
    # - identifier
    # If you define this array, it overrides the value entirely (i.e. it's not merged with the default values, but
    # will rather replace them).
    # More info about representatives in https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/conception-notes.md#the-representative-column
    ?common_representative_matches: []
        - pseudo

    # A string representing how to display the foreign key in the cross column.
    # Only used if use_cross_columns=true.
    # The following tags are available:
    # - $fk: the name of the foreign key column (prefix with an alias)
    # - $rc: the name of the representative column (prefixed with an alias)
    # The default value is 
    # - concat($fk, '. ', $rc)
    ?cross_column_fk_format: concat($fk, '. ', $rc)

    # A string used to generate the value of a parameter for the Light_Realist.hub_link column transformer,
    # which is a built-in transformer provided by Light_Realist.
    # This is used to create a link out of the cross column.
    # 
    # See more about the column transformer in: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/realist-conception-notes.md#types-the-column-transformers
    # See more about the cross columns in: https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/crossed-column.md
    # 
    # In particular, the url_params.controller value is generated from this option.
    # See the BaseRealistRowsRenderer implementation for more details: https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Rendering/BaseRealistRowsRenderer.md
    # The following tags are available:
    # - {Table}: the referenced table name is pascal case (https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md#pascalcase).
    # The default value is:
    # - Generated/{Table}Controller
    # 
    ?cross_column_hub_link_controller_format: Generated/{Table}Controller

    # An array of tablePrefix => pluginName, used to generate the plugin parameter of the in the built-in Light_Realist.hub_link column transformer for cross columns.
    # By default it's an empty array, which means the current plugin will be always used.
    ?cross_column_hub_link_table_prefix_2_plugin: []
        lud: Light_Kit_Admin


    # Whether to use the action column (added to every row). Defaults to true.
    ?use_action_column: true

    # The name of the action column (only if use_action_column=true). Defaults to "action".
    # Tip: the default value is set by the LightRealistService->executeRequestById method.
    ?column_action_name: action

    # The label for the action column (only if use_action_column=true). Defaults to "Actions".
    ?column_action_label: Actions


    # Whether to use the checkbox column (added to every row). Defaults to true.
    ?use_checkbox_column: true

    # The name of the checkbox column (only if use_checkbox_column=true). Defaults to "checkbox".
    # Tip: the default value is set by the LightRealistService->executeRequestById method.
    ?column_checkbox_name: checkbox

    # The label for the checkbox column (only if use_checkbox_column=true). Defaults to "Checkbox".
    ?column_checkbox_label: "Checkbox"

    # The name of the class to use as the action handler.
    # The default value is: Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler 
    action_handler_class: "Ling\Light_Kit_Admin\Realist\ListActionHandler\LightKitAdminListActionHandler"

    # The name of the class to use as the list renderer.
    # The default value is: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer 
    list_renderer_class: "Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListRenderer"


    # This array let you ignore/skip columns that you want to exclude from the generated list config file.
    # It's an array of table => columnNames, with columnNames being an array of column names.
    # Note: it merges with the ignore_columns option set at the root level (if set).
    ?ignore_columns:
        lud_user:
            - password
    # This array let you override the default column types.
    # It's an array of table => types, with types being an array of columnName => type.
    # With type being an open admin table data type (https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/older/open-admin-table-protocol.md#the-data-types).
    # This is used to generate the rendering.open_admin_table.data_types setting in the config file.
    #
    ?open_admin_table_column_types:
        lud_user:
            pseudo: enum
    # This array let you override the default column labels.
    # It's an array of table => labels, with labels being an array of columnName => label.
    # Note: for the special columns checkbox and action, the labels are set with column_action_label and column_checkbox_label.
    #
    ?column_labels:
        lud_user:
            pseudo: The pseudo

    # Overrides the rows_renderer.identifier default value, which is null.
    ?rows_renderer_identifier: null

    # Defines the rows_renderer.class value. If you define this key, it will have precedence
    # over the rows_renderer_identifier option. The default value is Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer,
    # because that's the one I use the most
    ?rows_renderer_class: Ling\Light_Kit_Admin\Realist\Rendering\LightKitAdminRealistListItemRenderer




    # Defines some rows renderer type aliases to re-use in other parts of the configuration (rows_renderer_types_general and
    # rows_renderer_types_specific options can both use those aliases).
    # An alias is whatever you want, depending on your rows renderer instance.
    # The generic_tags (defined in the list option at the root level) are available.
    ?rows_renderer_type_aliases:
        img100:
            type: image
            width: 100
    # Defines rows renderer types to add to every generated list configuration file.
    # This can be overridden by the rows_renderer_types_specific option.
    # It's an array of columnName => type.
    # The type is whatever you want, depending on your rows renderer instance.
    # Also, the type can refer to an (pre-defined) alias by preceding it with the dollar symbol.
    # Note: aliases are defined with the rows_renderer_types_alias option.
    # The generic_tags (defined in the list option at the root level) are available.
    ?rows_renderer_types_general:
        avatar_url: $img100
        _checkbox: checkbox

    # Defines rows renderer types to add for a specific table.
    # It has precedence over the rows_renderer_type_general option.
    # It's an array of table => types, with types being an array of columnName => type.
    # The type is whatever you want, depending on your rows renderer instance.
    # Also, the type can refer to an (pre-defined) alias by preceding it with the dollar symbol.
    # Note: aliases are defined with the rows_renderer_types_alias option.
    # The generic_tags (defined in the list option at the root level) are available.
    ?rows_renderer_types_specific:
        lud_user:
            avatar_url: $img100
    # An optional array of related links to add to all generated files.
    # Each related link is an array containing the properties you want.
    # Usually, you will use the following:
    # - text: string
    # - url: string
    # - icon: string
    # In the property values, you can use the generic tags (described in the list section comment).
    ?related_links:
        -
            text: Add new {label}
            url: REALIST(Light_Realist, route, lka_route-{table})
            icon: fas fa-plus-circle



# This section defines the behaviour of the form configuration file generator
form:

    # The title of the form, defaults to:
    # - {Label} form
    # The generic tags (see the list description comment) can be used to replace some part of the title by
    # dynamic values.
    title: {Label} form


    # The security array. See the [baked in security system of Light_Nugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#a-baked-in-security-system-for-nugget-users) for more details.
    security:
        any:
            permission: Ling.Light_Kit_Admin.admin





    # The target_dir is the path of the dir where to generate the files
    # It's an absolute path.
    # The tag {app_dir} can be used, and will be replaced with the actual "application root directory".
    target_dir: {app_dir}/config/data/!{galaxyName}.!{plugin}/Ling.Light_Realform/form/generated


    # This array let you ignore/skip columns that you want to exclude from the generated form config file.
    # It's an array of table => columnNames, with columnNames being an array of column names.
    # Note: it merges with the ignore_columns option set at the root level (if set).
    ?ignore_columns:
        lud_user:
            - password

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

    # An array of aliasName => partialFieldItem,
    # with partialFieldItem being an array containing field item parts.
    # The partialFieldItems defined in this array can be referenced in other parts of the configuration:
    # - fields_merge_specific

    # Using aliases tends to reduce the verbosity of this file.
    #
    # The values of the partialFieldItem can use variables (aka tags).
    # The notation for a variable is defined in the variables section (see the variables section for more info).
    # The available variables are also defined there.
    fields_merge_aliases:
        ajax1:
            type: ajaxFileBox
            maxFile: 1
            maxFileSize: null
            mimeType: null
            postParams:
                id: {plugin_prefix}-{table}-{field}
                # csrf_token: REALGEN(crsf, realGen-ajaxform-{table}-{field})
                csrf_token: true
            validators:
                validUserDataUrl: []

    # Use this array to merge a field item with custom defined properties, based on a specific table and field.
    # It's an array of table => items,
    # with items being an array of field => partialItem,
    # with partialItem being either:
    # - an array of one ore more field items entries to merge with the target field item
    # - or an alias to such an array. To use an alias, prefix the alias name with the dollar symbol ($).
    # For more info about aliases, see the field_merge_aliases section.
    fields_merge_specific:
        lud_user:
            avatar_url: $ajax1


    # An array to handle some special fields automatically.
    # It's an array of section => parameters.
    ?special_fields:
        # The chloroform_extensions section.
        # All fields coming from the Light_ChloroformExtension plugin should be handled there.
        # -> https://github.com/lingtalfi/Light_ChloroformExtension
        #
        ?chloroform_extensions:
            # Bool, whether to use table list on foreign keys.
            # The default value is true.
            # When true, if a field is a foreign key we will generate the configuration for a table list field (https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#tablelistfield).
            ?use_table_list: true

            # Array, the security directive to use with the table list(s).
            # See the [Light_Nugget baked in security system](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/pages/conception-notes.md#a-baked-in-security-system-for-nugget-users) for more details.
            table_list_security:
                any:
                    permission: Ling.Light_Kit_Admin.admin


    # An array of table => notRequiredFields, with notRequiredFields being an array of the fields for which you don't
    # want a required validator to be set automatically.
    ?not_required:
        lud_user:
            - pseudo

    # Array, defines how the on_success_handler section (of the realform config file) is generated.
    ?on_success_handler:
        # string, defines the type of success handler
        # The available values are:
        # - database
        type: database
        # More options, depending on the success handler type. This is just an empty placeholder for now (i.e. no concrete options available).
        ?options: []

    # Bool. Optional. Defaults to true. 
    # Whether to use the multiplier mode on has tables. 
    # It's used to generate both the database success handler and the realform configuration items.
    # 
    # See https://github.com/lingtalfi/TheBar/blob/master/discussions/form-multiplier.md for more info.
    #
    # If you use this option, make sure that
    # - the multiplier.column is placed before the multiplier.update_cleaner_column in the table,
    # - the strict ric of the table is composed of the multiplier column and update_cleaner_column only
    # That's because our generator guesses the multiplier columns from the strict ric,  and considers the first
    # entry to be the foreign key to the left member, and the second the foreign key to the right member of the has table.
    # More info on ric strict: https://github.com/lingtalfi/NotationFan/blob/master/ric.md#the-strict-ric
    #
    use_multiplier_on_has: true


    # An array of related links to add as the rendering.related_links property in all the generated form conf.
    # The default value is an empty array, but a practical value to use is the array below.
    # In the property values, you can use the generic tags (described in the list section comment).
    related_links:
        -
            text: See the list of "{Label}" items
            url: ::(@reverse_router->getUrl(lch_route-hub, {execute: !{galaxy}\!{plugin}\Controller\Generated\{TableClass}Controller->render}))::
            icon: fas fa-plus-circle

```










