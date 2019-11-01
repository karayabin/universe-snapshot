[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getUndefinedInlineKeywords
================



ReportInterface::getUndefinedInlineKeywords — 




Description
================


abstract public [ReportInterface::getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineKeywords.md)() : array




Returns the array of undefined keyword items, along with the function name, each of which being the following array:

- 0: name of the undefined keyword
- 0: name of the inline function called
- 1: location (class name) where it was found




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L377-L377)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnknownInlineFunctions.md)<br>Next method: [getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineClasses.md)<br>

