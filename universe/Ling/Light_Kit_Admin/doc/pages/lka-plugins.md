Light kit admin plugins
=============
2020-02-28


The light kit admin plugin is so big that it's an environment in itself.

It can host other plugins, called light kit admin plugins (or lka plugins for short).




Light kit admin plugin options
---------
2020-02-28

The behaviour of the lka plugin is defined by the lka plugin options, which is an array with the 
structure below.
All options are optional, and the values indicated are the default values.


```yaml

# Defines the options used by the MultipleFormEditController tool of LightKitAdmin.
multipleFormEditor:
    # The MultipleFormEditController reacts to table names, but rather than specifying each individual table name (which
    # would be tedious to type), we pass table prefixes.
    prefixes:
        # The prefix of the table, example: luda
        $prefix: 
            # string, the realform identifier, see the realform planet for more details (https://github.com/lingtalfi/Light_Realform)
            # The {table} tag is available and will be replaced by the table name.
            realform_identifier: Light_Kit_Admin.generated/{table}
            # string, the relative path to the kit page configuration for the kit widget displaying that real form
            # The {table} tag is available and will be replaced by the table name.
            kit_page: Light_Kit_Admin/kit/zeroadmin/generated/{table}_form
            # The name of the widget displaying the realform.
            widget_name: lka_chloroform 
```
