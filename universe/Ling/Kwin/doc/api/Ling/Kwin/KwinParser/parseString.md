[Back to the Ling/Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md)<br>
[Back to the Ling\Kwin\KwinParser class](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser.md)


KwinParser::parseString
================



KwinParser::parseString — Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.




Description
================


public [KwinParser::parseString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/parseString.md)(string $str, ?array $options = []) : array




Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.

Throws an exception if the syntax is not correct.

Available options are:

- verbose: bool=false, whether to display debug messages.




Parameters
================


- str

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [KwinParser::parseString](https://github.com/lingtalfi/Kwin/blob/master/KwinParser.php#L58-L247)


See Also
================

The [KwinParser](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/__construct.md)<br>Next method: [debug](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/debug.md)<br>

