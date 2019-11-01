[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getUnknownInlineFunctions
================



ReportInterface::getUnknownInlineFunctions — 




Description
================


abstract public [ReportInterface::getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnknownInlineFunctions.md)() : array




Returns the array of unknown inline function items (found during the parsing session), each of which being the following array:

- 0: name of the unknown inline function
- 1: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L366-L366)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedBlockLevelTags.md)<br>Next method: [getUndefinedInlineKeywords](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineKeywords.md)<br>

