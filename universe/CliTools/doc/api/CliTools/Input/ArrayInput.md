[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The ArrayInput class
================
2019-02-26 --> 2019-02-26






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


use CliTools\Input\ArrayInput;

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


class <span class="pl-k">ArrayInput</span> implements [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) {

- Properties
    - private array [$flags](#property-flags) ;
    - private array [$options](#property-options) ;
    - private array [$parameters](#property-parameters) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/__construct.md)() : void
    - public [hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/hasFlag.md)(string $flagName) : bool
    - public [getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/getOption.md)(string $optionName, $default = null) : mixed | null
    - public [getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/getParameter.md)(int $index, $default = null) : mixed | null
    - public [setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/setItems.md)(array $items) : void

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

- [ArrayInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/__construct.md) &ndash; Builds the class instance.
- [ArrayInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [ArrayInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [ArrayInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [ArrayInput::setItems](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/ArrayInput/setItems.md) &ndash; Sets the items (parameters, options, flags) for this instance.





Location
=============
CliTools\Input\ArrayInput