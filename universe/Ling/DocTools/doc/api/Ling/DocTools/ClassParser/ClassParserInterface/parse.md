[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\ClassParser\ClassParserInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md)


ClassParserInterface::parse
================



ClassParserInterface::parse — Returns a ClassInfo object from the given $className.




Description
================


abstract public [ClassParserInterface::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/parse.md)(string $className) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)




Returns a ClassInfo object from the given $className.
Note that this method overrides a method of the same name
defined in the parent interface [Ling\DocTools\GenericParser\GenericParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/GenericParser/GenericParserInterface.md).

See also [the ClassInfo class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/ClassInfo.md)


Parameters
================


- className

    


Return values
================

Returns [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md).


Exceptions thrown
================

- [ClassParserException](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Exception/ClassParserException.md).&nbsp;







See Also
================

The [ClassParserInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface.md) class.

Next method: [getReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParserInterface/getReport.md)<br>

