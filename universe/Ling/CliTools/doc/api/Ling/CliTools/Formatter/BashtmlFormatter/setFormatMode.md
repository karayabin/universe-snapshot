[Back to the Ling/CliTools api](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools.md)<br>
[Back to the Ling\CliTools\Formatter\BashtmlFormatter class](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md)


BashtmlFormatter::setFormatMode
================



BashtmlFormatter::setFormatMode — Sets the format mode.




Description
================


public [BashtmlFormatter::setFormatMode](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/setFormatMode.md)(string $mode) : void




Sets the format mode.
Can be one of:
- cli
- web

This affects how the messages are formatted, either for the cli or the web.
By default, our class makes its own guess based on what environment the call to the format was made from.
You can force a format using this method.




Parameters
================


- mode

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [BashtmlFormatter::setFormatMode](https://github.com/lingtalfi/CliTools/blob/master/Formatter/BashtmlFormatter.php#L268-L277)


See Also
================

The [BashtmlFormatter](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter.md) class.

Previous method: [__construct](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/__construct.md)<br>Next method: [format](https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Formatter/BashtmlFormatter/format.md)<br>

