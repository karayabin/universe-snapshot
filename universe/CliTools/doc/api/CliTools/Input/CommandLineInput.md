[Back to the CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools.md)



The CommandLineInput class
================
2019-02-26 --> 2019-02-26






Introduction
============

The CommandLineInput class is an implementation of the command line as described by [the command line page](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md).


It specifies how parameters, options and flags should be written.



The command line structure
---------------------

The command line is composed of white-space separated components:


- **option**: an option contains an equal symbol (=). The key is the part on the left of the equal symbol, and the value is the part on the right.
- **parameter**: a parameter doesn't contain an equal symbol (=). A parameter doesn't start with a dash.
- **flag**: a parameter doesn't contain an equal symbol (=). A parameter starts with a dash.


Notes:
- An option can start with one (or more) dash.
- The value of a a flag always resolves to a boolean: true if set, or false if not set.
- Dashes at the beginning of an option or a flag are not part of the option name or flag name.
- Regular quoting (with single or double quotes) can be used to protect the option's values if necessary.
- The equal symbol (=) is reserved for separating an option key from its value, and therefore cannot be part of a parameter name, an option name, and/or a flag name.



### Example:

In the following command line:

- php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"


we have:

- php -f myprogram.php --: this is not part of the command line and irrelevant to our discussion.
- **makecoffee**: the first **parameter**
- **-v**: the **flag** v.
- **--sugars=2**: the **option** sugars with the value 2.
- **viennois**: the second **parameter**.
- **--no-cream**: the **flag** no-cream (value of true).
- **-qp**: the **flag** qp (value of true).
- **-say_word=ok**: **option** say_word with a value of "ok good".




How to use?
-------------

The command line is meant to be used in a terminal environment (i.e. not a web server environment).



/path/to/my_app/tmp/myprogram.php
```php


#!/usr/bin/env php
<?php


use CliTools\Input\CommandLineInput;

require_once __DIR__ . "/../universe/bigbang.php"; // activate universe



// Program was called like this:
//  php -f myprogram.php -- makecoffee -v --sugars=2 viennois --no-cream -qp -say_word="ok good"


$line = new CommandLineInput();

a($line->getParameter(1)); // string(10) "makecoffee"
a($line->getParameter(2)); // string(8) "viennois"
a($line->getParameter(3)); // NULL
a($line->getParameter(3, "default value")); // string(13) "default value"

a($line->getOption("sugars")); // string(1) "2"
a($line->getOption("say_word")); // string(7) "ok good"
a($line->getOption("not_an_option")); // NULL
a($line->getOption("not_an_option", 678)); // int(678)


a($line->hasFlag("v")); // bool(true)
a($line->hasFlag("-v")); // bool(false)
a($line->hasFlag("no-cream")); // bool(true)
a($line->hasFlag("q")); // bool(false)
a($line->hasFlag("p")); // bool(false)
a($line->hasFlag("qp")); // bool(true)
a($line->hasFlag("z")); // bool(false)


```



Class synopsis
==============


class <span class="pl-k">CommandLineInput</span> implements [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/InputInterface.md) {

- Properties
    - private array [$flags](#property-flags) ;
    - private array [$options](#property-options) ;
    - private array [$parameters](#property-parameters) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/__construct.md)(array $argv = null) : void
    - public [hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/hasFlag.md)(string $flagName) : bool
    - public [getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/getOption.md)(string $optionName, $default = null) : mixed | null
    - public [getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/getParameter.md)(int $index, $default = null) : mixed | null
    - private [prepare](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/prepare.md)(array $argv) : void

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

- [CommandLineInput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/__construct.md) &ndash; Builds the class instance.
- [CommandLineInput::hasFlag](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/hasFlag.md) &ndash; Returns whether the flag $flagName was set.
- [CommandLineInput::getOption](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/getOption.md) &ndash; Returns the value of the option $optionName if set, or the $default value if the option was not defined.
- [CommandLineInput::getParameter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/getParameter.md) &ndash; Returns the value of the parameter at index $index, or the $default value if no parameter was defined for the given index.
- [CommandLineInput::prepare](https://github.com/lingtalfi/CliTools/blob/master/doc/api/CliTools/Input/CommandLineInput/prepare.md) &ndash; Parses the command line and stores the flags, options and parameters to be accessed via the getter methods.





Location
=============
CliTools\Input\CommandLineInput