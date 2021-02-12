[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\CommandLineInputHelper class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md)


CommandLineInputHelper::getCommandLineByInput
================



CommandLineInputHelper::getCommandLineByInput — Returns the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) version of the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) from the given input.




Description
================


public static [CommandLineInputHelper::getCommandLineByInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getCommandLineByInput.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input) : string




Returns the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) version of the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) from the given input.
Note that the functionality of the returned command line will be the same, but the order of arguments and notation might change, in particular:

- combined flags will be expanded as individuals
- all options will be protected by double quotes
- we always return arguments in this order:
     - parameters
     - options
     - flags




Parameters
================


- input

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [CommandLineInputHelper::getCommandLineByInput](https://github.com/lingtalfi/CliTools/blob/master/Helper/CommandLineInputHelper.php#L84-L131)


See Also
================

The [CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md) class.

Previous method: [paramStringToArgv](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/paramStringToArgv.md)<br>Next method: [escape](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/escape.md)<br>

