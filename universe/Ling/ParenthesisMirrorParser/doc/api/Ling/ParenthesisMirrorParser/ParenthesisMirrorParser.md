[Back to the Ling/ParenthesisMirrorParser api](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser.md)



The ParenthesisMirrorParser class
================
2020-10-05 --> 2021-03-05






Introduction
============

The ParenthesisMirrorParser class.



Class synopsis
==============


class <span class="pl-k">ParenthesisMirrorParser</span>  {

- Properties
    - protected string [$identifier](#property-identifier) ;
    - protected callable [$converter](#property-converter) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/__construct.md)() : void
    - public [setIdentifier](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/setIdentifier.md)(string $identifier) : void
    - public [setConverter](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/setConverter.md)(callable $converter) : void
    - public [parseString](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/parseString.md)(string $s) : string
    - public [parseArray](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/parseArray.md)(array $arr) : array

}




Properties
=============

- <span id="property-identifier"><b>identifier</b></span>

    This property holds the identifier for this instance.
    
    

- <span id="property-converter"><b>converter</b></span>

    This property holds the converter for this instance.
    
    



Methods
==============

- [ParenthesisMirrorParser::__construct](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/__construct.md) &ndash; Builds the ParenthesisMirrorParser instance.
- [ParenthesisMirrorParser::setIdentifier](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/setIdentifier.md) &ndash; Sets the identifier.
- [ParenthesisMirrorParser::setConverter](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/setConverter.md) &ndash; Sets the converter.
- [ParenthesisMirrorParser::parseString](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/parseString.md) &ndash; Parses the given string, and replaces the parenthesis wrappers accordingly.
- [ParenthesisMirrorParser::parseArray](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/api/Ling/ParenthesisMirrorParser/ParenthesisMirrorParser/parseArray.md) &ndash; Parses the given array recursively, and replaces the parenthesis wrappers accordingly.





Location
=============
Ling\ParenthesisMirrorParser\ParenthesisMirrorParser<br>
See the source code of [Ling\ParenthesisMirrorParser\ParenthesisMirrorParser](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/ParenthesisMirrorParser.php)



