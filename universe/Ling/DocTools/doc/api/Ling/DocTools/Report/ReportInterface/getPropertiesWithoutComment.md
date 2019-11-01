[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getPropertiesWithoutComment
================



ReportInterface::getPropertiesWithoutComment — Returns the array of properties without a doc comment (or with an empty doc comment).




Description
================


abstract public [ReportInterface::getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutComment.md)() : array




Returns the array of properties without a doc comment (or with an empty doc comment).
Each item has the following structure:

- 0: name of the property without comment
- 1: location (class name) where it was written




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ReportInterface::getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L463-L463)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getParametersWithoutParamTag.md)<br>Next method: [getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutVarTag.md)<br>

