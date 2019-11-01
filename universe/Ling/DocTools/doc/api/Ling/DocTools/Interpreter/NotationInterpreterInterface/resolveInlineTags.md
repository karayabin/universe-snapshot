[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Interpreter\NotationInterpreterInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md)


NotationInterpreterInterface::resolveInlineTags
================



NotationInterpreterInterface::resolveInlineTags — Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.




Description
================


abstract public [NotationInterpreterInterface::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/resolveInlineTags.md)(string $string, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string




Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.
Also updates the report if given.




Parameters
================


- string

    

- report

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [NotationInterpreterInterface::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/Interpreter/NotationInterpreterInterface.php#L28-L28)


See Also
================

The [NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface.md) class.

Next method: [interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md)<br>

