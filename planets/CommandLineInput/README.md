CommandLineInput
===================
2017-03-30




Api to access command line options and parameters.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).




Install
============
Download the code directly, or you can use the [uni tool](https://github.com/lingtalfi/universe-naive-importer):

```bash
cd /my/app
uni import CommandLineInput
```



Example
============

Below is a working console program written in php.
The program does nothing but demonstrate how this class works.


```php
#!/usr/bin/env php
<?php


use CommandLineInput\CommandLineInput;


require_once __DIR__ . "/../boot.php"; // start your autoloaders...


$input = CommandLineInput::create($argv)
//$input = ProgramOutputAwareCommandLineInput::create($argv)
//    ->setProgramOutput(ProgramOutput::create())
    ->addFlag("v")
    ->addFlag("f")
    ->addFlag("r")
    ->addFlag("viennois")

    ->addOption("p")
    ->addOption("nb-sugars");


// php -f program.php -- makecoffee -vf --viennois -p=root --nb-sugars=2 apple

// correct usage
a($input->getFlagValue("v")); // true
a($input->getFlagValue("f")); // true
a($input->getFlagValue("r")); // false
a($input->getFlagValue("viennois")); // true

a($input->getOptionValue("p")); // root
a($input->getOptionValue("nb-sugars")); // 2
a($input->getParameter(1)); // makecoffee
a($input->getParameter(2)); // apple


// wrong usage
a($input->getFlagValue("k", null)); // null, not defined
a($input->getFlagValue("coca", null)); // null, not defined
a($input->getOptionValue("boot")); // null, not defined
a($input->getParameter(6)); // null, not defined





```


Documentation
================

You can find the text below in the source code of the CommandLineInputInterface interface.
It explains how command line arguments should be written in order to work with this class.
 
 


This object is an api to access command line options and parameters.
What's an option and what's a parameter might be redefined on a per concrete class basis.

But if otherwise not specified, here is the conception that should prevail.



Options
=============
An option is one of two types:

- flag
- option with value


A flag is an option without value.
To differentiate between both types, we use the equal symbol (=) for options with value.

An equal symbol is used to separate the key from a value.
There is no space around the equal symbol.

Options with values and flags are prefixed with one or two dashes, depending on
the length of the flag name or option name.

A one letter flag or option would be prefixed with one dash,
while a longer flag or option would be prefixed by two dashes.

It's also possible to combine multiple one letter flags in one.
For instance, -vf is equivalent to -v -f.


An option value can be surrounded with single or double quotes to enclose
some special chars (like space for instance).
For instance, --my-option="some value"


This interface provides methods to access the flags and options present in the command line.
All access methods allow to define a default value for when the option/flag is not set on the command line.
By default, when a flag is not set, false is returned.




Parameters
=============
A parameter is any string in the command line that doesn't start with a dash.

So for instance, given the following command line:

     php -f myprogram.php makecoffee -v --sugars=2 viennois

The parameters are: makecoffee and viennois.
They should be accessible by their number, starting with 1 (not 0).
So parameter 1 would be makecoffee, and viennois would be parameter 2.

Note that a parameter can be a command name (like makecoffee in this case) or even a value like "my car is green",
but that's your responsibility to differentiate the role of the parameter in your context.






History Log
------------------
    
- 1.1.0 -- 2017-03-30

    - make better use of default values
    
- 1.0.0 -- 2017-03-30

    - initial commit
    
    


