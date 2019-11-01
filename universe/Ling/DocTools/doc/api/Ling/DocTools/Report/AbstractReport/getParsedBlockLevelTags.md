[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\AbstractReport class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md)


AbstractReport::getParsedBlockLevelTags
================



AbstractReport::getParsedBlockLevelTags — Returns the array of the [block-level tags](https://github.com/lingtalfi/DocTools/blob/master/doc/pages/doctool-markup-language.md#block-level-tags) parsed during this session.




Description
================


public [AbstractReport::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedBlockLevelTags.md)() : array




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
See the source code for method [AbstractReport::getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/Report/AbstractReport.php#L610-L613)


See Also
================

The [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md) class.

Previous method: [getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParsedInlineFunctions.md)<br>Next method: [getUnknownInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getUnknownInlineFunctions.md)<br>

