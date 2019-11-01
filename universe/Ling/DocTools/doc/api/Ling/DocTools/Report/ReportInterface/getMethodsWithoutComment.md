[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getMethodsWithoutComment
================



ReportInterface::getMethodsWithoutComment — Returns the array of methods without a doc comment (or with an empty doc comment).




Description
================


abstract public [ReportInterface::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutComment.md)() : array




Returns the array of methods without a doc comment (or with an empty doc comment).
Each item has the following structure:

- 0: name of the method without comment
- 1: visibility of the method
- 2: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L429-L429)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getClassesWithoutComment.md)<br>Next method: [getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutReturnTag.md)<br>

