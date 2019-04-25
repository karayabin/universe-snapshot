[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The ClassParserInterface class
================
2019-02-21 --> 2019-04-18






Introduction
============

The ClassParserInterface interface represents a class parser.

A class parser will parse a class and return a [ClassInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md) object, which gives us info
about the class, such as its name,  its comment, its properties, its methods, ...


A class parser will by default interpret the [docTool markup language](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md).

A class parser speaks markdown language only.
Html conversion is done by the client at a later step if necessary.



Class synopsis
==============


abstract class <span class="pl-k">ClassParserInterface</span> implements [GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface.md) {

- Methods
    - abstract public [parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/parse.md)(string $className) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)
    - abstract public [getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/getReport.md)() : [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)

}






Methods
==============

- [ClassParserInterface::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/parse.md) &ndash; Returns a ClassInfo object from the given $className.
- [ClassParserInterface::getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/getReport.md) &ndash; Returns the parser report.





Location
=============
Ling\DocTools\ClassParser\ClassParserInterface


SeeAlso
==============
Previous class: [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)<br>Next class: [CopyModule](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/CopyModule/CopyModule.md)<br>
