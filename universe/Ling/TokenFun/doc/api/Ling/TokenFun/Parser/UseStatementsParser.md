[Back to the Ling/TokenFun api](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun.md)



The UseStatementsParser class
================
2020-07-28 --> 2021-08-16






Introduction
============

The UseStatementsParser class.



Class synopsis
==============


class <span class="pl-k">UseStatementsParser</span>  {

- Methods
    - public [parseTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/parseTokens.md)(array $tokens) : array
    - private [debugToken](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/debugToken.md)(array|string $token) : string

}






Methods
==============

- [UseStatementsParser::parseTokens](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/parseTokens.md) &ndash; The method will stop parsing tokens after it encounters the first "class" token, assuming the class is [bsr0 compatible](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md).
- [UseStatementsParser::debugToken](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Parser/UseStatementsParser/debugToken.md) &ndash; Returns a string representation of the token, suitable for debugging purposes.





Location
=============
Ling\TokenFun\Parser\UseStatementsParser<br>
See the source code of [Ling\TokenFun\Parser\UseStatementsParser](https://github.com/lingtalfi/TokenFun/blob/master/Parser/UseStatementsParser.php)



SeeAlso
==============
Previous class: [TokenFunException](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/Exception/TokenFunException.md)<br>Next class: [TokenArrayIterator](https://github.com/lingtalfi/TokenFun/blob/master/doc/api/Ling/TokenFun/TokenArrayIterator/TokenArrayIterator.md)<br>
