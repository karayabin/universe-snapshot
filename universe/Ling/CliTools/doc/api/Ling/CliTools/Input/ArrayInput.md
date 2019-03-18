[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The ArrayInput class
================
2019-02-26 --> 2019-03-18






Introduction
============

The ArrayInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).
It's fed by the developer manually, and is therefore used to invoke programs manually from the code.



How to use?
---------------

You basically set all your parameters, options and flags using the setItems method, like in the following example.



```php
#!/usr/bin/env php
<?php


use Ling\CliTools\Input\ArrayInput;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe


$line = new ArrayInput();
$line->setItems([
":parameter" => true,
"optionName" => 667,
"optionName2" => "a value",
"-flag1" => true,
"-flag2" => true,
":the_parameter2" => true,
]);


$line->getParameter(1); // parameter
$line->getParameter(2); // the_parameter2
$line->getParameter(3); // null
$line->getParameter(3, "default val"); // default val

$line->getOption( "optionName"); // 667
$line->getOption( "optionName2"); // a value
$line->getOption( "optionName3"); // null
$line->getOption( "optionName3", "default_val"); // default_val

$line->hasFlag("flag1"); // true
$line->hasFlag("flag2"); // true
$line->hasFlag("flag3"); // false
```


As you can guess, the type of the item depends on the key:

- if the key starts with a dash (-), then it's a flag. The value has to be true. The flag name is what's after the dash.
- if the key starts with a colon (:), then it's a parameter. The value has to be true. The parameter name is what's after the colon.
- otherwise, it's an option, and the value is the value of the option.



Class synopsis
==============


class <span class="pl-k">ArrayInput</span> extends [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput.md) implements [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) {

- Inherited properties
    - protected array [AbstractInput::$flags](#property-flags) ;
    - protected array [AbstractInput::$options](#property-options) ;
    - protected array [AbstractInput::$parameters](#property-parameters) ;

- Methods
    - public [setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput/setItems.md)(array $items) : void

- Inherited methods
    - public [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md)() : void
    - public [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md)(string $flagName) : bool
    - public [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md)(string $optionName, $default = null) : mixed | null
    - public [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md)(int $index, $default = null) : mixed | null
    - public [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md)() : array
    - public [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md)() : array
    - public [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md)() : array

}






Methods
==============

- [ArrayInput::setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/ArrayInput/setItems.md) &ndash; Sets the items (parameters, options, flags) for this instance.
- [AbstractInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/__construct.md) &ndash; Builds the class instance.
- [AbstractInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [AbstractInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [AbstractInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [AbstractInput::getParameters](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getParameters.md) &ndash; Returns the list of all parameters, in the order they were written.
- [AbstractInput::getOptions](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getOptions.md) &ndash; Returns the list of all options (key/value pairs), in the order they were written.
- [AbstractInput::getFlags](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput/getFlags.md) &ndash; Returns the list of all flags, in the order they were written.





Location
=============
Ling\CliTools\Input\ArrayInput


SeeAlso
==============
Previous class: [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput.md)<br>Next class: [CommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md)<br>
