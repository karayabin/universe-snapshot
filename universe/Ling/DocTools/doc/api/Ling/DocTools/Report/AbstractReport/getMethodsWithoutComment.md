[Back to the Ling/DocTools api](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools.md)<br>
[Back to the Ling\DocTools\Report\AbstractReport class](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md)


AbstractReport::getMethodsWithoutComment
================



AbstractReport::getMethodsWithoutComment — Returns the array of methods without a doc comment (or with an empty doc comment).




Description
================


public [AbstractReport::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutComment.md)() : array




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
See the source code for method [AbstractReport::getMethodsWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/Report/AbstractReport.php#L666-L669)


See Also
================

The [AbstractReport](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport.md) class.

Previous method: [getClassesWithoutComment](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getClassesWithoutComment.md)<br>Next method: [getMethodsWithoutReturnTag](https://github.com/lingtalfi/DocTools/blob/master/doc/api/Ling/DocTools/Report/AbstractReport/getMethodsWithoutReturnTag.md)<br>

