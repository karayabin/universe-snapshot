[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Interpreter\DocToolInterpreter class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md)


DocToolInterpreter::interpretBlockLevelTags
================



DocToolInterpreter::interpretBlockLevelTags — Interprets the given $tags, and potentially configures the $comment accordingly.




Description
================


public [DocToolInterpreter::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/interpretBlockLevelTags.md)(array $tags, [Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment, array $info, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : void




Interprets the given $tags, and potentially configures the $comment accordingly.




Parameters
================


- tags

    

- comment

    

- info

    An array containing the following variables:
- declaringClass: the name of the class in which the doc comment was written.

- report

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [DocToolInterpreter::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/Interpreter/DocToolInterpreter.php#L79-L143)


See Also
================

The [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md) class.

Previous method: [resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/resolveInlineTags.md)<br>Next method: [setGeneratedItemsToUrl](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/setGeneratedItemsToUrl.md)<br>

