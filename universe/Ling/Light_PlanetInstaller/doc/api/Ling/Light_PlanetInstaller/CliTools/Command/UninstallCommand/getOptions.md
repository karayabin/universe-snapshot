[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\UninstallCommand class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand.md)


UninstallCommand::getOptions
================



UninstallCommand::getOptions — Returns the array of available options for this command, which form is name => optionItem.




Description
================


public [UninstallCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand/getOptions.md)() : array




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
See the source code for method [UninstallCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/UninstallCommand.php#L86-L98)


See Also
================

The [UninstallCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand.md) class.

Previous method: [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand/getParameters.md)<br>Next method: [getAliases](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/UninstallCommand/getAliases.md)<br>

