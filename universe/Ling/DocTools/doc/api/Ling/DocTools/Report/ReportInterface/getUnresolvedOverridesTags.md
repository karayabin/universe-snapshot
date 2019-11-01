[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getUnresolvedOverridesTags
================



ReportInterface::getUnresolvedOverridesTags — unresolved @overrides tag.




Description
================


abstract public [ReportInterface::getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedOverridesTags.md)() : array




Returns the array of method and class names for methods which contains an
unresolved @overrides tag.

- 0: name of the failing method
- 1: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L409-L409)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedImplementationTags.md)<br>Next method: [getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithoutComment.md)<br>

