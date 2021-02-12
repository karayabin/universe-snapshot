[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Helper\CommandLineInputHelper class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md)


CommandLineInputHelper::getInputWritableCopy
================



CommandLineInputHelper::getInputWritableCopy — Returns a WritableCommandLineInput instance, copy of the given input.




Description
================


public static [CommandLineInputHelper::getInputWritableCopy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getInputWritableCopy.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, ?array $options = []) : [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md)




Returns a WritableCommandLineInput instance, copy of the given input.

Available options are:
- parameters: array of new parameters to use instead of the one from the given input




Parameters
================


- input

    

- options

    


Return values
================

Returns [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md).








Source Code
===========
See the source code for method [CommandLineInputHelper::getInputWritableCopy](https://github.com/lingtalfi/CliTools/blob/master/Helper/CommandLineInputHelper.php#L28-L46)


See Also
================

The [CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md) class.

Next method: [paramStringToArgv](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/paramStringToArgv.md)<br>

