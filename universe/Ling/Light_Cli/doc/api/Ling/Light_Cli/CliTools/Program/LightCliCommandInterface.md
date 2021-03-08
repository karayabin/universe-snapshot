[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)



The LightCliCommandInterface class
================
2021-01-07 --> 2021-03-05






Introduction
============

The LightCliCommandInterface interface.



Class synopsis
==============


abstract class <span class="pl-k">LightCliCommandInterface</span>  {

- Methods
    - abstract public [getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getName.md)() : string
    - abstract public [getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getDescription.md)() : string
    - abstract public [getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getAliases.md)() : array
    - abstract public [getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getFlags.md)() : array
    - abstract public [getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getOptions.md)() : array
    - abstract public [getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getParameters.md)() : array

}






Methods
==============

- [LightCliCommandInterface::getName](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getName.md) &ndash; Returns the name of the command.
- [LightCliCommandInterface::getDescription](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getDescription.md) &ndash; Returns the description of the command.
- [LightCliCommandInterface::getAliases](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getAliases.md) &ndash; Returns the aliases used by this command.
- [LightCliCommandInterface::getFlags](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getFlags.md) &ndash; Returns the array of flags available for this command, which form is name => description.
- [LightCliCommandInterface::getOptions](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getOptions.md) &ndash; Returns the array of available options for this command, which form is name => optionItem.
- [LightCliCommandInterface::getParameters](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliCommandInterface/getParameters.md) &ndash; Returns the parameters available for this command.





Location
=============
Ling\Light_Cli\CliTools\Program\LightCliCommandInterface<br>
See the source code of [Ling\Light_Cli\CliTools\Program\LightCliCommandInterface](https://github.com/lingtalfi/Light_Cli/blob/master/CliTools/Program/LightCliCommandInterface.php)



SeeAlso
==============
Previous class: [LightCliBaseApplication](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/CliTools/Program/LightCliBaseApplication.md)<br>Next class: [LightCliException](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Exception/LightCliException.md)<br>
