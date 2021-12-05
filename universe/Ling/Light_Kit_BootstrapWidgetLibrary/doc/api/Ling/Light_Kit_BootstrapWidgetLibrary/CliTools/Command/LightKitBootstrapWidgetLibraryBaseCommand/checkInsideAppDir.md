[Back to the Ling/Light_Kit_BootstrapWidgetLibrary api](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary.md)<br>
[Back to the Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command\LightKitBootstrapWidgetLibraryBaseCommand class](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.md)


LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir
================



LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir — Returns whether the current working directory is a correct universe application (i.e.




Description
================


protected [LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/checkInsideAppDir.md)(Ling\CliTools\Input\InputInterface $input, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output) : bool




Returns whether the current working directory is a correct universe application (i.e. containing an universe dir).

This is a security measure to prevent you to accidentally install/import things at wrong places.

If false is returned, an error message is also written to the output.




Parameters
================


- input

    

- output

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightKitBootstrapWidgetLibraryBaseCommand::checkInsideAppDir](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.php#L212-L228)


See Also
================

The [LightKitBootstrapWidgetLibraryBaseCommand](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand.md) class.

Previous method: [setApplication](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/setApplication.md)<br>Next method: [writeError](https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary/blob/master/doc/api/Ling/Light_Kit_BootstrapWidgetLibrary/CliTools/Command/LightKitBootstrapWidgetLibraryBaseCommand/writeError.md)<br>

