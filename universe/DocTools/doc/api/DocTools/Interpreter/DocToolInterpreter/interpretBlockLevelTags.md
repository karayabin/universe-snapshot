[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\Interpreter\DocToolInterpreter class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter.md)


DocToolInterpreter::interpretBlockLevelTags
================



DocToolInterpreter::interpretBlockLevelTags — Interprets the given $tags, and potentially configures the $comment accordingly.




Description
================


public [DocToolInterpreter::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter/interpretBlockLevelTags.md)(array $tags, [DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) $comment, array $info, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : void




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







See Also
================

The [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/DocToolInterpreter.md) class.
