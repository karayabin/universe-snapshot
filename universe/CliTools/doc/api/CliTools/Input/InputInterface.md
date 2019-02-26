[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The InputInterface class
================
2019-02-26 --> 2019-02-26






Introduction
============

The InputInterface class.
It represents the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).

The main input classes are:

- the [array input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput.md)
- the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput.md)



Class synopsis
==============


abstract class <span class="pl-k">InputInterface</span>  {

- Methods
    - abstract public [getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getParameter.md)(int $index, $default = null) : mixed | null
    - abstract public [getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getOption.md)(string $optionName, $default = null) : mixed | null
    - abstract public [hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/hasFlag.md)(string $flagName) : bool

}






Methods
==============

- [InputInterface::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [InputInterface::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [InputInterface::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface/hasFlag.md) &ndash; Returns whether the flag $flagName was set.





Location
=============
CliTools\Input\InputInterface