[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The WritableCommandLineInput class
================
2019-02-26 --> 2021-05-31






Introduction
============

The WritableCommandLineInput class.



Class synopsis
==============


class <span class="pl-k">WritableCommandLineInput</span> extends [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) implements [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) {

- Inherited properties
    - protected array [AbstractInput::$flags](#property-flags) ;
    - protected array [AbstractInput::$options](#property-options) ;
    - protected array [AbstractInput::$parameters](#property-parameters) ;

- Methods
    - public [setFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setFlags.md)(array $flags) : void
    - public [setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setOptions.md)(array $options) : void
    - public [setParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setParameters.md)(array $parameters, ?bool $rewriteIndexes = true) : void
    - private [rewriteParameterIndexes](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/rewriteParameterIndexes.md)() : void

- Inherited methods
    - public [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/__construct.md)(?array $argv = null) : void
    - public [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md)(string $flagName) : bool
    - public [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md)(string $optionName, ?$default = null) : mixed | null
    - public [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md)(int $index, ?$default = null) : mixed | null
    - public [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md)() : array
    - public [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md)() : array
    - public [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md)() : array

}






Methods
==============

- [WritableCommandLineInput::setFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setFlags.md) &ndash; Sets the flags.
- [WritableCommandLineInput::setOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setOptions.md) &ndash; Sets the options.
- [WritableCommandLineInput::setParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/setParameters.md) &ndash; Sets the parameters.
- [WritableCommandLineInput::rewriteParameterIndexes](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput/rewriteParameterIndexes.md) &ndash; 
- [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput/__construct.md) &ndash; Builds the class instance.
- [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
- [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
- [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.





Location
=============
Ling\CliTools\Input\WritableCommandLineInput<br>
See the source code of [Ling\CliTools\Input\WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/Input/WritableCommandLineInput.php)



SeeAlso
==============
Previous class: [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md)<br>Next class: [BufferedOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput.md)<br>
