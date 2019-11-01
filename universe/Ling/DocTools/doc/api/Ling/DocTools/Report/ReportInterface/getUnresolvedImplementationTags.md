[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getUnresolvedImplementationTags
================



ReportInterface::getUnresolvedImplementationTags — unresolved @implementation tag.




Description
================


abstract public [ReportInterface::getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedImplementationTags.md)() : array




Returns the array of method and class names for methods which contains an
unresolved @implementation tag.

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
See the source code for method [ReportInterface::getUnresolvedImplementationTags](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L398-L398)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getUndefinedInlineClasses](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUndefinedInlineClasses.md)<br>Next method: [getUnresolvedOverridesTags](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedOverridesTags.md)<br>

