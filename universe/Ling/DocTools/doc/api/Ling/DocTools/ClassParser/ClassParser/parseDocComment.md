[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\ClassParser\ClassParser class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md)


ClassParser::parseDocComment
================



ClassParser::parseDocComment — Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.




Description
================


protected [ClassParser::parseDocComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/parseDocComment.md)(string $rawComment, string $elementType, string $elementId) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md)




Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.

The doc comment is parsed line after line, from top to bottom.

By default, the text of the comment is considered as part of
the "main comment".

When a tag is found however, it disrupts the flow and any subsequent content
is considered as part of this tag.
Until the next tag, and so on...




Parameters
================


- rawComment

    

- elementType

    The type of the element the comment is written for, can be one of:
- class
- property (class property)
- method

- elementId

    An element identifier


Return values
================

Returns [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md).








Source Code
===========
See the source code for method [ClassParser::parseDocComment](https://github.com/lingtalfi/DocTools/blob/master/ClassParser/ClassParser.php#L725-L886)


See Also
================

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser.md) class.

Previous method: [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/setGeneratedItemsToUrl.md)<br>Next method: [getPropertySignature](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/ClassParser/ClassParser/getPropertySignature.md)<br>

