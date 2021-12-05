[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\InstallInit3Command class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit3Command.md)


InstallInit3Command::getOptions
================



InstallInit3Command::getOptions — Returns the array of available options for this command, which form is name => optionItem.




Description
================


public [InstallInit3Command::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit3Command/getOptions.md)() : array




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
See the source code for method [InstallInit3Command::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/InstallInit3Command.php#L80-L92)


See Also
================

The [InstallInit3Command](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit3Command.md) class.

Previous method: [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit3Command/getParameters.md)<br>Next method: [getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit3Command/getFlags.md)<br>

