NotationInterpreterInterface::interpretBlockLevelTags
================

NotationInterpreterInterface::interpretBlockLevelTags — Interprets the given $tags, and potentially configures the $comment accordingly.

Description
---------------


abstract public [NotationInterpreterInterface::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md)(array $tags, [DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Info/CommentInfo.md) $comment, array $info, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : void




Interprets the given $tags, and potentially configures the $comment accordingly.




Parameters
--------------


- tags

    

- comment

    

- info

    An array containing the following variables:
- declaringClass: the name of the class in which the doc comment was written.

- report

    


Return values
----------------

Returns void.









See Also
-----------

The [NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) class.
