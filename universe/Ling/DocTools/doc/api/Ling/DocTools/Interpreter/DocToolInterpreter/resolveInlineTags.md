[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Interpreter\DocToolInterpreter class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md)


DocToolInterpreter::resolveInlineTags
================



DocToolInterpreter::resolveInlineTags — Resolves the [inline tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) in the given $string, and returns the result.




Description
================


public [DocToolInterpreter::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/resolveInlineTags.md)(string $string, ?[Ling\DocTools\Report\ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) $report = null) : string




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
See the source code for method [DocToolInterpreter::resolveInlineTags](https://github.com/lingtalfi/DocTools/blob/master/Interpreter/DocToolInterpreter.php#L46-L73)


See Also
================

The [DocToolInterpreter](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter.md) class.

Previous method: [__construct](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/__construct.md)<br>Next method: [interpretBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Interpreter/DocToolInterpreter/interpretBlockLevelTags.md)<br>

