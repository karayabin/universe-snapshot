[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The GenericParserInterface class
================
2019-02-21 --> 2020-06-29






Introduction
============

The GenericParserInterface interface is a generic interface for parsers.
It's implemented by the [Ling\DocTools\ClassParser\ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md) class and the [Ling\DocTools\PlanetParser\PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/PlanetParser/PlanetParser.md) class.



Class synopsis
==============


abstract class <span class="pl-k">GenericParserInterface</span>  {

- Methods
    - abstract public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface/parse.md)(string $element) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)

}






Methods
==============

- [GenericParserInterface::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface/parse.md) &ndash; Parses the given $element and returns a [Ling\DocTools\Info\InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md) object.





Location
=============
Ling\DocTools\GenericParser\GenericParserInterface<br>
See the source code of [Ling\DocTools\GenericParser\GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/GenericParser/GenericParserInterface.php)



SeeAlso
==============
Previous class: [GeneratedDocStyleInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GeneratedDocStyle/GeneratedDocStyleInterface.md)<br>Next class: [ClassNameHelper](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Helper/ClassNameHelper.md)<br>
