[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\ReportInterface class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md)


ReportInterface::getPropertiesWithoutVarTag
================



ReportInterface::getPropertiesWithoutVarTag — Returns the array of properties without a "@var" tag specified.




Description
================


abstract public [ReportInterface::getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutVarTag.md)() : array




Returns the array of properties without a "@var" tag specified.

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
See the source code for method [ReportInterface::getPropertiesWithoutVarTag](https://github.com/lingtalfi/DocTools/blob/master/Report/ReportInterface.php#L476-L476)


See Also
================

The [ReportInterface](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface.md) class.

Previous method: [getPropertiesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getPropertiesWithoutComment.md)<br>Next method: [getUnresolvedClassReferences](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/ReportInterface/getUnresolvedClassReferences.md)<br>

