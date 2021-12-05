[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)



The BufferedOutput class
================
2019-02-26 --> 2021-07-08






Introduction
============

The BufferedOutput class.
This output stores the messages in a buffer rather than spitting out every message right away.

The client can then:

- display the whole list of messages when she wants
- resets the messages list



Class synopsis
==============


class <span class="pl-k">BufferedOutput</span> implements [OutputInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/OutputInterface.md) {

- Properties
    - protected array [$messages](#property-messages) ;
    - protected [Ling\CliTools\Formatter\FormatterInterface](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/FormatterInterface.md) [$formatter](#property-formatter) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/__construct.md)() : void
    - public [write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/write.md)(string $message) : void
    - public [reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/reset.md)() : void
    - public [writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/writeMessages.md)() : void
    - public [getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/getMessages.md)() : array

}




Properties
=============

- <span id="property-messages"><b>messages</b></span>

    This property holds the list of all the non-formatted messages written to this instance.
    It's an array of strings (each string being a message).
    
    

- <span id="property-formatter"><b>formatter</b></span>

    This property holds the formatter to use for this instance.
    The default value is the [Ling\CliTools\Formatter\BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md).
    
    



Methods
==============

- [BufferedOutput::__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/__construct.md) &ndash; Builds the Output instance.
- [BufferedOutput::write](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/write.md) &ndash; Writes a message to the output.
- [BufferedOutput::reset](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/reset.md) &ndash; Resets the messages buffer.
- [BufferedOutput::writeMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/writeMessages.md) &ndash; Prints the buffered messages.
- [BufferedOutput::getMessages](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/BufferedOutput/getMessages.md) &ndash; Returns the buffered messages.





Location
=============
Ling\CliTools\Output\BufferedOutput<br>
See the source code of [Ling\CliTools\Output\BufferedOutput](https://github.com/lingtalfi/CliTools/blob/master/Output/BufferedOutput.php)



SeeAlso
==============
Previous class: [WritableCommandLineInput](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/WritableCommandLineInput.md)<br>Next class: [Output](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Output/Output.md)<br>
