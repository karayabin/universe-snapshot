[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Interpreter\NotationInterpreterInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md)


NotationInterpreterInterface::interpretBlockLevelTags
================



NotationInterpreterInterface::interpretBlockLevelTags — Interprets the given $tags, and potentially configures the $comment accordingly.




Description
================


abstract public [NotationInterpreterInterface::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md)(array $tags, [Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment, array $info, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : void




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
See the source code for method [NotationInterpreterInterface::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/Interpreter/NotationInterpreterInterface.php#L44-L44)


See Also
================

The [NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) class.

Previous method: [resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/resolveInlineTags.md)<br>

