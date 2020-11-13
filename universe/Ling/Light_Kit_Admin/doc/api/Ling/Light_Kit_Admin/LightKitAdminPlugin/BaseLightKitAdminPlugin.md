[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The BaseLightKitAdminPlugin class
================
2019-05-17 --> 2020-08-21






Introduction
============

The BaseLightKitAdminPlugin class.



Class synopsis
==============


class <span class="pl-k">BaseLightKitAdminPlugin</span> implements [LightKitAdminPluginInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md) {

- Properties
    - protected string [$optionsFile](#property-optionsFile) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/__construct.md)() : void
    - public [getPluginOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/getPluginOptions.md)() : array
    - public [setOptionsFile](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/setOptionsFile.md)(string $file) : void

}




Properties
=============

- <span id="property-optionsFile"><b>optionsFile</b></span>

    This property holds the absolute path to the [babyYaml](https://github.com/lingtalfi/BabyYaml) file containing the kit admin options
    for this plugin.
    
    



Methods
==============

- [BaseLightKitAdminPlugin::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/__construct.md) &ndash; Builds the BaseLightKitAdminPlugin instance.
- [BaseLightKitAdminPlugin::getPluginOptions](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/getPluginOptions.md) &ndash; Returns the options of this kit admin plugin.
- [BaseLightKitAdminPlugin::setOptionsFile](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/BaseLightKitAdminPlugin/setOptionsFile.md) &ndash; Sets the file.





Location
=============
Ling\Light_Kit_Admin\LightKitAdminPlugin\BaseLightKitAdminPlugin<br>
See the source code of [Ling\Light_Kit_Admin\LightKitAdminPlugin\BaseLightKitAdminPlugin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/LightKitAdminPlugin/BaseLightKitAdminPlugin.php)



SeeAlso
==============
Previous class: [LightKitAdminMicroPermissionDeniedException](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Exception/LightKitAdminMicroPermissionDeniedException.md)<br>Next class: [LightKitAdminPluginInterface](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/LightKitAdminPlugin/LightKitAdminPluginInterface.md)<br>
