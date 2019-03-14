[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The BufferedOutput class
================
2019-02-26 --> 2019-03-14






Introduction
============

The BufferedOutput class.
This output stores the messages in a buffer rather than spitting out every message right away.

The client can then:

- display the whole list of messages when she wants
- resets the messages list



Class synopsis
==============


class <span class="pl-k">BufferedOutput</span> extends [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output.md) implements [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) {

- Inherited properties
    - protected array [Output::$messages](#property-messages) ;
    - protected [Ling\CliTools\Formatter\FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) [Output::$formatter](#property-formatter) ;

- Methods
    - public [write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/write.md)(string $message) : void
    - public [reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/reset.md)() : void
    - public [writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/writeMessages.md)() : void
    - public [getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/getMessages.md)() : array

- Inherited methods
    - public [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/__construct.md)() : void
    - public [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/setFormatter.md)([Ling\CliTools\Formatter\FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) $formatter) : void

}






Methods
==============

- [BufferedOutput::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/write.md) &ndash; Writes a message to the output.
- [BufferedOutput::reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/reset.md) &ndash; Resets the messages buffer.
- [BufferedOutput::writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/writeMessages.md) &ndash; Prints the buffered messages.
- [BufferedOutput::getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/getMessages.md) &ndash; Returns the buffered messages.
- [Output::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/__construct.md) &ndash; Builds the Output instance.
- [Output::setFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output/setFormatter.md) &ndash; Sets the formatter.





Location
=============
Ling\CliTools\Output\BufferedOutput


SeeAlso
==============
Previous class: [InputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/InputInterface.md)<br>Next class: [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output.md)<br>
