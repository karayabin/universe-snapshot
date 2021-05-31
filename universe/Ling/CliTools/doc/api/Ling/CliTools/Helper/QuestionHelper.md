[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The QuestionHelper class
================
2019-02-26 --> 2021-05-31






Introduction
============

The QuestionHelper class.

It helps asking questions to the user (and getting the answer).



Class synopsis
==============


class <span class="pl-k">QuestionHelper</span>  {

- Methods
    - public static [ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/ask.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question, ?callable $validate = null) : string
    - public static [askClear](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askClear.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question, string $retryMessage, ?callable $validate = null) : string
    - public static [askYesNo](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askYesNo.md)([Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, string $question) : bool

}






Methods
==============

- [QuestionHelper::ask](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/ask.md) &ndash; Asks the given $question to the $user, and returns the answer (string).
- [QuestionHelper::askClear](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askClear.md) &ndash; Prints a question to the terminal.
- [QuestionHelper::askYesNo](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper/askYesNo.md) &ndash; Asks the given question to the user, repeats it until the answer is either y or n, and returns whether the answer was y.





Location
=============
Ling\CliTools\Helper\QuestionHelper<br>
See the source code of [Ling\CliTools\Helper\QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/Helper/QuestionHelper.php)



SeeAlso
==============
Previous class: [CommandLineInputHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/CommandLineInputHelper.md)<br>Next class: [VirginiaMessageHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper.md)<br>
