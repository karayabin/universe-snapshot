ClassParser::parseDocComment
================

ClassParser::parseDocComment — Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.

Description
---------------


protected [ClassParser::parseDocComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser/parseDocComment.md)(string $rawComment, string $elementType) : [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md)




Parses the raw doc comment and returns a DocTools\Info\CommentInfo object.

The doc comment is parsed line after line, from top to bottom.

By default, the text of the comment is considered as part of
the "main comment".

When a tag is found however, it disrupts the flow and any subsequent content
is considered as part of this tag.
Until the next tag, and so on...




Parameters
--------------

- rawComment
    - elementType
    The type of the element the comment is written for, can be one of:
- class
- property (class property)
- method

Return values
----------------

Returns [CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md).









See Also
-----------

The [ClassParser](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/ClassParser/ClassParser.md) class.
