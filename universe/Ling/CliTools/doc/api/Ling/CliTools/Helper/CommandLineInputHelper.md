[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The CommandLineInputHelper class
================
2019-02-26 --> 2021-05-31






Introduction
============

The CommandLineInputHelper class.



Class synopsis
==============


class <span class="pl-k">CommandLineInputHelper</span>  {

- Methods
    - public static [getInputWritableCopy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getInputWritableCopy.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input, ?array $options = []) : [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md)
    - public static [paramStringToArgv](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/paramStringToArgv.md)(string $str) : array
    - public static [getCommandLineByInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getCommandLineByInput.md)([Ling\CliTools\Input\InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md) $input) : string
    - private static [escape](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/escape.md)(string $str) : string
    - private static [escapeDoubleQuotes](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/escapeDoubleQuotes.md)(string $str) : string

}






Methods
==============

- [CommandLineInputHelper::getInputWritableCopy](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getInputWritableCopy.md) &ndash; Returns a WritableCommandLineInput instance, copy of the given input.
- [CommandLineInputHelper::paramStringToArgv](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/paramStringToArgv.md) &ndash; Returns the argv array version of the given param string.
- [CommandLineInputHelper::getCommandLineByInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/getCommandLineByInput.md) &ndash; Returns the [command line input](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md) version of the [command line](https://github.com/lingtalfi/CliTools/blob/master/doc/pages/command-line.md) from the given input.
- [CommandLineInputHelper::escape](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/escape.md) &ndash; Returns the quote escaped version of the given string.
- [CommandLineInputHelper::escapeDoubleQuotes](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper/escapeDoubleQuotes.md) &ndash; Returns the double quote escaped version of the given string.





Location
=============
Ling\CliTools\Helper\CommandLineInputHelper<br>
See the source code of [Ling\CliTools\Helper\CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/Helper/CommandLineInputHelper.php)



SeeAlso
==============
Previous class: [BashtmlStringTool](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/BashtmlStringTool.md)<br>Next class: [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)<br>
