[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\CliTools\Command\InstallInit1Command class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit1Command.md)


InstallInit1Command::getOptions
================



InstallInit1Command::getOptions — Returns the array of available options for this command, which form is name => optionItem.




Description
================


public [InstallInit1Command::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit1Command/getOptions.md)() : array




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
See the source code for method [InstallInit1Command::getOptions](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/CliTools/Command/InstallInit1Command.php#L83-L95)


See Also
================

The [InstallInit1Command](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit1Command.md) class.

Previous method: [getParameters](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit1Command/getParameters.md)<br>Next method: [getFlags](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/CliTools/Command/InstallInit1Command/getFlags.md)<br>

