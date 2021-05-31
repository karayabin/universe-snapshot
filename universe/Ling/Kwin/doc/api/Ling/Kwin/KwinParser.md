[Back to the Ling/Kwin api](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin.md)



The KwinParser class
================
2021-02-18 --> 2021-05-31






Introduction
============

The KwinParser class.



Class synopsis
==============


class <span class="pl-k">KwinParser</span>  {

- Properties
    - private bool [$verbose](#property-verbose) ;
    - private string [$sBegin](#property-sBegin) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/__construct.md)() : void
    - public [parseString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/parseString.md)(string $str, ?array $options = []) : array
    - private [debug](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/debug.md)(string $msg) : void
    - private [error](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/error.md)(string $msg, ?int $code = null) : void

}




Properties
=============

- <span id="property-verbose"><b>verbose</b></span>

    This property holds the verbose for this instance.
    
    

- <span id="property-sBegin"><b>sBegin</b></span>

    This property holds the sBegin for this instance.
    
    



Methods
==============

- [KwinParser::__construct](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/__construct.md) &ndash; Builds the KwinParser instance.
- [KwinParser::parseString](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/parseString.md) &ndash; Returns a [kwin array](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#kwin-array) corresponding to the first command found in the given string.
- [KwinParser::debug](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/debug.md) &ndash; Prints a debug message if the verbose flag is set.
- [KwinParser::error](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/KwinParser/error.md) &ndash; Throws an exception.





Location
=============
Ling\Kwin\KwinParser<br>
See the source code of [Ling\Kwin\KwinParser](https://github.com/lingtalfi/Kwin/blob/master/KwinParser.php)



SeeAlso
==============
Previous class: [MiniMarkdownToBashtmlTranslator](https://github.com/lingtalfi/Kwin/blob/master/doc/api/Ling/Kwin/Helper/MiniMarkdownToBashtmlTranslator.md)<br>
