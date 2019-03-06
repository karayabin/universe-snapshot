[Back to the DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools.md)<br>
[Back to the DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md)


ReportInterface::addUndefinedInlineKeyword
================



ReportInterface::addUndefinedInlineKeyword — Adds an undefined keyword (defined with the [keyword inline function](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#inline-functions) or alike).




Description
================


abstract public [ReportInterface::addUndefinedInlineKeyword](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface/addUndefinedInlineKeyword.md)(string $keyword, string $functionName) : void




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







See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface.md) class.

Previous method: [addUnknownInlineFunction](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface/addUnknownInlineFunction.md)<br>Next method: [addUndefinedInlineClass](https://github.com/lingtalfi/DocTools/blob/master/doc/api/DocTools/Report/ReportInterface/addUndefinedInlineClass.md)<br>

