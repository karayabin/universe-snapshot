[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The AbstractInput class
================
2019-02-26 --> 2019-03-26






Introduction
============

The AbstractInput class is a base class that abstracts the base logic for an InputInterface implementation.



Class synopsis
==============


abstract class <span class="pl-k">AbstractInput</span> implements [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) {

- Properties
    - protected array [$flags](#property-flags) ;
    - protected array [$options](#property-options) ;
    - protected array [$parameters](#property-parameters) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md)() : void
    - public [hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md)(string $flagName) : bool
    - public [getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md)(string $optionName, $default = null) : mixed | null
    - public [getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md)(int $index, $default = null) : mixed | null
    - public [getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md)() : array
    - public [getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md)() : array
    - public [getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md)() : array

}




Properties
=============

- <span id="property-flags"><b>flags</b></span>

    This property holds the array of set flags.
    It's an array of key => true
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the values of the options passed to the program.
    
    It's an array of key => value
    
    

- <span id="property-parameters"><b>parameters</b></span>

    This property holds the parameters passed to the program.
    
    It's an array of index => value, with index starting at 1.
    Parameters are registered in order from left to right.
    
    



Methods
==============

- [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
- [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
- [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
- [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.





Location
=============
Ling\CliTools\Input\AbstractInput


SeeAlso
==============
Previous class: [VirginiaMessageHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper.md)<br>Next class: [ArrayInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput.md)<br>
