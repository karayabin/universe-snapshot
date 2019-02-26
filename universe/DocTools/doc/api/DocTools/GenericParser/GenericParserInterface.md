[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)



The GenericParserInterface class
================
2019-02-21 --> 2019-02-26






Introduction
============

The GenericParserInterface interface is a generic interface for parsers.
It's implemented by the [DocTools\ClassParser\ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md) class and the [DocTools\PlanetParser\PlanetParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/PlanetParser/PlanetParser.md) class.



Class synopsis
==============


abstract class <span class="pl-k">GenericParserInterface</span>  {

- Methods
    - abstract public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/GenericParser/GenericParserInterface/parse.md)(string $element) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md)

}






Methods
==============

- [GenericParserInterface::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/GenericParser/GenericParserInterface/parse.md) &ndash; Parses the given $element and returns a [DocTools\Info\InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/InfoInterface.md) object.





Location
=============
DocTools\GenericParser\GenericParserInterface