[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\ClassParser\ClassParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)


ClassParser::parse
================



ClassParser::parse — Returns a ClassInfo object from the given $className.




Description
================


public [ClassParser::parse](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parse.md)(string $className) : [InfoInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/InfoInterface.md)




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







Source Code
===========
See the source code for method [ClassParser::parse](https://github.com/lingtalfi/DocTools/blob/master/ClassParser/ClassParser.php#L140-L636)


See Also
================

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md) class.

Previous method: [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/__construct.md)<br>Next method: [setResolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setResolveInlineTags.md)<br>

