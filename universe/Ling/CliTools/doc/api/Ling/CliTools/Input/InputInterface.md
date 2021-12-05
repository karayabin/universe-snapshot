[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The InputInterface class
================
2019-02-26 --> 2021-07-08






Introduction
============

The InputInterface class.
It represents the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).

The main input classes are:

- the [array input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput.md)
- the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)



Class synopsis
==============


abstract class <span class="pl-k">InputInterface</span>  {

- Methods
    - abstract public [getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameter.md)(int $index, ?$default = null) : mixed | null
    - abstract public [getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOption.md)(string $optionName, ?$default = null) : mixed | null
    - abstract public [hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/hasFlag.md)(string $flagName) : bool
    - abstract public [getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameters.md)() : array
    - abstract public [getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOptions.md)() : array
    - abstract public [getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getFlags.md)() : array

}






Methods
==============

- [InputInterface::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [InputInterface::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [InputInterface::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [InputInterface::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
- [InputInterface::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
- [InputInterface::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.





Location
=============
Ling\CliTools\Input\InputInterface<br>
See the source code of [Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/Input/InputInterface.php)



SeeAlso
==============
Previous class: [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)<br>Next class: [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md)<br>
