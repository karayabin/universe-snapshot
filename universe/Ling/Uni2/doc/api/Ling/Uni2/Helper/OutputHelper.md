[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The OutputHelper class
================
2019-03-12 --> 2019-03-19






Introduction
============

The OutputHelper class.
Contains helpers related to the [output object](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md).



Class synopsis
==============


class <span class="pl-k">OutputHelper</span> extends [VirginiaMessageHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper.md)  {

- Inherited methods
    - public static [VirginiaMessageHelper::success](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/success.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::info](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/info.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::command](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/command.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::warning](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/warning.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::error](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/error.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::discover](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/discover.md)(?$message, Ling\CliTools\Output\OutputInterface $output, int $indent = 0) : void
    - public static [VirginiaMessageHelper::i](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/i.md)($level = 0) : string
    - public static [VirginiaMessageHelper::j](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/j.md)($level = 0) : string
    - public static [VirginiaMessageHelper::s](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/VirginiaMessageHelper/s.md)($level = 0) : string

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
Ling\Uni2\Helper\OutputHelper


SeeAlso
==============
Previous class: [DependencyMasterHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/DependencyMasterHelper.md)<br>Next class: [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)<br>
