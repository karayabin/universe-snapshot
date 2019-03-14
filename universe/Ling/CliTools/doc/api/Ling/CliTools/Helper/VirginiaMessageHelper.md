[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The VirginiaMessageHelper class
================
2019-02-26 --> 2019-03-14






Introduction
============

The VirginiaMessageHelper class.
Contains message formatting helpers.


It basically puts a colored label at the beginning of each line, this improving readability.
See the examples section for more details.


This helper is used by the Uni2 planet.



Class synopsis
==============


class <span class="pl-k">VirginiaMessageHelper</span>  {

- Methods
    - public static [success](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/success.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [info](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/info.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [command](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/command.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [warning](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/warning.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [error](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/error.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [discover](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/discover.md)(?$message, [Ling\CliTools\Output\OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) $output, int $indent = 0) : void
    - public static [i](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/i.md)($level = 0) : string
    - public static [j](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/j.md)($level = 0) : string
    - public static [s](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/s.md)($level = 0) : string

}






Methods
==============

- [VirginiaMessageHelper::success](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/success.md) &ndash; Writes a success message to the output.
- [VirginiaMessageHelper::info](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/info.md) &ndash; Writes an info message to the output.
- [VirginiaMessageHelper::command](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/command.md) &ndash; Writes a command message to the output.
- [VirginiaMessageHelper::warning](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/warning.md) &ndash; Writes a warning message to the output.
- [VirginiaMessageHelper::error](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/error.md) &ndash; Writes an error message to the output.
- [VirginiaMessageHelper::discover](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/discover.md) &ndash; Writes a discover message to the output.
- [VirginiaMessageHelper::i](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/i.md) &ndash; Returns an indent string which $length is proportional to the given $level.
- [VirginiaMessageHelper::j](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/j.md) &ndash; Returns another indent string which $length is proportional to the given $level.
- [VirginiaMessageHelper::s](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/s.md) &ndash; Returns an indent block of white space, which $length is proportional to the given $level.





Location
=============
Ling\CliTools\Helper\VirginiaMessageHelper


SeeAlso
==============
Previous class: [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)<br>Next class: [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput.md)<br>
