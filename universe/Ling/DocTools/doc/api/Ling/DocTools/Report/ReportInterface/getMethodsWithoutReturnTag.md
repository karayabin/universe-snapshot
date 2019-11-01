[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getMethodsWithoutReturnTag
================



ReportInterface::getMethodsWithoutReturnTag — Returns the array of methods with a doc comment, but without a "@return" tag.




Description
================


abstract public [ReportInterface::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutReturnTag.md)() : array




Returns the array of methods with a doc comment, but without a "@return" tag.
Each item has the following structure:

- 0: name of the method without comment
- 1: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L440-L440)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutComment.md)<br>Next method: [getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParametersWithoutParamTag.md)<br>

