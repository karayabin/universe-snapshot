[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\AbstractReport class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md)


AbstractReport::getMethodsWithoutReturnTag
================



AbstractReport::getMethodsWithoutReturnTag — Returns the array of methods with a doc comment, but without a "@return" tag.




Description
================


public [AbstractReport::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutReturnTag.md)() : array




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
See the source code for method [AbstractReport::getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/Report/AbstractReport.php#L674-L677)


See Also
================

The [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md) class.

Previous method: [getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutComment.md)<br>Next method: [getParametersWithoutParamTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getParametersWithoutParamTag.md)<br>

