[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\Interpreter\NotationInterpreterInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md)


NotationInterpreterInterface::resolveInlineTags
================



NotationInterpreterInterface::resolveInlineTags — Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.




Description
================


abstract public [NotationInterpreterInterface::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface/resolveInlineTags.md)(string $string, [DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) $report = null) : string




Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.
Also updates the report if given.




Parameters
================


- string

    

- report

    


Return values
================

Returns string.







See Also
================

The [NotationInterpreterInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface.md) class.

Next method: [interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Interpreter/NotationInterpreterInterface/interpretBlockLevelTags.md)<br>

