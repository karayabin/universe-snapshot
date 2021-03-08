[Back to the Ling/Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md)<br>
[Back to the Ling\Kwin\KwinParser class](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser.md)


KwinParser::parseString
================



KwinParser::parseString — Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.




Description
================


public [KwinParser::parseString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/parseString.md)(string $str) : array




Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.

Throws an exception if the syntax is not correct.




Parameters
================


- str

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [KwinParser::parseString](https://github.com/lingtalfi/Kwin/blob/master/KwinParser.php#L31-L179)


See Also
================

The [KwinParser](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser.md) class.

Next method: [error](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/error.md)<br>

