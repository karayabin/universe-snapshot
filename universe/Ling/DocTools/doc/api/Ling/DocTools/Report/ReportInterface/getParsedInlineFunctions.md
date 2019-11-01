[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getParsedInlineFunctions
================



ReportInterface::getParsedInlineFunctions — Returns the array of the inline function parsed during this session.




Description
================


abstract public [ReportInterface::getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedInlineFunctions.md)() : array




Returns the array of the inline function parsed during this session.
Each item of the array has the following structure:

- 0: name of the inline function
- 1: array of arguments passed to the function
- 2: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getParsedInlineFunctions](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L345-L345)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [__toString](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/__toString.md)<br>Next method: [getParsedBlockLevelTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParsedBlockLevelTags.md)<br>

