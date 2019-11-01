[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getParsedBlockLevelTags
================



ReportInterface::getParsedBlockLevelTags — Returns the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.




Description
================


abstract public [ReportInterface::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedBlockLevelTags.md)() : array




Returns the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.
Each item of the array has the following structure:

- 0: name of the block-level tag
- 1: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L356-L356)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedInlineFunctions.md)<br>Next method: [getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnknownInlineFunctions.md)<br>

