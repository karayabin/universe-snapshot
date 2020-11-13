[Back to the Ling/ClassCooker api](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker.md)<br>
[Back to the Ling\ClassCooker\ClassCooker class](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md)


ClassCooker::getClassLastLineInfo
================



ClassCooker::getClassLastLineInfo — Returns an array containing information related to the end of the class.




Description
================


public [ClassCooker::getClassLastLineInfo](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassLastLineInfo.md)() : array




Returns an array containing information related to the end of the class.

Important note, this method assumes that:

- the parsed php file contains valid php code
- the parsed php file contains only one class

If either the above assumptions are not true, then this method won't work properly.



The returned array has the following structure:


- endLine: int, the number of the line containing the class declaration's last char
- lastLineContent: string, the content of the last line being part of the class declaration




Parameters
================

This method has no parameters.


Return values
================

Returns array.








Source Code
===========
See the source code for method [ClassCooker::getClassLastLineInfo](https://github.com/lingtalfi/ClassCooker/blob/master/ClassCooker.php#L664-L686)


See Also
================

The [ClassCooker](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker.md) class.

Previous method: [getClassFirstEmptyLine](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/getClassFirstEmptyLine.md)<br>Next method: [hasProperty](https://github.com/lingtalfi/ClassCooker/blob/master/doc/api/Ling/ClassCooker/ClassCooker/hasProperty.md)<br>

