[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\Helper\LightCliCommandDocHelper class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Helper/LightCliCommandDocHelper.md)


LightCliCommandDocHelper::printCommandListDocByApp
================



LightCliCommandDocHelper::printCommandListDocByApp — Prints the command list documentation for the given app.




Description
================


public static [LightCliCommandDocHelper::printCommandListDocByApp](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Helper/LightCliCommandDocHelper/printCommandListDocByApp.md)([Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliApplicationInterface.md) $app, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, ?array $options = []) : void




Prints the command list documentation for the given app.

This tool was created so that author of apps can easily generate documentation for their own app
(if they implement LightCliApplicationInterface correctly).

Available options are:
displayHeader: bool=true, whether to display a header before the commands list.




Parameters
================


- app

    

- output

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightCliCommandDocHelper::printCommandListDocByApp](https://github.com/lingtalfi/Light_Cli/blob/master/Helper/LightCliCommandDocHelper.php#L33-L60)


See Also
================

The [LightCliCommandDocHelper](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Helper/LightCliCommandDocHelper.md) class.



