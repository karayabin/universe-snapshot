Light_LingStandardService, conception notes
==============
2020-07-27 -> 2020-08-07



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
2020-07-30 - 2020-08-07


This has been moved to lka planet: see the [Light Kit Admin StandardService plugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/lka-plugins.md#light-kit-admin-standardservice-plugin) document.