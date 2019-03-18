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


This helper is used by [the Uni2 planet](https://github.com/lingtalfi/Uni2).



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


Examples
==========

#!/usr/bin/env php
<?php


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Output\Output;


require_once "/myphp/universe/bigbang.php"; // activate universe


$out = new Output();
H::info("This is a demo of virginia message helper." . PHP_EOL, $out);
H::info("Starting <bold>Make some coffee</bold> command:" . PHP_EOL, $out);
H::info("Gathering information from the web servers...", $out, 1);
$out->write('<success>ok</success>' . PHP_EOL);
H::discover("New type of coffee found: <bold>Mounty cream</bold>." . PHP_EOL, $out, 1);
H::warning("No definition found for coffee type <bold>Mounty cream</bold>." . PHP_EOL, $out, 2);
H::info("Will use default coffee: <bold>Cappuccino</bold>." . PHP_EOL, $out, 2);
H::command("coffee_maker make with-sugars=2 type=cappuccino" . PHP_EOL, $out, 1);
H::success("Congrats! Cappuccino coffee is ready at slot 9785." . PHP_EOL, $out);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::error("Oh wait! no, somebody spat in the coffee, please abort." . PHP_EOL, $out, 1);
H::info(H::s(2) . "I'm just kidding." . PHP_EOL, $out);
H::info(H::s(2) . "By the way this is an indented line using the <bold>s</bold> method." . PHP_EOL, $out);
H::info(H::i(2) . "By the way this is an indented line using the <bold>i</bold> method." . PHP_EOL, $out);
H::info(H::j(2) . "By the way this is an indented line using the <bold>j</bold> method." . PHP_EOL, $out);
H::info(H::s(0) . "You" . PHP_EOL, $out);
H::info(H::s(1) . "can" . PHP_EOL, $out);
H::info(H::s(2) . "control" . PHP_EOL, $out);
H::info(H::s(3) . "the" . PHP_EOL, $out);
H::info(H::s(4) . "indent" . PHP_EOL, $out);
H::info(H::s(5) . "level" . PHP_EOL, $out);
H::info(H::s(6) . "and" . PHP_EOL, $out);
H::info(H::s(5) . "your" . PHP_EOL, $out);
H::info(H::i(4) . "indent" . PHP_EOL, $out);
H::info(H::i(3) . "style" . PHP_EOL, $out);
H::info(H::i(2) . "like" . PHP_EOL, $out);
H::info(H::i(1) . "this." . PHP_EOL, $out);
H::info(H::i(0) . "So" . PHP_EOL, $out);
H::info(H::j(1) . "basically" . PHP_EOL, $out);
H::info(H::j(2) . "<bold>VirginiaMessageHelper</bold>" . PHP_EOL, $out);
H::info(H::j(3) . "gives" . PHP_EOL, $out);
H::info(H::j(4) . "you" . PHP_EOL, $out);
H::info(H::j(3) . "<bold:red:bgLightYellow>full control</bold:red:bgLightYellow>" . PHP_EOL, $out);
H::info(H::j(2) . "over" . PHP_EOL, $out);
H::info(H::j(1) . "your" . PHP_EOL, $out);
H::info(H::j(0) . "formatting." . PHP_EOL, $out);







Location
=============
Ling\CliTools\Helper\VirginiaMessageHelper


SeeAlso
==============
Previous class: [QuestionHelper](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Helper/QuestionHelper.md)<br>Next class: [AbstractInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/AbstractInput.md)<br>
