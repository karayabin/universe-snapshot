[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\DependencyCommand class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DependencyCommand.md)


DependencyCommand::getOptions
================



DependencyCommand::getOptions — Returns the array of available options for this command, which form is name => optionItem.




Description
================


public [DependencyCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DependencyCommand/getOptions.md)() : array




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
See the source code for method [DependencyCommand::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/DependencyCommand.php#L173-L182)


See Also
================

The [DependencyCommand](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DependencyCommand.md) class.

Previous method: [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DependencyCommand/getParameters.md)<br>Next method: [getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/DependencyCommand/getFlags.md)<br>

