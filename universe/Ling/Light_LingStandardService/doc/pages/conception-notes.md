Light_LingStandardService, conception notes
==============
2020-07-27 -> 2020-07-30



- [Ling Standard Service 01](#ling-standard-service-01)
- [Ling Standard Service Kit Admin Plugin](#ling-standard-service-kit-admin-plugin)


Ling Standard Service 01
--------------
2020-07-27 -> 2020-07-30


This is an abstract class which provides some extra-functionality to a [light service](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).

See the [LightLingStandardService01 class documentation](https://github.com/lingtalfi/Light_LingStandardService/blob/master/doc/api/Ling/Light_LingStandardService/Service/LightLingStandardService01.md) for more details.

It's designed primarily for my personal use, but you can use too, it if it helps you.




**Ling Standard Service 01** (aka lss01) provides the features of the [basic service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service), but there is more to it:

- instead of having all the methods in the child class, some methods are put on the parent (the **Light_LingStandardService01** class), to make the child more readable, and easier to add features to.
    So the container and options property are moved to the parent.
    The factory property however stays on the child class, because the factory return is very specific to that child class (we promote the [Ling Breeze Generator2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md) which creates class specific factories)
    
    The [ldw standard available options in docBlock convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#ldw-standard-available-options-in-docblock)
    system is still the same, but moved to the child class's top comment (since the parent class can't know about the children's specifics).


- the following methods are part of the lss01:
    - **logDebug**: lss01 is compliant to the [logDebug convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)


- it implements the [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) , 
    to ease install process. 
    
    By default, we add the [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md) to the plugin.
    
- it implements the [logDebug method convention](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)    
    
    
    
Ling Standard Service Kit Admin Plugin
--------------
2020-07-30


This is an abstract class which provides some extra-functionality to a [light service](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md).

It's designed for [light kit admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin authors.


What it basically does is implement the [plugin installer interface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md),
and automatically adds some permission bindings, as described below.


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