[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)



The NotationInterpreterInterface class
================
2019-02-21 --> 2019-04-18






Introduction
============

The NotationInterpreterInterface interface represents a notation interpreter.

The default notation interpreter in DocTools is a docTool interpreter.

See the [docTool markup language page](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md) for more info.



Class synopsis
==============


abstract class <span class="pl-k">NotationInterpreterInterface</span>  {

- Methods
    - abstract public [resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/resolveInlineTags.md)(string $string, [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string
    - abstract public [interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md)(array $tags, [Ling\DocTools\Info\CommentInfo](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Info/CommentInfo.md) $comment, array $info, [Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : void

}






Methods
==============

- [NotationInterpreterInterface::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/resolveInlineTags.md) &ndash; Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.
- [NotationInterpreterInterface::interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md) &ndash; Interprets the given $tags, and potentially configures the $comment accordingly.





Location
=============
Ling\DocTools\Interpreter\NotationInterpreterInterface


SeeAlso
==============
Previous class: [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md)<br>Next class: [PageUtil](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Page/PageUtil.md)<br>
