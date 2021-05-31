[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The Output class
================
2019-02-26 --> 2021-05-31






Introduction
============

The Output class.
This is a basic implementation of the output interface.


This output has a default [bashtml formatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md),
which can be turned off by manually setting a [dumb formatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/DumbFormatter.md) using
the setFormatter method.



Class synopsis
==============


class <span class="pl-k">Output</span> implements [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) {

- Properties
    - protected [Ling\CliTools\Formatter\FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) [$formatter](#property-formatter) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/__construct.md)() : void
    - public [setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/setFormatter.md)([Ling\CliTools\Formatter\FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) $formatter) : void
    - public [write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/write.md)(string $message) : void

}




Properties
=============

- <span id="property-formatter"><b>formatter</b></span>

    This property holds the formatter to use for this instance.
    The default value is the [Ling\CliTools\Formatter\BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md).
    
    



Methods
==============

- [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/__construct.md) &ndash; Builds the Output instance.
- [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/setFormatter.md) &ndash; Sets the formatter.
- [Output::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/write.md) &ndash; Writes a message to the output.





Location
=============
Ling\CliTools\Output\Output<br>
See the source code of [Ling\CliTools\Output\Output](https://github.com/lingtalfi/CliTools/blob/master/Output/Output.php)



SeeAlso
==============
Previous class: [BufferedOutput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput.md)<br>Next class: [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md)<br>
