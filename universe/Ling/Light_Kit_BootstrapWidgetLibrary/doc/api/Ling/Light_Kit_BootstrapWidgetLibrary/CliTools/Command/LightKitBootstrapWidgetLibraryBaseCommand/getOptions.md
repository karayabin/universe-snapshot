[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)<br>
[Back to the Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\LightKitBootstrapWidgetLibraryBaseCommand class](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.md)


LightKitBootstrapWidgetLibraryBaseCommand::getOptions
================



LightKitBootstrapWidgetLibraryBaseCommand::getOptions — Returns the array of available options for this command, which form is name => optionItem.




Description
================


public [LightKitBootstrapWidgetLibraryBaseCommand::getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getOptions.md)() : array




Returns the array of available options for this command, which form is name => optionItem.


Each optionItem is an array with the following structure:

- ?desc: string, the description of the option.
- ?values: array of possible values for this option.
     It's an array of value => description (which can be null if you want)




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightKitBootstrapWidgetLibraryBaseCommand::getOptions](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.php#L154-L157)


See Also
================

The [LightKitBootstrapWidgetLibraryBaseCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.md) class.

Previous method: [getFlags](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getFlags.md)<br>Next method: [getParameters](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/getParameters.md)<br>

