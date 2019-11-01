[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getParametersWithoutParamTag
================



ReportInterface::getParametersWithoutParamTag — Returns the array of parameters without a "@param" tag.




Description
================


abstract public [ReportInterface::getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParametersWithoutParamTag.md)() : array




Returns the array of parameters without a "@param" tag.
Each item has the following structure:

- 0: name of the parameter
- 1: name of the method
- 2: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L452-L452)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getMethodsWithoutReturnTag.md)<br>Next method: [getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutComment.md)<br>

