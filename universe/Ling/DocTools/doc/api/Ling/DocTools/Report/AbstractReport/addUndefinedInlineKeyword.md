[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\AbstractReport class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md)


AbstractReport::addUndefinedInlineKeyword
================



AbstractReport::addUndefinedInlineKeyword — Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).




Description
================


public [AbstractReport::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineKeyword.md)(string $keyword, string $functionName) : void




Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).




Parameters
================


- keyword

    The keyword which couldn't resolve.

- functionName

    The name of the function used to call the keyword.


Return values
================

Returns void.








Source Code
===========
See the source code for method [AbstractReport::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/Report/AbstractReport.php#L373-L382)


See Also
================

The [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md) class.

Previous method: [addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUnknownInlineFunction.md)<br>Next method: [addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/addUndefinedInlineClass.md)<br>

