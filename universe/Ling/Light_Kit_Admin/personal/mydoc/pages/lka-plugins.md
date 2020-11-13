Light kit admin plugins
=============
2020-02-28 -> 2020-08-07


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








Light Kit Admin StandardService plugin
----------
2020-08-07


This is a class "lka plugin" authors can extend to speed up their workflow.
It contains some common and useful methods.


This is an abstract class which provides some extra-functionality to a [light service](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).

It's designed for [light kit admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin authors.


What it basically does is implement the following interfaces:

- [plugin installer interface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md)
- [realist custom service interface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md)


It also automatically adds some permission bindings, as described below.


Before you can extend our class, you need to make sure that your lka class meet the conditions below. 
 
 
First, this class assumes that the **kit admin plugin**'s name derives from the **base light plugin** it originates from (so it assumes there is a **base light plugin** too).

The naming convention of the **kit admin plugin** (aka lka plugin) is this:

- lkaPluginName: Light_Kit_Admin_{BasePluginNameWithoutLightPrefix}

With:

- BasePluginNameWithoutLightPrefix: the name of the light plugin, but without the **Light_** prefix

So for instance if the **base light plugin**'s name is **Light_TaskScheduler**, then the lka plugin name must be: **Light_Kit_Admin_TaskScheduler** 

It also assumes that the **base light plugin** has the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).




If your lka class meets those conditions, then you can extend our class, and it will automatically bind the **light standard permissions** to the corresponding
**Light_Kit_Admin.admin** and **Light_Kit_Admin.user** **permission groups**. This is done in the **install** method (PluginInstallerInterface).

Similarly, those **permissions** to **permission groups** bindings are removed when the uninstall (PluginInstallerInterface) method is called.


In addition to that, our class has some common properties:

- container, the service container instance
- options, array of options for the service


Also, we provide the following methods:

- private error (msg), which assumes that there is a [basic exception](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-exception) already in place, and throws it.


  





This is an abstract class which provides some extra-functionality to a [light service](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).

It's designed for [light kit admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin authors.


What it basically does is implement the following interfaces:

- [plugin installer interface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md)
- [realist custom service interface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md)


It also automatically adds some permission bindings, as described below.


Before you can extend our class, you need to make sure that your lka class meet the conditions below. 
 
 
First, this class assumes that the **kit admin plugin**'s name derives from the **base light plugin** it originates from (so it assumes there is a **base light plugin** too).

The naming convention of the **kit admin plugin** (aka lka plugin) is this:

- lkaPluginName: Light_Kit_Admin_{BasePluginNameWithoutLightPrefix}

With:

- BasePluginNameWithoutLightPrefix: the name of the light plugin, but without the **Light_** prefix

So for instance if the **base light plugin**'s name is **Light_TaskScheduler**, then the lka plugin name must be: **Light_Kit_Admin_TaskScheduler** 

It also assumes that the **base light plugin** has the [light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).




If your lka class meets those conditions, then you can extend our class, and it will automatically bind the **light standard permissions** to the corresponding
**Light_Kit_Admin.admin** and **Light_Kit_Admin.user** **permission groups**. This is done in the **install** method (PluginInstallerInterface).

Similarly, those **permissions** to **permission groups** bindings are removed when the uninstall (PluginInstallerInterface) method is called.


In addition to that, our class has some common properties:

- container, the service container instance
- options, array of options for the service


Also, we provide the following methods:

- private error (msg), which assumes that there is a [basic exception](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-exception) already in place, and throws it.


  